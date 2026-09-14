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

$image_url = wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg';
?>

<!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner a2e-hero003--shape-5","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero003_shapebanner a2e-hero003--shape-5 has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__content">
        <!-- wp:heading {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-hero003__title has-h-2-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__details">
            <!-- wp:paragraph {"className":"a2e-hero003__description"} -->
            <p class="a2e-hero003__description"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id. Enim risus id vulputate montes morbi vestibulum.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-hero003__statistics","metadata":{"name":"Statistics"},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}} -->
            <div class="wp-block-group a2e-hero003__statistics">
                <!-- wp:group {"className":"a2e-hero003__statistic","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-hero003__statistic">
                    <!-- wp:paragraph {"className":"a2e-hero003__number","fontSize":"h-4"} -->
                    <p class="a2e-hero003__number has-h-4-font-size"><?php esc_html_e('350+', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                    <p class="has-small-font-size"><?php esc_html_e('Clinical instructors', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"a2e-hero003__statistic","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-hero003__statistic">
                    <!-- wp:paragraph {"className":"a2e-hero003__number","fontSize":"h-4"} -->
                    <p class="a2e-hero003__number has-h-4-font-size"><?php esc_html_e('3,000', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                    <p class="has-small-font-size"><?php esc_html_e('Courses per year', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"a2e-hero003__statistic","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-hero003__statistic">
                    <!-- wp:paragraph {"className":"a2e-hero003__number","fontSize":"h-4"} -->
                    <p class="a2e-hero003__number has-h-4-font-size"><?php esc_html_e('200+', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                    <p class="has-small-font-size"><?php esc_html_e('Client sites', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"a2e-hero003__actions a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-hero003__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Button 1', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","borderColor":"accent","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Button 2', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-202x/media-cover {"mediaUrl":<?php echo wp_json_encode($image_url, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"mediaType":"image","alt":<?php echo wp_json_encode(__('An instructor presenting to a group in a classroom.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"posterUrl":<?php echo wp_json_encode($image_url, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"overlayOpacity":0,"playbackMode":"autoplay","className":"a2e-hero003__media"} /-->
</div>
<!-- /wp:group -->
