<?php
/**
 * Title: Columns — service benefits
 * Slug: one-202x/cont011_three-columns_service-benefits
 * Categories: a2e
 * Description: Columns — service benefits. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$delivery = [
    __('Policy Audit', 'one-base-theme'),
    __('Custom Strategy Design', 'one-base-theme'),
    __('National Faculty Implementation', 'one-base-theme'),
    __('Compliance Verification Tracking', 'one-base-theme'),
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($delivery as $title) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id. Enim risus id vulputate montes morbi vestibulum massa facilisis ipsum. Semper id sit facilisi faucibus nunc dictum. Dignissim mattis sit pellentesque ac nunc nunc penatibus pellentesque. Nibh.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
