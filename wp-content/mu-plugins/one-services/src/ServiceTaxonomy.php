<?php

declare(strict_types=1);

namespace One202x\Services;

final class ServiceTaxonomy
{
    public const TAXONOMY = 'service_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [ServicePostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Service categories', 'one-services'),
                    'singular_name' => __('Service category', 'one-services'),
                ],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => [
                    'slug' => 'service-category',
                    'with_front' => false,
                ],
            ]
        );
    }
}
