<?php
/**
 * Title: FAQs — heading and buttons
 * Slug: one-202x/show012_faqs-actions
 * Categories: a2e
 * Description: A heading and two editable buttons beside a single-column FAQ List. Select FAQs or show the latest seven.
 * Keywords: FAQs, questions, answers, accordion, buttons
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

        <!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"contrast","textColor":"base"} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button"><?php esc_html_e('Book now', 'one-base-theme'); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline","backgroundColor":"base","textColor":"contrast","borderColor":"contrast"} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-border-color has-contrast-border-color has-contrast-color has-base-background-color has-text-color has-background wp-element-button"><?php esc_html_e('Talk to us', 'one-base-theme'); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-faqs/faqs {"limit":7,"columns":1,"singleOpen":true} /-->
</div>
<!-- /wp:group -->
