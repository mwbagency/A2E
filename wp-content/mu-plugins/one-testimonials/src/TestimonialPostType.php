<?php

declare(strict_types=1);

namespace One202x\Testimonials;

final class TestimonialPostType
{
    public const POST_TYPE = 'testimonial';

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
                    'name' => __('Testimonials', 'one-testimonials'),
                    'singular_name' => __('Testimonial', 'one-testimonials'),
                    'add_new_item' => __('Add testimonial', 'one-testimonials'),
                    'edit_item' => __('Edit testimonial', 'one-testimonials'),
                ],
                'public' => false,
                'show_ui' => true,
                'show_in_rest' => true,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'has_archive' => false,
                'menu_icon' => 'dashicons-format-quote',
                'supports' => [
                    'title',
                    'thumbnail',
                    'page-attributes',
                    'revisions',
                ],
            ]
        );
    }
}
