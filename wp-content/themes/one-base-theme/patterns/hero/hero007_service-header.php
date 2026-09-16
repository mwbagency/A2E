<?php
/**
 * Title: Service hero — title, summary and image
 * Slug: one-202x/hero007_service-header
 * Categories: a2e
 * Post Types: service
 * Description: The current service title, ACF summary and featured image, with links to its courses and enquiry sections.
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner one-202x-pattern-hero007_service-header a2e-hero003--shape-2 a2e-hero003--media-left","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero003_shapebanner one-202x-pattern-hero007_service-header a2e-hero003--shape-2 a2e-hero003--media-left has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__content">
        <!-- wp:post-title {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} /-->

        <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__details">
            <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"acf/field","args":{"key":"field_one202x_service_details_summary"}}}},"className":"a2e-hero003__description"} -->
            <p class="a2e-hero003__description"></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-hero003__actions a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-hero003__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Enquire Now', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#service-enquiry"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","borderColor":"accent","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Explore Instructor Courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#service-courses"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"a2e-hero003__media","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__media">
        <!-- wp:post-featured-image {"sizeSlug":"full"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

