<?php

declare(strict_types=1);

namespace One202x\Events;

final class EventTaxonomy
{
    public const TAXONOMY = 'event_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [EventPostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Event categories', 'one-events'),
                    'singular_name' => __('Event category', 'one-events'),
                ],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => [
                    'slug' => 'event-category',
                    'with_front' => false,
                ],
            ]
        );
    }
}
