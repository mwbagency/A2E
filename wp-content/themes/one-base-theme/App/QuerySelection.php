<?php

declare(strict_types=1);

namespace One202x\Theme;

use WP_Block;

defined('ABSPATH') || exit;

/** Selected content remains a native Query Loop with the usual Post Template. */
final class QuerySelection
{
    public function register_hooks(): void
    {
        add_filter('query_loop_block_query_vars', [$this, 'filter_query'], 10, 2);
        add_action('enqueue_block_editor_assets', [$this, 'editor_assets']);
    }

    public function editor_assets(): void
    {
        $path = 'assets/js/editor/query-selection.js';
        wp_enqueue_script('one-202x-query-selection', get_theme_file_uri($path),
            ['wp-blocks', 'wp-block-editor', 'wp-components', 'wp-element', 'wp-hooks', 'wp-api-fetch', 'wp-html-entities', 'wp-i18n', 'wp-url'],
            (new Assets())->version($path), true);
        wp_set_script_translations('one-202x-query-selection', 'one-base-theme', get_template_directory() . '/languages');
    }

    /** @param array<string, mixed> $args */
    public function filter_query(array $args, WP_Block $block): array
    {
        $query = $block->context['query'] ?? [];
        if (($query['one202xSelection'] ?? false) !== true || ($query['inherit'] ?? true)) {
            return $args;
        }

        $type = $query['postType'] ?? '';
        if (!is_string($type) || !post_type_exists($type)
            || (!is_post_type_viewable($type) && $type !== 'testimonial')) {
            $args['post__in'] = [0];
            return $args;
        }

        $args['post_type'] = $type;
        $args['post_status'] = 'publish';
        $args['ignore_sticky_posts'] = true;
        $args['offset'] = 0;

        $selected = $query['include'] ?? [];
        if ($selected !== []) {
            $ids = is_array($selected) ? array_filter($selected,
                static fn ($id): bool => (is_int($id) || (is_string($id) && ctype_digit($id))) && (int) $id > 0
            ) : [];
            $ids = array_slice(array_values(array_unique(array_map('intval', $ids))), 0, 100);
            // Deleted, unpublished or invalid selections must not show unrelated people.
            $args['post__in'] = $ids ?: [0];
            $args['posts_per_page'] = max(1, count($ids));
            $args['orderby'] = 'post__in';
        } else {
            $args['posts_per_page'] = min(12, max(1, (int) ($query['one202xLatestCount'] ?? 3)));
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
        }

        return $args;
    }
}
