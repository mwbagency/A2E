<?php
/**
 * Title: Training enquiry — service detail
 * Slug: one-202x/form005_training-enquiry_service
 * Categories: a2e
 * Description: Training enquiry — service detail. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:group {"anchor":"service-enquiry","align":"full","className":"one-202x-pattern-form005_training-enquiry","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div id="service-enquiry" class="wp-block-group alignfull one-202x-pattern-form005_training-enquiry has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Build your instructor capability plan', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Tell us about your team, sites and delivery goals. Our specialist faculty will shape the right route with you.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

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
</div>
<!-- /wp:group -->
