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

    public function register_hooks(): void
    {
        add_filter('render_block_data', [$this, 'prepare_query']);
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
        $parameter = 'one-query-' . $query_id . '-terms';
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
            static fn (WP_Taxonomy $taxonomy): bool => $taxonomy->hierarchical
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

    /** @return list<int> */
    private function requested_terms(string $parameter, string $taxonomy): array
    {
        $values = isset($_GET[$parameter]) ? wp_unslash($_GET[$parameter]) : []; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only public filters.
        $values = is_array($values) ? $values : [$values];
        $ids = [];

        foreach ($values as $value) {
            if (!is_scalar($value)) {
                continue;
            }

            $id = filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

            if ($id !== false) {
                $ids[] = $id;
            }
            // Keep public query URLs bounded, even when constructed by hand.
            if (count($ids) >= 100) {
                break;
            }
        }

        $ids = array_values(array_unique($ids));

        if ($ids === []) {
            return [];
        }

        $valid_ids = get_terms([
            'taxonomy' => $taxonomy,
            'include' => $ids,
            'fields' => 'ids',
            'hide_empty' => false,
        ]);

        return is_array($valid_ids) ? array_map('intval', $valid_ids) : [];
    }
}
