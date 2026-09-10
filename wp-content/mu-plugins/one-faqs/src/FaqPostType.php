<?php

declare(strict_types=1);

namespace One202x\Faqs;

final class FaqPostType
{
    public const POST_TYPE = 'faq';

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
                    'name' => __('FAQs', 'one-faqs'),
                    'singular_name' => __('FAQ', 'one-faqs'),
                    'add_new_item' => __('Add FAQ', 'one-faqs'),
                    'edit_item' => __('Edit FAQ', 'one-faqs'),
                ],
                'public' => false,
                'show_ui' => true,
                'show_in_rest' => true,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'has_archive' => false,
                'menu_icon' => 'dashicons-editor-help',
                'supports' => [
                    'title',
                    'page-attributes',
                    'revisions',
                ],
            ]
        );
    }
}
