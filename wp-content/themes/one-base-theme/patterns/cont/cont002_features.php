<?php
/**
 * Title: Services — editable feature grid
 * Slug: one-202x/cont002_features
 * Categories: one-202x, one-202x-cont
 * Keywords: cont002_features, services, grid, features, icons
 * Description: Editable icon, heading and description cards in a responsive grid.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-cont002_features","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-cont002_features">
<!-- wp:group {"className":"one-202x-services-grid","layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group one-202x-services-grid">
<?php for ($feature = 0; $feature < 4; ++$feature) : ?>
    <!-- wp:group {"className":"one-202x-feature-card","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-feature-card">
        <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
        <!-- wp:group {"layout":{"type":"default"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php esc_html_e('Lorem ipsum dolor sit amet', 'one-base-theme'); ?></h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
<?php endfor; ?>
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
