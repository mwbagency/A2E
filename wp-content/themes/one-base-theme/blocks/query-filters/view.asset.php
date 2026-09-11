<?php

defined('ABSPATH') || exit;

return [
    'dependencies' => [
        '@wordpress/interactivity',
        [
            'id' => '@wordpress/interactivity-router',
            'import' => 'dynamic',
        ],
    ],
    'version' => (string) filemtime(__DIR__ . '/view.js'),
];
