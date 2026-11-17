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
        add_filter('block_editor_settings_all', [$this, 'edit_inserted_patterns_as_blocks'], 10, 2);
        add_filter('register_post_type_args', [$this, 'keep_pattern_definitions_in_code'], 10, 2);
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

    /** Keep page-local copies directly editable without changing their code-defined source. */
    public function edit_inserted_patterns_as_blocks(array $settings, \WP_Block_Editor_Context $context): array
    {
        if ($context->name === 'core/edit-post') {
            // patternName records where blocks came from; it does not make them shared.
            // Disable Core's automatic content-only mode for these inserted copies.
            $settings['disableContentOnlyForUnsyncedPatterns'] = true;
        }

        return $settings;
    }

    /** The section catalogue is registered by the theme, not authored as wp_block records. */
    public function keep_pattern_definitions_in_code(array $args, string $post_type): array
    {
        if ($post_type !== 'wp_block') {
            return $args;
        }

        // Scope this to pattern definitions; page editing and pattern insertion stay available.
        foreach ([
            'create_posts',
            'edit_posts',
            'edit_others_posts',
            'edit_private_posts',
            'edit_published_posts',
            'publish_posts',
            'delete_posts',
            'delete_others_posts',
            'delete_private_posts',
            'delete_published_posts',
        ] as $capability) {
            $args['capabilities'][$capability] = 'do_not_allow';
        }

        return $args;
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
