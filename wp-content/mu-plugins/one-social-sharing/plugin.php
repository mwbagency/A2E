<?php
/**
 * Plugin Name: One Social Sharing
 * Description: Share the current article using direct social links or copy its permalink.
 * Text Domain: one-social-sharing
 */

defined('ABSPATH') || exit;

add_action('init', static function (): void {
    register_block_type(__DIR__ . '/blocks/share-links');
});
