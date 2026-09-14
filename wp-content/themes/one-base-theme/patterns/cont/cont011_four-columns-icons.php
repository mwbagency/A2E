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

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"className":"a2e-button-group"} -->
    <div class="wp-block-group a2e-button-group">
        <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Button 1', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->

        <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","borderColor":"accent","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Button 2', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
