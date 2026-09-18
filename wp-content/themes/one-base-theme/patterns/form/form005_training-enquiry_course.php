<?php
/**
 * Title: Course corporate training enquiry
 * Slug: one-202x/form005_training-enquiry_course
 * Categories: a2e
 * Description: Course corporate training copy and the A2E Course Corporate Booking Gravity Form.
 * Keywords: training, enquiry, contact, gravity forms
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"anchor":"corporate-booking","align":"full","className":"one-202x-pattern-form005_training-enquiry","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div id="corporate-booking" class="wp-block-group alignfull one-202x-pattern-form005_training-enquiry has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Corporate training solutions', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Deploy standardized paediatric life support training across your entire clinical workforce. We offer on-site delivery, bespoke scheduling, and volume licensing for trusts and private practices.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-training-enquiry__form","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-training-enquiry__form">
                <!-- wp:gravityforms/form {"formId":"4","title":false,"description":false,"ajax":true,"theme":"orbital"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
