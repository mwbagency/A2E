<?php
/**
 * Title: Statistics — service detail
 * Slug: one-202x/show010_statistics-strip_service
 * Categories: a2e
 * Description: Statistics — service detail. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$statistics = [
    ['6+', __('Instructor & Train-the-Trainer Programmes', 'one-base-theme')],
    ['100%', __('Delivered by Clinical Experts', 'one-base-theme')],
    ['4000+', __('Training Sessions Delivered', 'one-base-theme')],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:group {"align":"full","className":"one-202x-pattern-show010_statistics-strip","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show010_statistics-strip has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($statistics as [$figure, $description]) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"fontSize":"h-2"} -->
                <p class="has-h-2-font-size"><?php echo esc_html($figure); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
