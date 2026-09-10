<?php

declare(strict_types=1);

namespace One202x\Events;

final class EventPostType
{
    public const POST_TYPE = 'event';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_post_type(
            self::POST_TYPE,
            [
                'labels' => [
                    'name' => __('Events', 'one-events'),
                    'singular_name' => __('Event', 'one-events'),
                    'add_new_item' => __('Add event', 'one-events'),
                    'edit_item' => __('Edit event', 'one-events'),
                ],
                'public' => true,
                'show_in_rest' => true,
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'events',
                ],
                'menu_icon' => 'dashicons-calendar-alt',
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail',
                    'revisions',
                ],
            ]
        );
    }
}
