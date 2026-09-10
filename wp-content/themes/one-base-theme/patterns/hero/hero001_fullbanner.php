<?php

/**
 * Title: Hero — centred over media
 * Slug: one-202x/hero001_fullbanner
 * Categories: one-202x, one-202x-hero
 * Keywords: hero001_fullbanner, hero, introduction, heading, call to action
 * Description: A centred hero with a subtitle, large title, description, and optional call-to-action buttons.
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:one-202x/media-cover {"align":"full","mediaUrl":<?php echo wp_json_encode(get_theme_file_uri('assets/images/placeholders/default-4x3.webp'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"mediaType":"image","alt":"","posterUrl":<?php echo wp_json_encode(get_theme_file_uri('assets/images/placeholders/default-4x3.webp'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"focalPoint":{"x":0.5,"y":0.5},"overlayColor":"#ffffff","overlayOpacity":60,"backgroundColor":"base","className":"one-202x-pattern-hero001_fullbanner","style":{"dimensions":{"minHeight":"680px"},"spacing":{"padding":{"top":"var:preset|spacing|2-xl","right":"var:preset|spacing|md","bottom":"var:preset|spacing|2-xl","left":"var:preset|spacing|md"}}}} -->

    <!-- wp:paragraph {"align":"center","className":"one-202x-hero001__subtitle","fontSize":"h-6"} -->
    <p class="has-text-align-center one-202x-hero001__subtitle has-h-6-font-size"><?php esc_html_e('A short introduction', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":1,"className":"one-202x-hero001__title","fontSize":"hero"} -->
    <h1 class="wp-block-heading has-text-align-center one-202x-hero001__title has-hero-font-size"><?php esc_html_e('A clear headline that captures attention', 'one-base-theme'); ?></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"one-202x-hero001__description"} -->
    <p class="has-text-align-center one-202x-hero001__description"><?php esc_html_e('Use this space to introduce the page and give visitors a concise reason to keep exploring.', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"className":"one-202x-hero001__actions","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
    <div class="wp-block-group one-202x-hero001__actions">
        <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode(__('Get started', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#contact"} -->
        <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->

        <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#learn-more","className":"is-style-outline-dark"} -->
        <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->
    </div>
    <!-- /wp:group -->
<!-- /wp:one-202x/media-cover -->
