<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Setup
{
    public function register_hooks(): void
    {
        add_action('after_setup_theme', [$this, 'setup']);
        add_action('init', [$this, 'register_pattern_category']);
        add_filter('default_template_types', [$this, 'describe_page_template']);
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

    public function register_pattern_category(): void
    {
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
