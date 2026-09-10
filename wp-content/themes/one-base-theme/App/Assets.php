<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Assets
{
    public function register_hooks(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        add_action('enqueue_block_assets', [$this, 'form_fields']);
    }

    public function version(string $relative_path): string
    {
        $path = get_theme_file_path($relative_path);

        return file_exists($path) ?
            (string) filemtime($path) :
            (string) wp_get_theme()->get('Version');
    }

    /** Shared fields load unmodified on the frontend and inside the editor iframe. */
    public function form_fields(): void
    {
        $path = 'assets/css/forms.css';
        wp_enqueue_style('one-202x-forms', get_theme_file_uri($path), [], $this->version($path));
    }

    public function enqueue(): void
    {
        $global_stylesheet = 'assets/css/global.css';

        wp_enqueue_style(
            'one-202x-global',
            get_theme_file_uri($global_stylesheet),
            [],
            $this->version($global_stylesheet)
        );

        wp_style_add_data(
            'one-202x-global',
            'path',
            get_theme_file_path($global_stylesheet)
        );

        $global_script = 'assets/js/global.js';

        // A base theme needs no global JavaScript until a site adds behavior.
        if (!is_file(get_theme_file_path($global_script)) || filesize(get_theme_file_path($global_script)) === 0) {
            return;
        }

        wp_enqueue_script_module(
            'one-202x-global',
            get_theme_file_uri($global_script),
            [],
            $this->version($global_script),
            [
                'in_footer' => true,
            ]
        );
    }
}
