<?php

declare(strict_types=1);

namespace One202x\Services;

final class ServicePostType
{
    public const POST_TYPE = 'service';

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
                    'name' => __('Services', 'one-services'),
                    'singular_name' => __('Service', 'one-services'),
                    'add_new_item' => __('Add service', 'one-services'),
                    'edit_item' => __('Edit service', 'one-services'),
                ],
                'public' => true,
                'show_in_rest' => true,
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'services',
                ],
                'menu_icon' => 'dashicons-admin-tools',
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail',
                    'page-attributes',
                    'revisions',
                ],
            ]
        );
    }
}
