<?php
/**
 * Title: Confirmation — title, message and home link
 * Slug: one-202x/cont009_centred-intro_confirmation
 * Categories: a2e
 * Description: Confirmation — title, message and home link. Editable section variant used by the A2E page layouts.
 * Inserter: no
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro one-202x-pattern-page010_confirmation","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro one-202x-pattern-page010_confirmation has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Confirmation', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:post-title {"textAlign":"center","level":1,"className":"a2e-centred-intro__title","fontSize":"h-2"} /-->

    <!-- wp:post-content {"className":"a2e-centred-intro__description","fontSize":"body","layout":{"type":"constrained"}} /-->

    <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
    <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
        <!-- wp:one-202x/icon-button {"className":"a2e-button","backgroundColor":"accent","textColor":"base","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Go back home', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
