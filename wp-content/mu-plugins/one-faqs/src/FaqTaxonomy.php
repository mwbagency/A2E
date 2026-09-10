<?php

declare(strict_types=1);

namespace One202x\Faqs;

final class FaqTaxonomy
{
    public const TAXONOMY = 'faq_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [FaqPostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('FAQ categories', 'one-faqs'),
                    'singular_name' => __('FAQ category', 'one-faqs'),
                ],
                'public' => false,
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'hierarchical' => true,
                'query_var' => false,
                'rewrite' => false,
            ]
        );
    }
}
