<?php

declare(strict_types=1);

namespace One202x\Theme;

use WP_Block;
use WP_Taxonomy;

defined('ABSPATH') || exit;

final class QueryFilters
{
    /** Render-only data, never required in saved Query block attributes. */
    public const CONTEXT_KEY = '_one202xQueryFilters';

    private int $next_query_id = 2000000000;

    /** @var array<int, true> */
    private array $used_query_ids = [];

    /** @var array<string, true> */
    private array $used_parameters = [];

    public function register_hooks(): void
    {
        add_filter('render_block_data', [$this, 'prepare_query'], 9);
        add_filter('query_loop_block_query_vars', [$this, 'filter_query'], 10, 2);
    }

    /** @param array<string, mixed> $parsed_block */
    public function prepare_query(array $parsed_block): array
    {
        if (($parsed_block['blockName'] ?? '') !== 'core/query') {
            return $parsed_block;
        }

        if (isset($parsed_block['attrs']['query']) && !is_array($parsed_block['attrs']['query'])) {
            return $parsed_block;
        }

        // A saved or copied internal flag must not activate filters by itself.
        unset($parsed_block['attrs']['query'][self::CONTEXT_KEY]);

        if (!Blocks::contains($parsed_block['innerBlocks'] ?? [], 'one-202x/query-filters')) {
            return $parsed_block;
        }

        $query = $parsed_block['attrs']['query'] ?? [];

        // Inherited archive/search queries use the main WP_Query, bypassing this hook.
        if ($query['inherit'] ?? true) {
            return $parsed_block;
        }

        $post_type = sanitize_key((string) ($query['postType'] ?? 'post'));
        $taxonomy = self::taxonomy_for_post_type($post_type);

        if ($taxonomy === '') {
            return $parsed_block;
        }

        $query_id = $parsed_block['attrs']['queryId'] ?? null;

        if (!is_numeric($query_id) || (int) $query_id < 0 || isset($this->used_query_ids[(int) $query_id])) {
            // Filters and pagination share a unique ID, including copied patterns.
            while (isset($this->used_query_ids[$this->next_query_id])) {
                $this->next_query_id++;
            }
            $query_id = $this->next_query_id++;
        }

        $query_id = (int) $query_id;
        $this->used_query_ids[$query_id] = true;
        $parsed_block['attrs']['queryId'] = $query_id;

        // Copied listings need independent filter parameters.
        $base_parameter = self::parameter_name(
            $post_type,
            (string) ($parsed_block['attrs']['anchor'] ?? '')
        );
        $parameter = $base_parameter;
        $suffix = 2;

        while (isset($this->used_parameters[$parameter])) {
            $parameter = $base_parameter . '-' . $suffix++;
        }

        $this->used_parameters[$parameter] = true;

        $query[self::CONTEXT_KEY] = [
            'post_type' => $post_type,
            'taxonomy' => $taxonomy,
            'parameter' => $parameter,
            'page_parameter' => 'query-' . $query_id . '-page',
            'selected_terms' => wp_is_serving_rest_request()
                ? []
                : $this->requested_terms($parameter, $taxonomy),
        ];
        $parsed_block['attrs']['query'] = $query;

        return $parsed_block;
    }

    /** @param array<string, mixed> $query_args */
    public function filter_query(array $query_args, WP_Block $block): array
    {
        $configuration = $block->context['query'][self::CONTEXT_KEY] ?? null;

        if (!is_array($configuration) || empty($configuration['selected_terms'])) {
            return $query_args;
        }

        $clause = [
            'taxonomy' => $configuration['taxonomy'],
            'field' => 'term_id',
            'terms' => $configuration['selected_terms'],
            'operator' => 'IN',
            'include_children' => true,
        ];
        $existing = $query_args['tax_query'] ?? [];

        // Keep any existing OR groups intact: the visitor filter narrows the query.
        $query_args['tax_query'] = $existing === []
            ? [$clause]
            : ['relation' => 'AND', $existing, $clause];

        return $query_args;
    }

    public static function taxonomy_for_post_type(string $post_type): string
    {
        $taxonomies = array_filter(
            get_object_taxonomies($post_type, 'objects'),
            static fn(WP_Taxonomy $taxonomy): bool => $taxonomy->hierarchical
                && is_taxonomy_viewable($taxonomy)
        );

        // Prefer the type's category taxonomy, then the first public hierarchy.
        $preferred = $post_type === 'post' ? 'category' : $post_type . '_category';

        ksort($taxonomies);
        $taxonomy = isset($taxonomies[$preferred]) ? $preferred : (string) (array_key_first($taxonomies) ?? '');
        // Site code can override the preferred taxonomy.
        $taxonomy = apply_filters('one202x/query_filters/taxonomy', $taxonomy, $post_type);
        return is_string($taxonomy) && isset($taxonomies[$taxonomy]) ? $taxonomy : '';
    }

    public static function parameter_name(
        string $post_type,
        string $anchor = ''
    ): string {
        $prefix = sanitize_title($anchor);

        if ($prefix === '') {
            $prefix = $post_type === 'post'
                ? 'resource'
                : str_replace('_', '-', sanitize_key($post_type));
        }

        return $prefix . '-category';
    }

    /** @return list<int> */
    private function requested_terms(string $parameter, string $taxonomy): array
    {
        $value = isset($_GET[$parameter]) ? wp_unslash($_GET[$parameter]) : []; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only public filters.
        $values = is_array($value) ? $value : explode(',', (string) $value, 101);
        $slugs = [];

        foreach (array_slice($values, 0, 100) as $value) {
            if (!is_string($value)) {
                continue;
            }

            $slug = sanitize_title($value);

            if ($slug !== '') {
                $slugs[] = $slug;
            }
        }

        $slugs = array_values(array_unique($slugs));

        if ($slugs === []) {
            return [];
        }

        $valid_ids = get_terms([
            'taxonomy' => $taxonomy,
            'slug' => $slugs,
            'fields' => 'ids',
            'hide_empty' => false,
        ]);

        return is_array($valid_ids) ? array_map('intval', $valid_ids) : [];
    }
}
