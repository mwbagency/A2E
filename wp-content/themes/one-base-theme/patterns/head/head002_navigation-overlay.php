<?php
/**
 * Title: Head navigation overlay
 * Description: The translated starter blocks for the shared navigation drawer.
 * Slug: one-202x/head002_navigation-overlay
 * Inserter: no
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"one-202x-mobile-nav","backgroundColor":"base","textColor":"contrast","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group one-202x-mobile-nav has-contrast-color has-base-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
    <!-- wp:group {"className":"one-202x-mobile-nav__top","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group one-202x-mobile-nav__top">
        <!-- wp:group {"className":"one-202x-mobile-nav__brand","layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group one-202x-mobile-nav__brand">
            <!-- wp:site-logo {"width":116,"shouldSyncIcon":false,"className":"one-202x-mobile-nav__logo"} /-->
            <!-- wp:site-title {"level":0,"className":"one-202x-mobile-nav__title"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:navigation-overlay-close {"displayMode":"icon"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'Primary navigation', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"never","submenuVisibility":"click","maxNestingLevel":3,"className":"one-202x-mobile-nav__menu","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
        <!-- wp:home-link {"label":<?php echo wp_json_encode( __( 'Home', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>} /-->
    <!-- /wp:navigation -->

    <!-- wp:group {"className":"one-202x-mobile-nav__footer","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
    <div class="wp-block-group one-202x-mobile-nav__footer">
        <!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","buttonUseIcon":true,"className":"one-202x-mobile-nav__search"} /-->

        <!-- wp:one-202x/contact-details {"display":"primary-phone","className":"one-202x-mobile-nav__phone"} /-->

        <!-- wp:buttons {"className":"one-202x-mobile-nav__actions"} -->
        <div class="wp-block-buttons one-202x-mobile-nav__actions">
            <!-- wp:button {"backgroundColor":"contrast","textColor":"base"} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button" href="#contact"><?php esc_html_e( 'Contact', 'one-base-theme' ); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"backgroundColor":"surface","textColor":"contrast"} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-surface-background-color has-text-color has-background wp-element-button" href="#contact"><?php esc_html_e( 'Book a Chat', 'one-base-theme' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
