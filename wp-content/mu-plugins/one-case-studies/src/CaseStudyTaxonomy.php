<?php

declare(strict_types=1);

namespace One202x\CaseStudies;

final class CaseStudyTaxonomy
{
    public const TAXONOMY = 'case_study_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [CaseStudyPostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Case study categories', 'one-case-studies'),
                    'singular_name' => __('Case study category', 'one-case-studies'),
                ],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => [
                    'slug' => 'case-study-category',
                    'with_front' => false,
                ],
            ]
        );
    }
}
