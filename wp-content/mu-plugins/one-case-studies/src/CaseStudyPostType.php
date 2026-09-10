<?php

declare(strict_types=1);

namespace One202x\CaseStudies;

final class CaseStudyPostType
{
    public const POST_TYPE = 'case_study';

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
                    'name' => __('Case studies', 'one-case-studies'),
                    'singular_name' => __('Case study', 'one-case-studies'),
                    'add_new_item' => __('Add case study', 'one-case-studies'),
                    'edit_item' => __('Edit case study', 'one-case-studies'),
                ],
                'public' => true,
                'show_in_rest' => true,
                // The editable Case Studies page owns the listing URL.
                'has_archive' => false,
                'rewrite' => [
                    'slug' => 'case-studies',
                ],
                'menu_icon' => 'dashicons-portfolio',
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
