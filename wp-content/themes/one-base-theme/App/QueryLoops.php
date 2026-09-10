<?php

declare(strict_types=1);

namespace One202x\Theme;

use WP_Block;
use WP_Query;

defined('ABSPATH') || exit;

final class QueryLoops
{
    /** @var \WeakMap<WP_Query, bool> Request-only state; never part of a cache key. */
    private \WeakMap $card_queries;

    public function __construct()
    {
        $this->card_queries = new \WeakMap();
    }

    public function register_hooks(): void
    {
        add_filter('query_loop_block_query_vars', [$this, 'prepare_query'], 20, 2);
        add_action('pre_get_posts', [$this, 'track_card_query']);
        add_action('loop_start', [$this, 'prime_card_images']);
        add_filter('render_block_context', [$this, 'prepare_inherited_images'], 10, 2);
    }

    /** @param array<string, mixed> $args */
    public function prepare_query(array $args, WP_Block $block): array
    {
        $type = $block->context['query']['postType'] ?? '';

        // Prevent Core's posts fallback for missing types; allow explicit private-type adapters.
        if (is_string($type) && $type !== '' && (
            !post_type_exists($type)
            || (!is_post_type_viewable($type) && ($args['post_type'] ?? '') !== $type)
        )) {
            $args['post__in'] = [0];
        }

        if (Blocks::contains($block->parsed_block['innerBlocks'] ?? [], 'one-202x/content-card')) {
            $args['one202x_prime_card_images'] = true;
        }

        return $args;
    }

    public function track_card_query(WP_Query $query): void
    {
        if ($query->get('one202x_prime_card_images')) {
            $this->card_queries[$query] = true;
        } else {
            unset($this->card_queries[$query]);
        }
        // Keep the Post Template and pagination on the same Core query-cache key.
        unset($query->query_vars['one202x_prime_card_images']);
    }

    public function prime_card_images(WP_Query $query): void
    {
        if (isset($this->card_queries[$query])) {
            // Prime card thumbnails together, as Core does for its Featured Image block.
            update_post_thumbnail_cache($query);
        }
    }

    /**
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
}
