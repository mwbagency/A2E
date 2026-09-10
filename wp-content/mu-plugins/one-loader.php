<?php
/**
 * Plugin Name: One MU Plugin Loader
 * Description: Loads the site-owned One MU plugins.
 * Text Domain: one-202x-platform
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$autoload = dirname(__DIR__, 2) . '/vendor/autoload.php';

if (!is_readable($autoload)) {
    add_action('init', static function (): void {
        load_muplugin_textdomain('one-202x-platform', 'one-202x-platform/languages');
    }, 0);
    $notice = static function (): void {
        if (current_user_can('manage_options') || current_user_can('manage_network_options')) {
            echo '<div class="notice notice-error"><p>';
            esc_html_e('Site content modules could not load. Ask the site developer to run composer install from the WordPress project root.', 'one-202x-platform');
            echo '</p></div>';
        }
    };
    add_action('admin_notices', $notice);
    add_action('network_admin_notices', $notice);
    return;
}

require_once $autoload;

// Load after root MU files so site configuration can select its content modules.
add_action('muplugins_loaded', static function (): void {
    $plugins = glob(__DIR__ . '/one-*/plugin.php') ?: [];
    sort($plugins, SORT_STRING);

    foreach ($plugins as $plugin) {
        $domain = basename(dirname($plugin));
        // The shared data/field layer is a dependency of the optional modules.
        if ($domain !== 'one-202x-platform'
            && !apply_filters('one202x/module_enabled', true, $domain, get_current_blog_id())) {
            continue;
        }

        add_action('init', static function () use ($domain): void {
            load_muplugin_textdomain($domain, $domain . '/languages');
        }, 0);

        require_once $plugin;
    }
}, 20);
