<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class PatternAssets
{
    private const PATTERN_CLASS_PREFIX = 'one-202x-pattern-';

    /** @var array<string, string>|null */
    private ?array $stylesheet_index = null;

    /** @var array<string, string>|null */
    private ?array $script_module_index = null;

    public function register_hooks(): void
    {
        add_filter('render_block', [$this, 'enqueue_assets_for_block'], 10, 2);
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

        foreach ($classes as $class) {
            if (!str_starts_with($class, self::PATTERN_CLASS_PREFIX)) {
                continue;
            }

            $slug = substr($class, strlen(self::PATTERN_CLASS_PREFIX));

            if (!preg_match('/^[a-z0-9_-]+$/', $slug)) {
                continue;
            }

            $this->enqueue_pattern_stylesheet($slug);
            $this->enqueue_pattern_script_module($slug);
        }

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
        $stylesheet = $this->get_pattern_stylesheets()[$slug] ?? null;

        if (!is_string($stylesheet)) {
            return;
        }

        $path = get_theme_file_path($stylesheet);

        if (!is_file($path)) {
            return;
        }

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
