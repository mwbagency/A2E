<?php

declare(strict_types=1);

namespace One202x\Theme;

use WP_Block;
use WP_Query;

defined('ABSPATH') || exit;

/**
 * Shared support for native WordPress Query Loops that display our Content Cards.
 * Prevents a missing content type from falling back to unrelated posts, and loads
 * thumbnail data together so each card does not have to fetch it separately.
 * WordPress still runs the query and renders the Post Template and pagination.
 * Editor choices belong to QuerySelection; visitor filters belong to QueryFilters.
 */
final class QueryLoops
{
    /**
     * Remember which actual query objects need their card images prepared.
     * WeakMap releases an entry when its query object is no longer in use.
     * This keeps the bookkeeping outside the query arguments used for caching.
     *
     * @var \WeakMap<WP_Query, bool>
     */
    private \WeakMap $card_queries;

    public function __construct()
    {
        $this->card_queries = new \WeakMap();
    }

    public function register_hooks(): void
    {
        // Run after QuerySelection and QueryFilters have adjusted the query arguments.
        add_filter('query_loop_block_query_vars', [$this, 'prepare_query'], 20, 2);
        // Move our marker out of those arguments before WordPress runs the query.
        add_action('pre_get_posts', [$this, 'track_card_query']);
        // Once the posts are available, prepare their thumbnails before the cards render.
        add_action('loop_start', [$this, 'prime_card_images']);
        // Archive/search loops inherit the main query and need a separate entry point.
        add_filter('render_block_context', [$this, 'prepare_inherited_images'], 10, 2);
        // Keep the native total block, with the search template's count and term wording.
        add_filter('render_block_core/query-total', [$this, 'search_total'], 10, 3);
    }

    /** @param array<string, mixed> $args */
    public function prepare_query(array $args, WP_Block $block): array
    {
        $type = $block->context['query']['postType'] ?? '';

        // A pattern can remain saved after its post-type plugin is removed. Return
        // no results in that case, rather than letting Core show ordinary posts.
        // An earlier adapter may explicitly enable a non-viewable type, such as testimonials.
        if (is_string($type) && $type !== '' && (
            !post_type_exists($type)
            || (!is_post_type_viewable($type) && ($args['post_type'] ?? '') !== $type)
        )) {
            $args['post__in'] = [0];
        }

        // Only mark loops that contain our cards. Blocks::contains also checks synced
        // patterns, but stops at nested Query Loops because they own their own results.
        if (Blocks::contains($block->parsed_block['innerBlocks'] ?? [], 'one-202x/content-card')) {
            $args['one202x_prime_card_images'] = true;
        }

        return $args;
    }

    public function track_card_query(WP_Query $query): void
    {
        // Transfer the temporary marker to this query object; it is not a SQL filter.
        if ($query->get('one202x_prime_card_images')) {
            $this->card_queries[$query] = true;
        } else {
            unset($this->card_queries[$query]);
        }
        // The Post Template has the card marker, while its pagination does not.
        // Removing it lets both reuse the same cached query results.
        unset($query->query_vars['one202x_prime_card_images']);
    }

    public function prime_card_images(WP_Query $query): void
    {
        if (isset($this->card_queries[$query])) {
            // Populate WordPress's attachment caches for this batch of posts.
            // This prepares image data only; each Content Card still outputs its own image.
            update_post_thumbnail_cache($query);
        }
    }

    /**
     * Prepare cards in a Query Loop that inherits the current archive/search results.
     * That loop uses the main $wp_query instead of building a separate block query,
     * so the marker-and-loop_start route above would not identify it.
     * The context is returned unchanged; this method only prepares the image cache.
     *
     * @param array<string, mixed> $context
     * @param array<string, mixed> $parsed_block
     */
    public function prepare_inherited_images(array $context, array $parsed_block): array
    {
        if (($parsed_block['blockName'] ?? '') === 'core/post-template'
            && !empty($context['query']['inherit'])
            && ($GLOBALS['wp_query'] ?? null) instanceof WP_Query
            && !empty($GLOBALS['wp_query']->posts)
            && Blocks::contains($parsed_block['innerBlocks'] ?? [], 'one-202x/content-card')
        ) {
            update_post_thumbnail_cache($GLOBALS['wp_query']);
        }

        return $context;
    }

    /** Format only the marked total in the inherited search loop; run no extra query. */
    public function search_total(string $content, array $parsed_block, WP_Block $block): string
    {
        $html = new \WP_HTML_Tag_Processor($content);
        if (!is_search() || empty($block->context['query']['inherit'])
            || ($block->attributes['displayType'] ?? 'total-results') !== 'total-results'
            || !$html->next_tag(['class_name' => 'a2e-search-results__count'])) {
            return $content;
        }

        $total = (int) $GLOBALS['wp_query']->found_posts;
        /* translators: %s: number of matching search results. */
        $results = sprintf(_n('%s result', '%s results', $total, 'one-base-theme'), number_format_i18n($total));
        /* translators: 1: bold result count, 2: the visitor's search term. */
        $summary = sprintf(esc_html__('Showing %1$s for “%2$s”', 'one-base-theme'),
            '<strong>' . esc_html($results) . '</strong>', esc_html(get_search_query(false)));

        // Core outputs a single div with plain count text. Retain its attributes/styles.
        return str_replace('>' . wp_strip_all_tags($content) . '</div>', '>' . $summary . '</div>', $content);
    }
}
