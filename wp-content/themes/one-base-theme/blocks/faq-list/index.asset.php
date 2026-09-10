<?php

return [
    'dependencies' => [
        'wp-block-editor',
        'wp-blocks',
        'wp-components',
        'wp-core-data',
        'wp-data',
        'wp-element',
        'wp-html-entities',
        'wp-i18n',
        'wp-server-side-render',
    ],
    'version' => (string) filemtime(__DIR__ . '/index.js'),
];
