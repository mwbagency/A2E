<?php

declare(strict_types=1);

namespace One202x\Testimonials;

final class TestimonialTaxonomy
{
    public const TAXONOMY = 'testimonial_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [TestimonialPostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Testimonial categories', 'one-testimonials'),
                    'singular_name' => __('Testimonial category', 'one-testimonials'),
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
