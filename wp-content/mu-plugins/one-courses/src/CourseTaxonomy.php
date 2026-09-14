<?php

declare(strict_types=1);

namespace One202x\Courses;

final class CourseTaxonomy
{
    public const TAXONOMY = 'course_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
        add_filter('acf/load_value/key=field_one202x_course_details_difficulty', [$this, 'load_difficulty'], 10, 2);
    }

    public function load_difficulty(mixed $value, mixed $post_id): string
    {
        return is_numeric($post_id) ? self::difficulty((int) $post_id) : '';
    }

    public static function difficulty(int $post_id): string
    {
        $terms = get_the_terms($post_id, 'course_difficulty');
        return is_array($terms) ? implode(', ', wp_list_pluck($terms, 'name')) : '';
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

        foreach ([
            'course_difficulty' => __('Difficulty', 'one-courses'),
            'course_validation' => __('Validation (years)', 'one-courses'),
            'course_duration' => __('Duration (hours)', 'one-courses'),
            'course_price' => __('Price', 'one-courses'),
        ] as $taxonomy => $label) {
            register_taxonomy($taxonomy, [CoursePostType::POST_TYPE], [
                'labels' => ['name' => $label, 'singular_name' => $label],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => false,
                'query_var' => false,
            ]);
        }
    }
}
