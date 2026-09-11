<?php
/**
 * Title: Call to action — centred panel
 * Slug: one-202x/ctas004_centred-panel
 * Categories: a2e
 * Description: An inset teal panel with a centred heading, supporting text and two editable buttons.
 * Keywords: call to action, centred, panel, buttons
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-ctas004_centred-panel","backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('The headline goes here', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":"a2e-centred-intro__actions","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-buttons a2e-centred-intro__actions">
            <!-- wp:button {"backgroundColor":"base","textColor":"contrast"} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button"><?php esc_html_e('Primary button', 'one-base-theme'); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline","textColor":"base","borderColor":"base","style":{"color":{"background":"transparent"}}} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color has-background has-border-color has-base-border-color wp-element-button" style="background-color:transparent"><?php esc_html_e('Secondary button', 'one-base-theme'); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
