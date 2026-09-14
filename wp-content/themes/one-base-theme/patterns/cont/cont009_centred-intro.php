<?php
/**
 * Title: Centred heading and buttons
 * Slug: one-202x/cont009_centred-intro
 * Categories: a2e
 * Description: A centred overline, heading, supporting text and two editable buttons.
 * Keywords: heading, introduction, centred, buttons, text
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('The headline goes here', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
    <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
    <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
        <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Primary button', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->

        <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Secondary button', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
