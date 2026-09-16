<?php

declare(strict_types=1);

namespace One202x\Testimonials;

final class TestimonialPostType
{
    public const POST_TYPE = 'testimonial';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
        add_filter('rest_testimonial_collection_params', [$this, 'video_parameter']);
        add_filter('rest_testimonial_query', [$this, 'filter_video_request'], 10, 2);
        add_filter('query_loop_block_query_vars', [$this, 'filter_video_block'], 20, 2);
        add_filter('query_loop_block_query_vars', [$this, 'filter_text_block'], 20, 2);
    }

    public function video_parameter(array $params): array
    {
        $params['testimonialVideoOnly'] = [
            'description' => __('Only testimonials with an enabled video upload.', 'one-testimonials'),
            'type' => 'boolean',
            'default' => false,
        ];
        $params['testimonialTextOnly'] = [
            'description' => __('Only testimonials with quote text and a client logo.', 'one-testimonials'),
            'type' => 'boolean',
            'default' => false,
        ];
        return $params;
    }

    public function filter_video_request(array $args, \WP_REST_Request $request): array
    {
        if ($request->get_param('testimonialVideoOnly')) {
            $args = $this->video_query($args);
        }
        return $request->get_param('testimonialTextOnly') ? $this->text_query($args) : $args;
    }

    public function filter_text_block(array $args, \WP_Block $block): array
    {
        $query = $block->context['query'] ?? [];
        return ($query['postType'] ?? '') === self::POST_TYPE && !empty($query['testimonialTextOnly'])
            ? $this->text_query($args) : $args;
    }

    private function text_query(array $args): array
    {
        // Filter before the result limit, so incomplete entries do not leave empty cards.
        // A video testimonial can also appear here when both text and a logo are supplied.
        $meta = [
            'relation' => 'AND',
            ['key' => 'quote', 'value' => '[^[:space:]]', 'compare' => 'REGEXP'],
            ['key' => '_thumbnail_id', 'value' => 0, 'compare' => '>', 'type' => 'NUMERIC'],
        ];
        if (!empty($args['meta_query'])) {
            $meta[] = $args['meta_query'];
        }
        $args['meta_query'] = $meta;
        return $args;
    }

    public function filter_video_block(array $args, \WP_Block $block): array
    {
        $query = $block->context['query'] ?? [];
        return ($query['postType'] ?? '') === self::POST_TYPE && !empty($query['testimonialVideoOnly'])
            ? $this->video_query($args) : $args;
    }

    private function video_query(array $args): array
    {
        $meta = [
            'relation' => 'AND',
            ['key' => 'video_enabled', 'value' => '1'],
            ['key' => 'video', 'value' => 0, 'compare' => '>', 'type' => 'NUMERIC'],
        ];
        if (!empty($args['meta_query'])) {
            $meta[] = $args['meta_query'];
        }
        $args['meta_query'] = $meta;
        return $args;
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
                    'featured_image' => __('Client logo', 'one-testimonials'),
                    'set_featured_image' => __('Set client logo', 'one-testimonials'),
                    'remove_featured_image' => __('Remove client logo', 'one-testimonials'),
                    'use_featured_image' => __('Use as client logo', 'one-testimonials'),
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
