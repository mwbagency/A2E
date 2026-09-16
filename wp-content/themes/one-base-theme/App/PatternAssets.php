<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

/**
 * Connects a pattern's marker class to its built CSS and optional frontend JavaScript.
 * For example, one-202x-pattern-show019_programmes-grid finds a file named
 * show019_programmes-grid.css anywhere under assets/patterns.
 * Markers survive when a pattern is inserted as ordinary editable blocks, so this
 * does not depend on a saved link back to the original pattern registration.
 */
final class PatternAssets
{
    private const PATTERN_CLASS_PREFIX = 'one-202x-pattern-';

    /** @var array<string, string>|null Slug-to-path cache for this class instance. */
    private ?array $stylesheet_index = null;

    /** @var array<string, string>|null JavaScript uses a separate slug-to-path cache. */
    private ?array $script_module_index = null;

    public function register_hooks(): void
    {
        // Discover frontend requirements from blocks actually being rendered.
        add_filter('render_block', [$this, 'enqueue_assets_for_block'], 10, 2);
        // The editor also needs styles for patterns that have not yet been inserted.
        add_action('after_setup_theme', [$this, 'register_editor_stylesheets']);
    }

    /** Load matching assets when a pattern marker is rendered. */
    public function enqueue_assets_for_block(
        string $block_content,
        array $block
    ): string {
        $class_name = $block['attrs']['className'] ?? '';

        if (!is_string($class_name)) {
            return $block_content;
        }

        $classes = preg_split('/\s+/', trim($class_name)) ?: [];

        // Multiple marker classes can intentionally reuse more than one pattern's assets.
        foreach ($classes as $class) {
            if (!str_starts_with($class, self::PATTERN_CLASS_PREFIX)) {
                continue;
            }

            // Use the marker as an index key, never as an arbitrary filesystem path.
            $slug = substr($class, strlen(self::PATTERN_CLASS_PREFIX));

            if (!preg_match('/^[a-z0-9_-]+$/', $slug)) {
                continue;
            }

            $this->enqueue_pattern_stylesheet($slug);
            $this->enqueue_pattern_script_module($slug);
        }

        // Asset discovery does not change the block's rendered HTML.
        return $block_content;
    }

    /** Include every pattern stylesheet in editor previews. */
    public function register_editor_stylesheets(): void
    {
        $stylesheets = array_values($this->get_pattern_stylesheets());

        if ($stylesheets !== []) {
            add_editor_style($stylesheets);
        }
    }

    private function enqueue_pattern_stylesheet(string $slug): void
    {
        // A pattern can reuse another pattern's CSS or need no dedicated stylesheet.
        $stylesheet = $this->get_pattern_stylesheets()[$slug] ?? null;

        if (!is_string($stylesheet)) {
            return;
        }

        $path = get_theme_file_path($stylesheet);

        if (!is_file($path)) {
            return;
        }

        // A stable handle lets WordPress load this asset once even if several blocks use it.
        $handle = self::PATTERN_CLASS_PREFIX . $slug;

        wp_register_style(
            $handle,
            get_theme_file_uri($stylesheet),
            [],
            (string) filemtime($path)
        );
        wp_style_add_data($handle, 'path', $path);
        wp_enqueue_style($handle);
    }

    private function enqueue_pattern_script_module(string $slug): void
    {
        // Optional scripts follow the same filename convention under assets/js/patterns.
        // They provide frontend behaviour; editor previews receive the CSS separately.
        $script_module = $this->get_pattern_script_modules()[$slug] ?? null;

        if (!is_string($script_module)) {
            return;
        }

        $path = get_theme_file_path($script_module);

        if (!is_file($path)) {
            return;
        }

        wp_enqueue_script_module(
            self::PATTERN_CLASS_PREFIX . $slug . '-view',
            get_theme_file_uri($script_module),
            [],
            (string) filemtime($path),
            ['in_footer' => true]
        );
    }

    /** @return array<string, string> */
    private function get_pattern_stylesheets(): array
    {
        // Scan once per instance, rather than walking the directories for every block.
        if ($this->stylesheet_index === null) {
            $this->stylesheet_index = $this->index_pattern_assets(
                'assets/patterns',
                'css'
            );
        }

        return $this->stylesheet_index;
    }

    /** @return array<string, string> */
    private function get_pattern_script_modules(): array
    {
        if ($this->script_module_index === null) {
            $this->script_module_index = $this->index_pattern_assets(
                'assets/js/patterns',
                'js'
            );
        }

        return $this->script_module_index;
    }

    /**
     * Index by filename, with child assets overriding parent assets.
     * Subfolders organise files but are not part of the marker, so each filename
     * must be unique within a theme's CSS index or JavaScript index.
     *
     * @return array<string, string>
     */
    private function index_pattern_assets(
        string $relative_directory,
        string $extension
    ): array {
        $index = [];
        foreach (array_unique([get_template_directory(), get_stylesheet_directory()]) as $theme_root) {
            $directory = $theme_root . '/' . $relative_directory;

            if (!is_dir($directory)) {
                continue;
            }

            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(
                    $directory,
                    \FilesystemIterator::SKIP_DOTS
                )
            );

            // Store theme-relative paths so WordPress can resolve the matching file/URL.
            $root_path = trailingslashit(wp_normalize_path($theme_root));

            foreach ($iterator as $file) {
                if (
                    !$file->isFile()
                    || strtolower($file->getExtension()) !== $extension
                ) {
                    continue;
                }

                $slug = $file->getBasename('.' . $file->getExtension());

                if (!preg_match('/^[a-z0-9_-]+$/', $slug)) {
                    continue;
                }

                $file_path = wp_normalize_path($file->getPathname());
                $index[$slug] = substr($file_path, strlen($root_path));
            }
        }

        return $index;
    }
}
