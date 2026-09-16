<?php

declare(strict_types=1);

namespace One202x\Theme;

use WP_Block;
use WP_Query;
use WP_Taxonomy;

defined('ABSPATH') || exit;

/**
 * Turns visitor filter selections in the URL into native Query Loop arguments.
 * The Query Filters block supplies the controls; this class validates their sources,
 * reads selected values and applies taxonomy, custom-field and sorting constraints.
 * Controls inside the same Query Loop share its results, including banner tabs and
 * a sidebar. Nested Query Loops remain independent. Visitor selections are not saved to the DB.
 * blocks/query-filters/view.js handles dynamic navigation; this class builds the
 * server results for both those requests and ordinary page loads.
 */
final class QueryFilters
{
    /** Render-only data; saved query attributes cannot activate visitor filters. */
    public const CONTEXT_KEY = '_one202xQueryFilters';
    // IDs and URL prefixes must remain distinct when a pattern is inserted twice.
    // Start generated IDs high to avoid the small IDs normally saved by the editor.
    private int $next_query_id = 2000000000;
    private array $used_query_ids = [];
    private array $used_parameters = [];

    public function register_hooks(): void
    {
        // Prepare query context before Core examines it for enhanced pagination (priority 10).
        add_filter('render_block_data', [$this, 'prepare_query'], 9);
        add_filter('render_block_context', [$this, 'refresh_nested_query_attributes'], 9, 3);
        // Apply visitor choices after editorial selection in QuerySelection (priority 10).
        add_filter('query_loop_block_query_vars', [$this, 'filter_query'], 15, 2);
        add_action('enqueue_block_editor_assets', [$this, 'editor_assets']);
    }

    public function editor_assets(): void
    {
        // Supply the inspector's source dropdown before its editor script executes.
        // Only source names/labels are sent here, not the underlying records or field values.
        $sources = [];
        foreach (get_post_types(['show_in_rest' => true]) as $type) {
            $sources[$type] = self::sources($type);
        }
        wp_add_inline_script('one-202x-query-filters-editor-script',
            'window.one202xFilterSources = ' . wp_json_encode($sources) . ';', 'before');
    }

    /**
     * List allowed sources for this content type, shared by the editor and server validation.
     * A URL cannot introduce an arbitrary metadata key: it must match this list and a
     * filter block actually present in the query. Repeater/array fields are not supported.
     */
    public static function sources(string $post_type): array
    {
        $sources = [];
        foreach (get_object_taxonomies($post_type, 'objects') as $taxonomy) {
            if ($taxonomy->public && $taxonomy->show_in_rest) {
                $sources['taxonomy:' . $taxonomy->name] = $taxonomy->label;
            }
        }
        foreach (get_registered_meta_keys('post', $post_type) as $key => $field) {
            if (!is_protected_meta($key, 'post') && !empty($field['show_in_rest'])
                && in_array($field['type'], ['string', 'number', 'integer', 'boolean'], true)) {
                $sources['field:' . $key] = $key;
            }
        }
        // ACF fields opted into bindings can also supply exact-value filters. Skip
        // read-only/computed fields because their display value may differ from stored meta.
        if (function_exists('acf_get_field_groups')) {
            foreach (acf_get_field_groups(['post_type' => $post_type]) as $group) {
                foreach (acf_get_fields($group) ?: [] as $field) {
                    if (!empty($field['allow_in_bindings']) && empty($field['readonly']) && !is_protected_meta($field['name'], 'post')
                        && in_array($field['type'], ['text', 'number', 'select', 'true_false'], true)
                        && empty($field['multiple'])) {
                        $sources['field:' . $field['name']] = $field['label'];
                    }
                }
            }
        }
        return $sources;
    }

    public static function source(array $attributes, string $post_type): string
    {
        // An empty source means the content type's usual categories. Explicit sources
        // use taxonomy:<name>, field:<meta key>, or the special sort control.
        $source = is_string($attributes['source'] ?? null) ? $attributes['source'] : '';
        return $source !== '' ? $source : 'taxonomy:' . self::taxonomy_for_post_type($post_type);
    }

