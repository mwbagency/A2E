<?php
/**
 * Title: Newsletter — Gravity Forms
 * Slug: one-202x/form004_newsletter
 * Categories: a2e
 * Description: An inset newsletter panel with the editable A2E Newsletter Gravity Form.
 * Keywords: newsletter, subscribe, email, gravity forms
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-form004_newsletter","backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-form004_newsletter has-base-background-color has-background">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Join', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('E-mail newsletter', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Aliquam vehicula laoreet lacus, ac vulputate purus vulputate et. Integer vitae tortor a sem elementum suscipit imperdiet sit amet eros.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"a2e-newsletter__form","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-newsletter__form">
            <!-- wp:gravityforms/form {"formId":"1","title":false,"description":false,"ajax":true,"theme":"orbital"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
