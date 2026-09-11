<?php
/**
 * Title: Three text columns and buttons
 * Slug: one-202x/cont011_three-columns
 * Categories: a2e
 * Description: Three editable text columns with dividing lines and two centred buttons.
 * Keywords: columns, text, dividers, buttons
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php for ($column = 0; $column < 3; $column++) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php esc_html_e('Lorem ipsum dolor sit', 'one-base-theme'); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id. Enim risus id vulputate montes morbi vestibulum massa facilisis ipsum. Semper id sit facilisi faucibus nunc dictum. Dignissim mattis sit pellentesque ac nunc nunc penatibus pellentesque. Nibh.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <?php endfor; ?>
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
    <div class="wp-block-buttons">
        <!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Primary button', 'one-base-theme'); ?></a></div>
        <!-- /wp:button -->

        <!-- wp:button {"className":"is-style-outline","borderColor":"accent"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-border-color has-accent-border-color wp-element-button"><?php esc_html_e('Secondary button', 'one-base-theme'); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
