<?php
/**
 * Title: Call to action — corporate services
 * Slug: one-202x/ctas004_centred-panel_corporate
 * Categories: a2e
 * Description: Call to action — corporate services. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page011_contact","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page011_contact">
    <!-- wp:group {"align":"full","className":"one-202x-pattern-ctas004_centred-panel","backgroundColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background">
        <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
            <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
                <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('For B2B & procurement teams', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
            <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
                <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Corporate framework contracts', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
                <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Talk to our commercial team about workforce training, framework agreements, service provision and tailored delivery across your organisation.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
            <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"url":"#contact-enquiry","backgroundColor":"base","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Speak to Corporate Services', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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