    /** Build one control's allowed options, URL parameter and current selection. */
    public static function configuration(array $attributes, string $post_type, string $prefix, bool $preview = false): ?array
    {
        $source = self::source($attributes, $post_type);
        if ($source !== 'sort' && !isset(self::sources($post_type)[$source])) {
            return null;
        }
        // Keep URLs readable, e.g. course-difficulty=basic. Custom fields include
        // "field-" so a field and taxonomy with the same name do not share a parameter.
        [$kind, $key] = array_pad(explode(':', $source, 2), 2, '');
        $parameter = $source === 'sort' ? $prefix . '-sort' : $prefix . '-' . ($kind === 'field' ? 'field-' : '') . str_replace('_', '-', $key);
        // Keep existing category URLs unchanged.
        if ($source === 'taxonomy:' . self::taxonomy_for_post_type($post_type)) {
            $parameter = $prefix . '-category';
        } elseif ($kind === 'taxonomy' && str_starts_with($key, $post_type . '_')) {
            $parameter = $prefix . '-' . str_replace('_', '-', substr($key, strlen($post_type) + 1));
        }
        $options = [];
        if ($kind === 'taxonomy') {
            // Keep empty terms visible as choices. Button-style range filters use
            // creation order; ordinary category lists are ordered alphabetically.
            $terms = get_terms(['taxonomy' => $key, 'hide_empty' => false, 'orderby' => str_contains((string) ($attributes['className'] ?? ''), 'is-style-a2e-filter-buttons') ? 'term_id' : 'name', 'order' => 'ASC']);
            foreach (is_array($terms) ? $terms : [] as $term) {
                $options[$term->slug] = ['label' => $term->name, 'value' => $term->term_id];
            }
        } elseif ($kind === 'field') {
            // The editor provides exact stored values and optional readable labels.
            // URL slugs map back to those values; a label is never used as the SQL value.
            foreach (array_slice(is_array($attributes['options'] ?? null) ? $attributes['options'] : [], 0, 100) as $option) {
                if (!is_array($option) || !is_scalar($option['value'] ?? null)) {
                    continue;
                }
                $value = (string) $option['value'];
                $slug = sanitize_title($value);
                if ($slug !== '') {
                    $options[$slug] = ['label' => (string) ($option['label'] ?? $value), 'value' => $value];
                }
            }
        } else {
            // Sort choices come from this fixed map, never a raw URL orderby expression.
            $options = [
                'newest' => ['label' => __('Newest first', 'one-base-theme'), 'value' => 'newest'],
                'oldest' => ['label' => __('Oldest first', 'one-base-theme'), 'value' => 'oldest'],
                'title' => ['label' => __('Name: A–Z', 'one-base-theme'), 'value' => 'title'],
                'title-desc' => ['label' => __('Name: Z–A', 'one-base-theme'), 'value' => 'title-desc'],
            ];
        }
        // Editor REST previews show available options without inheriting frontend GET state.
        $requested = $preview ? [] : self::requested_values($parameter);
        return compact('source', 'kind', 'key', 'parameter', 'options', 'requested');
    }

