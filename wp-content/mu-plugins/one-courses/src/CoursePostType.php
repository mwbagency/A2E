<?php

declare(strict_types=1);

namespace One202x\Courses;

final class CoursePostType
{
    public const POST_TYPE = 'course';

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
                    'name' => __('Courses', 'one-courses'),
                    'singular_name' => __('Course', 'one-courses'),
                    'add_new_item' => __('Add course', 'one-courses'),
                    'edit_item' => __('Edit course', 'one-courses'),
                ],
                'public' => true,
                'show_in_rest' => true,
                'rest_base' => 'courses',
                'has_archive' => false,
                'rewrite' => [
                    'slug' => 'courses',
                    'with_front' => false,
                ],
                'menu_icon' => 'dashicons-welcome-learn-more',
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail',
                    'custom-fields', // Required for ACF's REST-based editor saves.
                    'revisions',
                ],
            ]
        );
    }
}
