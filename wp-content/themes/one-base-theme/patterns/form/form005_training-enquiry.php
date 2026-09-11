<?php
/**
 * Title: Training enquiry — Gravity Forms
 * Slug: one-202x/form005_training-enquiry
 * Categories: a2e
 * Description: A split heading, supporting text and buttons with the editable A2E Custom Training Gravity Form.
 * Keywords: training, enquiry, contact, gravity forms
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-form005_training-enquiry","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-form005_training-enquiry has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Request custom training for your organisation', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec. Diam nisl nibh dolor blandit aliquet. Integer augue mattis est nam. Ullamcorper pellentesque potenti arcu imperdiet quam. Id.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Read Our Case Studies', 'one-base-theme'); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-outline","borderColor":"accent"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-border-color has-accent-border-color wp-element-button"><?php esc_html_e('Read Testimonials', 'one-base-theme'); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

            <!-- wp:group {"className":"a2e-training-enquiry__form","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-training-enquiry__form">
                <!-- wp:gravityforms/form {"formId":"2","title":false,"description":false,"ajax":true,"theme":"orbital"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