    /** Attach request-only filter context to an eligible Query block before its children render. */
    public function prepare_query(array $parsed_block): array
    {
        if (($parsed_block['blockName'] ?? '') !== 'core/query'
            || (isset($parsed_block['attrs']['query']) && !is_array($parsed_block['attrs']['query']))) {
            return $parsed_block;
        }
        // Rebuild this data from real child blocks. A copied/saved internal flag
        // alone must not activate filtering on a query that has no filter controls.
        unset($parsed_block['attrs']['query'][self::CONTEXT_KEY]);
        $filters = Blocks::find($parsed_block['innerBlocks'] ?? [], 'one-202x/query-filters');
        $query = $parsed_block['attrs']['query'] ?? [];
        // An inherited archive/search loop uses the main query, bypassing our query hook.
        if ($filters === [] || ($query['inherit'] ?? true)) {
            return $parsed_block;
        }
        $post_type = sanitize_key((string) ($query['postType'] ?? 'post'));
        $query_id = $parsed_block['attrs']['queryId'] ?? null;
        // Pagination, the dynamic router region and these controls all need the same ID.
        if (!is_numeric($query_id) || (int) $query_id < 0 || isset($this->used_query_ids[(int) $query_id])) {
            while (isset($this->used_query_ids[$this->next_query_id])) {
                $this->next_query_id++;
            }
            $query_id = $this->next_query_id++;
        }
        $query_id = (int) $query_id;
        $this->used_query_ids[$query_id] = true;
        $parsed_block['attrs']['queryId'] = $query_id;
        // Remove the "-category" suffix to obtain a prefix shared by this loop's controls.
        // A Query block anchor can provide a more specific prefix for multiple listings.
        $base = substr(self::parameter_name($post_type, (string) ($parsed_block['attrs']['anchor'] ?? '')), 0, -9);
        $prefix = $base;
        $suffix = 2;
        while (isset($this->used_parameters[$prefix])) {
            $prefix = $base . '-' . $suffix++;
        }
        $this->used_parameters[$prefix] = true;
        $configuration = [
            'post_type' => $post_type,
            'prefix' => $prefix,
            'page_parameter' => 'query-' . $query_id . '-page',
            'filters' => [],
            'load_more' => Blocks::contains($parsed_block['innerBlocks'] ?? [], 'one-202x/query-results'),
        ];
        foreach ($filters as $filter) {
            $config = self::configuration($filter['attrs'] ?? [], $post_type, $prefix, wp_is_serving_rest_request());
            if ($config) {
                if ($prefix !== $base && $config['parameter'] === $prefix . '-category') {
                    // Retain existing copied-listing URLs such as resource-category-2.
                    $config['parameter'] = $base . '-category' . substr($prefix, strlen($base));
                    $config['requested'] = wp_is_serving_rest_request() ? [] : self::requested_values($config['parameter']);
                }
                $configuration['filters'][$config['source']] = $config;
            }
        }
        // Child filters, Post Templates and Query Results receive this through query context.
        $query[self::CONTEXT_KEY] = $configuration;
        $parsed_block['attrs']['query'] = $query;
        return $parsed_block;
    }

    /**
     * Nested blocks can cache attributes before render_block_data runs. Refresh
     * this Query's cached attributes before Core rebuilds its children's context,
     * so filters and the router receive the prepared query and its generated ID.
     */
    public function refresh_nested_query_attributes(array $context, array $parsed_block, ?WP_Block $parent): array
    {
        if ($parent && ($parsed_block['blockName'] ?? '') === 'core/query'
            && isset($parsed_block['attrs']['query'][self::CONTEXT_KEY])) {
            foreach ($parent->inner_blocks as $child) {
                if ($child->parsed_block === $parsed_block) {
                    $child->attributes = $child->block_type->prepare_attributes_for_render($parsed_block['attrs']);
                    break;
                }
            }
        }

        return $context;
    }

