<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Setup
{
    public function register_hooks(): void
    {
        add_action('after_setup_theme', [$this, 'setup']);
        add_action('init', [$this, 'register_pattern_category']);
        add_filter('block_categories_all', [$this, 'register_block_category']);
        add_filter('default_template_types', [$this, 'describe_page_template']);
        add_filter('register_service_post_type_args', [$this, 'service_editor_template']);
        add_filter('register_course_post_type_args', [$this, 'course_editor_template']);
        add_action('enqueue_block_editor_assets', [$this, 'simple_page_starter']);
    }

    public function setup(): void
    {
        load_theme_textdomain('one-base-theme', get_template_directory() . '/languages');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('responsive-embeds');
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');

        add_theme_support('html5', [
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        add_theme_support('custom-logo', [
            'height'      => 43,
            'width'       => 116,
            'flex-height' => true,
            'flex-width'  => true,
        ]);

        add_editor_style('assets/css/global.css');

        add_image_size('featured-card', 400, 300, true);
    }

    /**
     * Start empty Services with editable blocks from the design. WordPress expands
     * this unsynced pattern in the editor; existing content is never overwritten.
     * The layout belongs to this theme, while registration and fields stay in the MU plugin.
     */
    public function service_editor_template(array $args): array
    {
        $args['template'] = [['core/pattern', ['slug' => 'one-202x/page005_service-detail']]];

        return $args;
    }

    /** Give new courses editable section patterns; the single template owns the hero. */
    public function course_editor_template(array $args): array
    {
        $args['template'] = [['core/pattern', ['slug' => 'one-202x/page014_course']]];

        return $args;
    }

    /** Load per-page starter text only in the page editor; the template remains shared. */
    public function simple_page_starter(): void
    {
        $screen = get_current_screen();
        if (!$screen || $screen->base !== 'post' || $screen->post_type !== 'page') {
            return;
        }

        $pattern = \WP_Block_Patterns_Registry::get_instance()->get_registered('one-202x/cont014_simple-page-starter');
        if (!$pattern) {
            return;
        }

        $path = 'assets/js/editor/simple-page-starter.js';
        wp_enqueue_script('one-202x-simple-page-starter', get_theme_file_uri($path),
            ['wp-dom-ready', 'wp-data', 'wp-blocks', 'wp-core-data', 'wp-editor'],
            (new Assets())->version($path), true);
        wp_add_inline_script('one-202x-simple-page-starter',
            'window.one202xSimplePageStarter = ' . wp_json_encode($pattern['content']) . ';', 'before');
    }

    public function register_pattern_category(): void
    {
        register_block_pattern_category('a2e', ['label' => __('A2E', 'one-base-theme')]);

        register_block_pattern_category(
            'one-202x',
            [
                'label' => __('One Base', 'one-base-theme'),
            ]
        );

        $categories = [
            'hero' => __('Heroes', 'one-base-theme'),
            'cont' => __('Content', 'one-base-theme'),
            'show' => __('Showcase', 'one-base-theme'),
            'form' => __('Forms', 'one-base-theme'),
            'othe' => __('Listings', 'one-base-theme'),
            'ctas' => __('Calls to action', 'one-base-theme'),
        ];
        foreach ($categories as $type => $label) {
            register_block_pattern_category('one-202x-' . $type, ['label' => $label]);
        }
    }

    public function register_block_category(array $categories): array
    {
        // Only blocks and patterns newly created for A2E use "a2e"; inherited components keep their categories.
        array_unshift($categories, [
            'slug' => 'a2e',
            'title' => __('A2E', 'one-base-theme'),
        ]);

        return $categories;
    }

    /**
     * @param array<string, array<string, string>> $types Native template descriptions.
     * @return array<string, array<string, string>>
     */
    public function describe_page_template(array $types): array
    {
        $types['page']['title'] = __('Page — title in content', 'one-base-theme');
        $types['page']['description'] = __('For pages with a hero or their own H1 heading. Use Page — automatic title when the template should display the page title.', 'one-base-theme');

        return $types;
    }
}
