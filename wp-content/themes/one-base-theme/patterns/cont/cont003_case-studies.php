<?php
/**
 * Title: Case studies — manual panel
 * Description: An editable heading and three-column panel of example projects.
 * Slug: one-202x/cont003_case-studies
 * Categories: one-202x, one-202x-cont
 * Keywords: cont003_case-studies, case studies, panel, grid
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-cont003_case-studies","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-cont003_case-studies">
    <!-- wp:heading -->
    <h2 class="wp-block-heading"><?php esc_html_e( 'Case studies', 'one-base-theme' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:group {"align":"wide","className":"one-202x-case-studies is-style-dark-panel","style":{"spacing":{"padding":"var:preset|spacing|lg"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide one-202x-case-studies is-style-dark-panel" style="padding:var(--wp--preset--spacing--lg)">
        <!-- wp:columns -->
        <div class="wp-block-columns">
            <!-- wp:column {"lock":{"move":true,"remove":true}} -->
            <div class="wp-block-column">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading"><?php esc_html_e( 'Project one', 'one-base-theme' ); ?></h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p><?php esc_html_e( 'Describe the project, what you delivered, and the outcome for the client.', 'one-base-theme' ); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'View project one', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","className":"is-style-icon-link-accent"} -->
                    <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"lock":{"move":true,"remove":true}} -->
            <div class="wp-block-column">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading"><?php esc_html_e( 'Project two', 'one-base-theme' ); ?></h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p><?php esc_html_e( 'Describe the project, what you delivered, and the outcome for the client.', 'one-base-theme' ); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'View project two', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","className":"is-style-icon-link-accent"} -->
                    <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"lock":{"move":true,"remove":true}} -->
            <div class="wp-block-column">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading"><?php esc_html_e( 'Project three', 'one-base-theme' ); ?></h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p><?php esc_html_e( 'Describe the project, what you delivered, and the outcome for the client.', 'one-base-theme' ); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'View project three', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","className":"is-style-icon-link-accent"} -->
                    <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
