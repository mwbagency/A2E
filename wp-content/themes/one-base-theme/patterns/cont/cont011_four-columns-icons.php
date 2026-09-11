<?php
/**
 * Title: Four icon columns and buttons
 * Slug: one-202x/cont011_four-columns-icons
 * Categories: a2e
 * Description: Four editable icon and text columns with dividing lines and two centred buttons.
 * Keywords: columns, icons, features, dividers, buttons
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php for ($column = 0; $column < 4; $column++) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.', 'one-base-theme'); ?></h3>
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
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Button 1', 'one-base-theme'); ?></a></div>
        <!-- /wp:button -->

        <!-- wp:button {"className":"is-style-outline","borderColor":"accent"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-border-color has-accent-border-color wp-element-button"><?php esc_html_e('Button 2', 'one-base-theme'); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
