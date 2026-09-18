<?php
/**
 * Title: Hero — services
 * Slug: one-202x/hero003_shapebanner_services
 * Categories: a2e
 * Description: Hero — services. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$image_url = wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg';
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page004_service","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page004_service">

<!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner a2e-hero003--shape-2 a2e-hero003--media-left","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero003_shapebanner a2e-hero003--shape-2 a2e-hero003--media-left has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__content">
        <!-- wp:heading {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-hero003__title has-h-2-font-size"><?php esc_html_e('Clinical education for safer care', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__details">
            <!-- wp:paragraph {"className":"a2e-hero003__description"} -->
            <p class="a2e-hero003__description"><?php esc_html_e('Our services are engineered around a single, unwavering commitment: quality clinical education that improves patient safety. Whether you require a single localised classroom session at your own site or a fully managed, multi-year national training pipeline across dozens of client locations, our capacity scales precisely to your need.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-hero003__actions a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-hero003__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Discover services', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#service-pathways"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","borderColor":"accent","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View all courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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

</div>
<!-- /wp:group -->
