<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Blocks
{
    /**
     * Find a component in this layout, including published synced patterns.
     * Nested queries own their components; repeated pattern references cannot loop.
     *
     * @param array<array<string, mixed>> $blocks
     * @param array<int, true> $seen_refs
     */
    public static function contains(array $blocks, string $name, array $seen_refs = []): bool
    {
        foreach ($blocks as $block) {
            $block_name = $block['blockName'] ?? '';
            if ($block_name === $name) {
                return true;
            }
            if ($block_name === 'core/query') {
                continue;
            }
            if ($block_name === 'core/block') {
                $reference = (int) ($block['attrs']['ref'] ?? 0);
                if ($reference <= 0 || isset($seen_refs[$reference])) {
                    continue;
                }
                $pattern = get_post($reference);
                if (!$pattern || $pattern->post_type !== 'wp_block'
                    || $pattern->post_status !== 'publish' || $pattern->post_password !== '') {
                    continue;
                }
                $seen_refs[$reference] = true;
                if (self::contains(parse_blocks($pattern->post_content), $name, $seen_refs)) {
                    return true;
                }
            } elseif (self::contains($block['innerBlocks'] ?? [], $name, $seen_refs)) {
                return true;
            }
        }

        return false;
    }

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
        add_filter(
            'render_block_core/navigation',
            [$this, 'isolate_mobile_navigation_context'],
            10,
            2
        );
    }

    /**
     * Prevent the nested mobile Navigation from inheriting the open state of
     * its parent overlay. Core can then manage each submenu independently.
     *
     * @param array<string, mixed> $block
     */
    public function isolate_mobile_navigation_context(
        string $block_content,
        array $block
    ): string {
        $class_name = $block['attrs']['className'] ?? '';

        if (!is_string($class_name)) {
            return $block_content;
        }

        $classes = preg_split('/\s+/', trim($class_name)) ?: [];

        if (!in_array('one-202x-mobile-nav__menu', $classes, true)) {
            return $block_content;
        }

        $processor = new \WP_HTML_Tag_Processor($block_content);

        if (
            !$processor->next_tag([
                'class_name' => 'one-202x-mobile-nav__menu',
            ])
        ) {
            return $block_content;
        }

        $processor->set_attribute(
            'data-wp-context',
            (string) wp_json_encode([
                'overlayOpenedBy' => [
                    'click' => false,
                    'hover' => false,
                    'focus' => false,
                ],
            ])
        );

        return $processor->get_updated_html();
    }

    public function register(): void
    {
        $assets = new Assets();
        $view_script = 'blocks/media-cover/view.js';

        wp_register_script(
            'one-202x-media-cover-view',
            get_theme_file_uri($view_script),
            array(),
            $assets->version($view_script),
            array(
                'in_footer' => true,
                'strategy'  => 'defer',
            )
        );

        // Child block metadata overrides the matching parent directory.
        $metadata_files = [];
        $theme_roots = array_unique([get_template_directory(), get_stylesheet_directory()]);

        foreach ($theme_roots as $theme_root) {
            foreach (glob($theme_root . '/blocks/*/block.json') ?: [] as $file) {
                $metadata_files[basename(dirname($file))] = $file;
            }
        }

        ksort($metadata_files);

        foreach ($metadata_files as $file) {
            $block_type = register_block_type($file);

            if (!$block_type) {
                continue;
            }

            // Use the textdomain Core registered from block.json.
            foreach (array_merge($block_type->editor_script_handles, $block_type->script_handles, $block_type->view_script_handles) as $handle) {
                $script = wp_scripts()->registered[$handle] ?? null;
                $textdomain = $script->textdomain ?? '';

                if ($script && is_string($textdomain) && $textdomain !== '' && in_array('wp-i18n', $script->deps, true)) {
                    // Parent blocks keep their own catalogue when a child has translations.
                    wp_set_script_translations($handle, $textdomain, dirname($file, 3) . '/languages');
                }
            }
        }
    }
}
