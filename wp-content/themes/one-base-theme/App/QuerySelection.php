<?php

declare(strict_types=1);

namespace One202x\Theme;

use WP_Block;

defined('ABSPATH') || exit;

/**
 * Adds "selected or latest content" behaviour to opted-in native Query Loops.
 * An editor can choose specific records in a set order, or leave the selection
 * empty to show the newest published records. Used by patterns such as team
 * members and testimonials; the existing Post Template still renders the cards.
 * This handles editorial selection, not the visitor controls in QueryFilters.
 */
final class QuerySelection
{
    public function register_hooks(): void
    {
        // Adjust WordPress's query arguments before it fetches the block's records.
        add_filter('query_loop_block_query_vars', [$this, 'filter_query'], 10, 2);
        // Load the selection controls in the editor, not on the public website.
        add_action('enqueue_block_editor_assets', [$this, 'editor_assets']);
    }

    public function editor_assets(): void
    {
        // Built from src/scripts/editor/query-selection.js. That script provides
        // search, add/remove, reordering and the number-of-recent-items control.
        // It saves those choices in the parent Query block's query attribute.
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
        // Only patterns explicitly enabling one202xSelection use this behaviour.
        // Leave ordinary Query Loops and inherited archive/search queries alone.
        if (($query['one202xSelection'] ?? false) !== true || ($query['inherit'] ?? true)) {
            return $args;
        }

        // Testimonials are intentionally usable in these listings despite not having
        // public single pages. Other types must exist and be publicly viewable.
        $type = $query['postType'] ?? '';
        if (!is_string($type) || !post_type_exists($type)
            || (!is_post_type_viewable($type) && $type !== 'testimonial')) {
            // No post has ID 0: this forces an empty result instead of a fallback list.
            $args['post__in'] = [0];
            return $args;
        }

        // Keep the list predictable: published records only, no sticky-post promotion.
        $args['post_type'] = $type;
        $args['post_status'] = 'publish';
        $args['ignore_sticky_posts'] = true;

        // include holds ordered post IDs. Missing/empty means "use latest items".
        $selected = $query['include'] ?? [];
        if ($selected !== []) {
            // Manual selection starts with the editor's first chosen record.
            $args['offset'] = 0;
            // Accept positive integer IDs, remove duplicates and limit the selection
            // to 100 records, matching the editor controls. Preserve their saved order.
            $ids = is_array($selected) ? array_filter($selected,
                static fn ($id): bool => (is_int($id) || (is_string($id) && ctype_digit($id))) && (int) $id > 0
            ) : [];
            $ids = array_slice(array_values(array_unique(array_map('intval', $ids))), 0, 100);
            // An invalid non-empty selection must not silently switch to latest items.
            // WordPress also excludes deleted/unpublished IDs from the resulting query.
            $args['post__in'] = $ids ?: [0];
            $args['posts_per_page'] = max(1, count($ids));
            // post__in tells WordPress to use the editor's order rather than publication date.
            $args['orderby'] = 'post__in';
        } else {
            // Latest lists can continue after an earlier row, such as testimonials
            // either side of a video slider. Never skip manually selected records.
            $args['offset'] = max(0, (int) ($query['offset'] ?? 0));
            // With no manual selection, show 1–12 newest records (three by default).
            // The saved latest-count setting is retained when switching between modes.
            $args['posts_per_page'] = min(12, max(1, (int) ($query['one202xLatestCount'] ?? 3)));
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
        }

        return $args;
    }
}
