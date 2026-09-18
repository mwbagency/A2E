<?php
/**
 * Title: FAQs — news support
 * Slug: one-202x/show012_faqs-actions_news
 * Categories: a2e
 * Description: FAQs — news support. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-show012_faqs-actions","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show012_faqs-actions has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-faqs-actions__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-faqs-actions__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Frequently Asked Questions', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all FAQ’s', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Talk to us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-faqs/faqs {"limit":7,"columns":1,"singleOpen":true} /-->
</div>
<!-- /wp:group -->
