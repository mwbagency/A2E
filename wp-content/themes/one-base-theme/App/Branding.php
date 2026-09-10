<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Branding
{
    public function register_hooks(): void
    {
        add_action('after_switch_theme', [$this, 'install_defaults']);
        add_action('admin_init', [$this, 'install_defaults']);
    }

    /** Seed native media settings once; subsequent editor choices are preserved. */
    public function install_defaults(): void
    {
        if (!current_user_can('edit_theme_options') || get_theme_mod('a2e_branding_initialized')) {
            return;
        }

        $assets = [
            'a-to-e-logo.svg' => [__('A to E Training & Solutions', 'one-base-theme'), 116, 43],
            'a-to-e-logo-light.svg' => [__('A to E Training & Solutions — light logo', 'one-base-theme'), 116, 43],
            'a-to-e-icon.svg' => [__('A to E — symbol', 'one-base-theme'), 66, 43],
            'a-to-e-favicon.png' => [__('A to E — site icon', 'one-base-theme'), 513, 513],
        ];
        $ids = [];

        foreach ($assets as $filename => [$title, $width, $height]) {
            $ids[$filename] = $this->import_asset($filename, $title, $width, $height);
            if (!$ids[$filename]) {
                return;
            }
        }

        if (!get_theme_mod('custom_logo')) {
            set_theme_mod('custom_logo', $ids['a-to-e-logo.svg']);
        }
        if (!get_option('site_icon')) {
            update_option('site_icon', $ids['a-to-e-favicon.png']);
        }

        set_theme_mod('a2e_branding_initialized', true);
    }

    private function import_asset(string $filename, string $title, int $width, int $height): int
    {
        $existing = get_posts([
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'meta_key' => '_a2e_brand_asset',
            'meta_value' => $filename,
            'fields' => 'ids',
            'posts_per_page' => 1,
        ]);
        if ($existing) {
            return (int) $existing[0];
        }

        $source = get_theme_file_path('assets/images/' . $filename);
        if (!is_readable($source)) {
            return 0;
        }

        // Only these bundled exports are imported; SVG uploads are not enabled globally.
        $uploads = wp_upload_dir();
        if ($uploads['error']) {
            return 0;
        }
        $file = $uploads['path'] . '/' . wp_unique_filename($uploads['path'], $filename);
        if (!copy($source, $file)) {
            return 0;
        }

        $id = wp_insert_attachment([
            'post_title' => $title,
            'post_mime_type' => str_ends_with($filename, '.svg') ? 'image/svg+xml' : 'image/png',
            'post_status' => 'inherit',
        ], $file, 0, true);
        if (is_wp_error($id)) {
            wp_delete_file($file);
            return 0;
        }

        update_post_meta($id, '_a2e_brand_asset', $filename);
        update_post_meta($id, '_wp_attachment_image_alt', __('A to E Training & Solutions', 'one-base-theme'));
        wp_update_attachment_metadata($id, [
            'width' => $width,
            'height' => $height,
            'file' => _wp_relative_upload_path($file),
            'sizes' => [],
        ]);

        return (int) $id;
    }
}
