<?php

/**
 * Title: Hero — shape 1 with statistics
 * Slug: one-202x/hero003_shapebanner
 * Categories: a2e
 * Keywords: hero, introduction, statistics, image, video, shape
 * Description: An introduction with three statistics, two buttons and shaped image or video media.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

get_template_part('pattern-layouts/shape-hero', null, [
    'classes' => 'one-202x-pattern-hero003_shapebanner',
    'image_url' => wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg',
]);
