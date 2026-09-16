<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

/**
 * Loads site-wide frontend assets and the shared form-field stylesheet.
 * Block-specific files are registered by Blocks/BlockStyles; pattern-specific
 * files are handled by PatternAssets. It also exposes a file-version helper for
 * other theme components.
 */
final class Assets
{
    public function register_hooks(): void
    {
        // Site-wide assets belong to the public page; form styling is also needed
        // inside the block editor so its previews use the same field appearance.
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        add_action('enqueue_block_assets', [$this, 'form_fields']);
    }

    public function version(string $relative_path): string
    {
        // Changing a built file changes its URL version, so browsers fetch the update.
        // Theme file lookup respects child-theme overrides; missing files use the theme version.
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
        // These are built assets. Edit src/styles and src/scripts, then run the build.
        $global_stylesheet = 'assets/css/global.css';

        wp_enqueue_style(
            'one-202x-global',
            get_theme_file_uri($global_stylesheet),
            [],
            $this->version($global_stylesheet)
        );

        // Give WordPress the filesystem path as well as the URL, allowing its
        // stylesheet-loading logic to inspect the file or inline it when appropriate.
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

        // Global frontend JavaScript is an ES module, loaded in the footer.
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
