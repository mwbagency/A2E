<?php

/**
 * Title: Hero — shape 5, media right
 * Slug: one-202x/hero003_shapebanner_shape5
 * Categories: a2e
 * Keywords: hero, introduction, statistics, image, video, shape, right
 * Description: An introduction with an editable statistics group, two buttons and shape 5 image or video media on the right.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

get_template_part('pattern-layouts/shape-hero', null, [
    'classes' => 'one-202x-pattern-hero003_shapebanner a2e-hero003--shape-5',
    'image_url' => wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg',
]);
