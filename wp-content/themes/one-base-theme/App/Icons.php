<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Icons
{
    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        if (!function_exists('wp_register_icon_collection') || !function_exists('wp_register_icon')) {
            return;
        }

        // The root collection keeps the identifiers already used in saved content.
        $collections = [
            '' => __('One Base', 'one-base-theme'),
            'regular' => __('One Base — Regular', 'one-base-theme'),
            'solid' => __('One Base — Solid', 'one-base-theme'),
            'thin' => __('One Base — Thin', 'one-base-theme'),
        ];

        /**
         * Translate new icon names here when extending the theme from a child theme.
         *
         * @param array<string, string> $labels Icon filename stems and translated labels.
         */
        $labels = apply_filters('one202x/icons/labels', require __DIR__ . '/../config/icon-labels.php');

        foreach ($collections as $pack => $label) {
            $collection = 'one-202x' . ($pack !== '' ? '-' . $pack : '');
            wp_register_icon_collection($collection, ['label' => $label]);

            foreach ($this->files($pack) as $slug => $file_path) {
                // New files work immediately; the label map supplies extractable translations.
                $icon_label = $labels[$slug] ?? ucfirst(str_replace(['-', '_'], ' ', $slug));
                wp_register_icon($collection . '/' . $slug, [
                    'label' => $icon_label,
                    'file_path' => $file_path,
                ]);
            }
        }
    }

    /**
     * Find direct SVG children, allowing a child theme to add or replace individual files.
     * WordPress reads and sanitizes the SVG only when it is rendered or requested by the editor.
     *
     * @return array<string, string> Icon filename stems and absolute paths.
     */
    private function files(string $pack): array
    {
        $files = [];
        $relative_path = '/assets/icons' . ($pack !== '' ? '/' . $pack : '');

        foreach (array_unique([get_template_directory(), get_stylesheet_directory()]) as $theme_path) {
            foreach (glob($theme_path . $relative_path . '/*.svg') ?: [] as $file_path) {
                $slug = pathinfo($file_path, PATHINFO_FILENAME);

                if (preg_match('/^[a-z0-9](?:[a-z0-9_-]*[a-z0-9])?$/D', $slug)
                    && is_file($file_path) && is_readable($file_path)) {
                    $files[$slug] = $file_path;
                }
            }
        }

        ksort($files);
        return $files;
    }
}
