<?php
/**
 * Title: Columns — our commitments
 * Slug: one-202x/cont011_three-columns_commitments
 * Categories: a2e
 * Description: Columns — our commitments. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$commitments = [
    [
        __('Our Mission', 'one-base-theme'),
        __('The business ethos is to provide outstanding training using recognised teaching methodology for life support training with instructors who are still clinically credible.', 'one-base-theme'),
        '',
    ],
    [
        __('How We Operate', 'one-base-theme'),
        __('The premise of our training is to equip all sectors of the community with the correct knowledge to make a real difference and potentially possibly save a life. We are extremely excited about our work in the developing world where there is a severe lack of resources and training.', 'one-base-theme'),
        __('Not many companies can truly say that their work directly saves lives.', 'one-base-theme'),
    ],
    [
        __('Commitment of Our Services', 'one-base-theme'),
        __('We provide year long customer service, not just a once of year training session. Every customer will have access to our members only area where they can download the latest Resuscitation Updates and News, posters etc – We are a resource as well as a provider of training.', 'one-base-theme'),
        '',
    ],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($commitments as [$title, $description, $emphasis]) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
            <!-- /wp:paragraph -->
            <?php if ($emphasis !== '') : ?>
            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><strong><?php echo esc_html($emphasis); ?></strong></p>
            <!-- /wp:paragraph -->
            <?php endif; ?>
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