    /** Add visitor constraints without discarding the Query Loop's existing restrictions. */
    public function filter_query(array $args, WP_Block $block): array
    {
        $query = $block->context['query'] ?? [];
        $configuration = $query[self::CONTEXT_KEY] ?? null;
        if (!is_array($configuration)) {
            return $args;
        }
        $tax = $meta = [];
        foreach ($configuration['filters'] as $filter) {
            if ($filter['requested'] === []) {
                continue;
            }
            // Only resolve URL slugs that exist in the control's allowed options.
            // Within a control, selecting several options means any of those options (IN).
            $values = array_column(array_intersect_key($filter['options'], array_flip($filter['requested'])), 'value');
            if ($filter['kind'] === 'taxonomy') {
                $tax[] = ['taxonomy' => $filter['key'], 'field' => 'term_id', 'terms' => $values ?: [0], 'include_children' => true];
            } elseif ($filter['kind'] === 'field') {
                // An entirely unknown selection must match nothing, not remove the filter.
                // EXISTS and NOT EXISTS together provide an impossible metadata condition.
                $meta[] = $values !== []
                    ? ['key' => $filter['key'], 'value' => $values, 'compare' => 'IN']
                    : ['relation' => 'AND', ['key' => $filter['key'], 'compare' => 'EXISTS'], ['key' => $filter['key'], 'compare' => 'NOT EXISTS']];
            } elseif ($values !== []) {
                $sort = $values[0];
                $args['orderby'] = str_starts_with($sort, 'title') ? 'title' : 'date';
                $args['order'] = in_array($sort, ['oldest', 'title'], true) ? 'ASC' : 'DESC';
            }
        }
        // The editor chooses whether separate controls must all match (AND) or any can match (OR).
        $relation = ($query['filterRelation'] ?? '') === 'OR' ? 'OR' : 'AND';
        if ($relation === 'OR' && $tax !== [] && $meta !== []) {
            // WP_Query normally ANDs tax_query with meta_query even when their internal
            // relations are OR. Fetch the matching IDs for each side and combine them
            // to support a true "taxonomy OR custom field" selection.
            $base = ['post_type' => $configuration['post_type'], 'post_status' => 'publish',
                'fields' => 'ids', 'posts_per_page' => -1, 'no_found_rows' => true,
                'update_post_meta_cache' => false, 'update_post_term_cache' => false];
            $ids = array_unique(array_merge(
                (new WP_Query($base + ['tax_query' => ['relation' => 'OR', ...$tax]]))->posts,
                (new WP_Query($base + ['meta_query' => ['relation' => 'OR', ...$meta]]))->posts
            ));
            // Still respect manually selected IDs; the visitor cannot widen that selection.
            $args['post__in'] = !empty($args['post__in']) ? array_values(array_intersect($args['post__in'], $ids)) : array_values($ids);
            $args['post__in'] = $args['post__in'] ?: [0];
        } else {
            foreach (['tax_query' => $tax, 'meta_query' => $meta] as $key => $clauses) {
                if ($clauses !== []) {
                    // Nest existing clauses so an existing OR group keeps its meaning.
                    $visitor = ['relation' => $relation, ...$clauses];
                    $args[$key] = empty($args[$key]) ? $visitor : ['relation' => 'AND', $args[$key], $visitor];
                }
            }
        }
        if ($configuration['load_more']) {
            // Load more replaces the region with a larger cumulative list: batch 2
            // shows the first 12 records for a page size of 6, rather than only records 7–12.
            $step = min(100, max(1, (int) ($query['perPage'] ?? 6)));
            $page = wp_is_serving_rest_request() ? 1 : self::requested_page($configuration['page_parameter']);
            $args['posts_per_page'] = $step * $page;
            if (is_string($args['orderby'] ?? null) && in_array($args['orderby'], ['date', 'title'], true)) {
                // Break ties by ID so equal dates/titles do not shuffle between batches.
                $args['orderby'] = [$args['orderby'] => $args['order'], 'ID' => $args['order']];
            }
            $args['offset'] = max(0, (int) ($query['offset'] ?? 0));
        }
        return $args;
    }

    public static function requested_page(string $parameter): int
    {
        // Treat malformed/missing values as batch 1 and cap expansion at 100 batches.
        $value = $_GET[$parameter] ?? 1;
        return is_scalar($value) ? min(100, max(1, (int) $value)) : 1;
    }

    public static function taxonomy_for_post_type(string $post_type): string
    {
        // Automatic category controls prefer category or <post_type>_category.
        // The extension filter can select another eligible public hierarchy.
        $taxonomies = array_filter(get_object_taxonomies($post_type, 'objects'),
            static fn(WP_Taxonomy $taxonomy): bool => $taxonomy->hierarchical && is_taxonomy_viewable($taxonomy));
        $preferred = $post_type === 'post' ? 'category' : $post_type . '_category';
        ksort($taxonomies);
        $taxonomy = isset($taxonomies[$preferred]) ? $preferred : (string) (array_key_first($taxonomies) ?? '');
        $taxonomy = apply_filters('one202x/query_filters/taxonomy', $taxonomy, $post_type);
        return is_string($taxonomy) && isset($taxonomies[$taxonomy]) ? $taxonomy : '';
    }

    public static function parameter_name(string $post_type, string $anchor = ''): string
    {
        // Preserve the site's established resource-category URL for ordinary blog posts.
        $prefix = sanitize_title($anchor);
        return ($prefix !== '' ? $prefix : ($post_type === 'post' ? 'resource' : str_replace('_', '-', sanitize_key($post_type)))) . '-category';
    }

    private static function requested_values(string $parameter): array
    {
        // Accept both friendly comma-separated links and array values from GET forms.
        // Bound the input and discard nested arrays before matching it against options.
        $value = isset($_GET[$parameter]) ? wp_unslash($_GET[$parameter]) : [];
        $values = is_array($value) ? $value : explode(',', (string) $value, 101);
        return array_values(array_unique(array_filter(array_map(
            static fn($value): string => is_string($value) ? sanitize_title($value) : '',
            array_slice($values, 0, 100)
        ), static fn(string $value): bool => $value !== '')));
    }
}
