<?php

namespace One202x\Theme;

defined('ABSPATH') || exit;

final class Navigation
{
    public function register_hooks(): void
    {
        add_action('after_switch_theme', [$this, 'install_defaults']);
        add_action('admin_init', [$this, 'install_defaults']);
    }

    /** Desktop and drawer reference the same native, editor-managed menus. */
    public function install_defaults(): void
    {
        if (!current_user_can('edit_theme_options') || get_theme_mod('a2e_navigation_initialized')) {
            return;
        }

        $menus = (array) get_theme_mod('a2e_navigation_menus', []);
        foreach (['primary' => __('Primary navigation', 'one-base-theme'), 'utility' => __('Utility navigation', 'one-base-theme')] as $role => $title) {
            if (self::reference($role)) {
                continue;
            }

            $id = wp_insert_post([
                'post_type' => 'wp_navigation',
                'post_status' => 'publish',
                'post_title' => $title,
                'post_content' => wp_slash(self::default_items($role)),
            ], true);
            if (is_wp_error($id)) {
                return;
            }

            $menus[$role] = $id;
            set_theme_mod('a2e_navigation_menus', $menus);
        }

        set_theme_mod('a2e_navigation_initialized', true);
    }

    public static function reference(string $role): array
    {
        $menus = (array) get_theme_mod('a2e_navigation_menus', []);
        $menu = get_post((int) ($menus[$role] ?? 0));

        return $menu && $menu->post_type === 'wp_navigation' && $menu->post_status === 'publish'
            ? ['ref' => $menu->ID]
            : [];
    }

    public static function default_items(string $role): string
    {
        $links = $role === 'utility' ? [
            ['careers', __('Careers', 'one-base-theme')],
            ['knowledge-hub', __('Knowledge Hub', 'one-base-theme')],
        ] : [
            ['about-us', __('About us', 'one-base-theme')],
            ['services', __('Services', 'one-base-theme')],
            ['who-we-help', __('Who we help', 'one-base-theme')],
            ['defibrillators-accessories', __('Defibrillators & Accessories', 'one-base-theme')],
        ];
        $content = '';

        foreach ($links as [$slug, $label]) {
            $content .= self::link($slug, $label);
        }

        if ($role === 'primary') {
            $content .= get_comment_delimited_block_content('core/search', [
                'label' => __('Search', 'one-base-theme'),
                'showLabel' => false,
                'buttonPosition' => 'button-only',
                'buttonUseIcon' => true,
                'className' => 'one-202x-head__search',
            ], '');
            $content .= self::link('contact', __('Contact us', 'one-base-theme'), 'one-202x-head__contact');
        }

        return $content;
    }

    private static function link(string $slug, string $label, string $class = ''): string
    {
        $page = get_page_by_path($slug);
        $url = $page && $page->post_status === 'publish' ? get_permalink($page) : home_url('/' . $slug . '/');
        if (!$page && $slug === 'services') {
            $url = get_post_type_archive_link('service') ?: $url;
        }

        return get_comment_delimited_block_content('core/navigation-link', array_filter([
            'label' => $label,
            'url' => $url,
            'kind' => 'custom',
            'className' => $class,
        ]), '');
    }
}
