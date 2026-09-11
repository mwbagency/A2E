<?php

declare(strict_types=1);

namespace One202x\Courses;

final class CourseTaxonomy
{
    public const TAXONOMY = 'course_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [CoursePostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Course categories', 'one-courses'),
                    'singular_name' => __('Course category', 'one-courses'),
                ],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => [
                    'slug' => 'course-category',
                    'with_front' => false,
                ],
            ]
        );
    }
}
