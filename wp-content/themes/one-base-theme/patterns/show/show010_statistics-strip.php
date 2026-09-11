<?php
/**
 * Title: Statistics — three figures with icons
 * Slug: one-202x/show010_statistics-strip
 * Categories: a2e
 * Description: Three editable statistics with puzzle icons and dividing lines.
 * Keywords: statistics, figures, numbers, icons
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$statistics = [
    ['350+', __('Clinical Instructors Nationwide', 'one-base-theme')],
    ['3,000+', __('Courses Delivered Annually', 'one-base-theme')],
    ['40,000+', __('Candidates Trained Each Year', 'one-base-theme')],
];
?>
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
