<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class BlockStyles
{
    private Assets $assets;

    public function __construct()
    {
        $this->assets = new Assets();
    }

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register_styles']);
        add_action('init', [$this, 'register_stylesheets']);
    }

    public function register_styles(): void
    {
        $styles = [
            'core/button' => [
                'outline-dark' => __('Outline Dark', 'one-base-theme'),
            ],
            'core/group' => [
                'card-light' => __('Light Card', 'one-base-theme'),
                'card-accent' => __('Accent Card', 'one-base-theme'),
                'card-dark' => __('Dark Card', 'one-base-theme'),
                'dark-panel' => __('Dark Panel', 'one-base-theme'),
                'sticky-head' => __('Sticky Head', 'one-base-theme'),
                'overlay-head' => __('Overlay Head', 'one-base-theme'),
            ],
            'core/image' => [
                'monochrome-logo' => __('Monochrome logo', 'one-base-theme'),
            ],
            'core/icon' => [
                'circle-dark' => __('Dark circle', 'one-base-theme'),
                'circle-accent' => __('Accent circle', 'one-base-theme'),
            ],
        ];

        foreach ($styles as $block_name => $block_styles) {
            foreach ($block_styles as $name => $label) {
                register_block_style($block_name, ['name' => $name, 'label' => $label]);
            }
        }

        // Preserve saved style names; add new variants in styles/blocks/*.json.
        $heading_labels = [
            1 => __('H1 appearance', 'one-base-theme'),
            2 => __('H2 appearance', 'one-base-theme'),
            3 => __('H3 appearance', 'one-base-theme'),
            4 => __('H4 appearance', 'one-base-theme'),
            5 => __('H5 appearance', 'one-base-theme'),
            6 => __('H6 appearance', 'one-base-theme'),
        ];

        foreach ($heading_labels as $level => $label) {
            register_block_style('core/paragraph', [
                'name' => 'heading-' . $level,
                'label' => $label,
                'style_data' => [
                    'typography' => wp_get_global_styles(['elements', 'h' . $level, 'typography']),
                ],
            ]);
        }
    }

    public function register_stylesheets(): void
    {
        $stylesheets = [];

        foreach (array_unique([get_template_directory(), get_stylesheet_directory()]) as $theme_root) {
            foreach (glob($theme_root . '/assets/blocks/core-*.css') ?: [] as $file) {
                $name = basename($file, '.css');
                $stylesheets['core/' . substr($name, 5)] = 'assets/blocks/' . $name . '.css';
            }
        }

        foreach ($stylesheets as $block_name => $stylesheet) {
            wp_enqueue_block_style(
                $block_name,
                [
                    'handle' => 'one-202x-' . str_replace('/', '-', $block_name),
                    'src' => get_theme_file_uri($stylesheet),
                    'path' => get_theme_file_path($stylesheet),
                    'ver' => $this->assets->version($stylesheet),
                ]
            );
        }
    }
}
