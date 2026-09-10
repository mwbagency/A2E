<?php
/**
 * Title: Head
 * Description: The translated starter blocks for the shared Head template part.
 * Slug: one-202x/head001_navigation
 * Inserter: no
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-head","backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull one-202x-head has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"align":"wide","className":"one-202x-head__inner one-202x-head__bar","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide one-202x-head__inner one-202x-head__bar">
        <!-- wp:group {"className":"one-202x-head__brand","layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group one-202x-head__brand">
            <!-- wp:site-logo {"width":52,"shouldSyncIcon":false,"className":"one-202x-head__logo"} /-->
            <!-- wp:site-title {"level":0,"className":"one-202x-head__site-title"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'Primary navigation', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"mobile","overlay":"head-navigation-overlay","submenuVisibility":"click","maxNestingLevel":3,"className":"one-202x-head__navigation","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
            <!-- wp:home-link {"label":<?php echo wp_json_encode( __( 'Home', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>} /-->
        <!-- /wp:navigation -->

        <!-- wp:search {"showLabel":false,"buttonPosition":"button-only","buttonUseIcon":true,"className":"one-202x-head__search"} /-->

        <!-- wp:one-202x/contact-details {"display":"primary-phone","className":"one-202x-head__phone"} /-->

        <!-- wp:group {"className":"one-202x-head__utilities","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
        <div class="wp-block-group one-202x-head__utilities">
            <!-- wp:buttons {"className":"one-202x-head__actions"} -->
            <div class="wp-block-buttons one-202x-head__actions">
                <!-- wp:button {"backgroundColor":"contrast","textColor":"base"} -->
                <div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button" href="#contact"><?php esc_html_e( 'Book a Chat', 'one-base-theme' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
