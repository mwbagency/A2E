<?php
/**
 * Title: Testimonials — about us introduction
 * Slug: one-202x/show014_blog-posts_testimonials-intro-about
 * Categories: a2e
 * Description: Testimonials — about us introduction. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"metadata":{"name":"Testimonials introduction"},"align":"full","className":"one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-content-feed__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-content-feed__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Success stories, impactful results', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-content-feed__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-content-feed__description">
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#testimonials"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Write a review', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
