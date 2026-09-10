<?php

defined('ABSPATH') || exit;

// The theme is self-contained; site-owned MU plugins use the root Composer loader.
$components = [
    'Setup',
    'Branding',
    'Assets',
    'Blocks',
    'BlockStyles',
    'PatternAssets',
    'Icons',
    'FaqsBlock',
    'QueryLoops',
    'QueryFilters',
    'QuerySelection',
];

foreach ($components as $component) {
    require_once __DIR__ . '/App/' . $component . '.php';
    $class = '\\One202x\\Theme\\' . $component;
    (new $class())->register_hooks();
}

do_action('one_202x_theme_loaded');
// Retain the original extension hook for existing projects.
do_action('christopher_theme_loaded');
