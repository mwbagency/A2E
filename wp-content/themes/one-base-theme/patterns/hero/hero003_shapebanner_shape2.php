<?php

/**
 * Title: Hero — shape 2, media left
 * Slug: one-202x/hero003_shapebanner_shape2
 * Categories: a2e
 * Keywords: hero, introduction, statistics, image, video, shape, left
 * Description: An introduction with an editable statistics group, two buttons and shape 2 image or video media on the left.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

get_template_part('pattern-layouts/shape-hero', null, [
    'classes' => 'one-202x-pattern-hero003_shapebanner a2e-hero003--shape-2 a2e-hero003--media-left',
    'image_url' => wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg',
]);
