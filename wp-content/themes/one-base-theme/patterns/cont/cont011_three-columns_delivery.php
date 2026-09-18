<?php
/**
 * Title: Columns — delivery methods
 * Slug: one-202x/cont011_three-columns_delivery
 * Categories: a2e
 * Description: Columns — delivery methods. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$delivery = [
    [__('Classroom Training', 'one-base-theme'), __('Accredited, clinician-led courses delivered at your site or our London and Dudley centres.', 'one-base-theme')],
    [__('In-Situ Simulations', 'one-base-theme'), __('Realistic resuscitation simulations run within your live clinical environment.', 'one-base-theme')],
    [__('Clinical Consultancy', 'one-base-theme'), __('Expert advisory from actively practising Resuscitation Officers and acute clinicians.', 'one-base-theme')],
    [__('Policy Creation', 'one-base-theme'), __('Formal policy development, audit and review aligned to CQC and RCUK standards.', 'one-base-theme')],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page004_service","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page004_service">

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($delivery as [$title, $description]) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
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
