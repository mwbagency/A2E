<?php
/**
 * Title: Footer
 * Description: The translated starter blocks for the shared Footer template part.
 * Slug: one-202x/foot001_footer
 * Inserter: no
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-footer","backgroundColor":"surface","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull one-202x-footer has-contrast-color has-surface-background-color has-text-color has-background">
    <!-- wp:group {"align":"wide","className":"one-202x-footer__inner","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide one-202x-footer__inner">
        <!-- wp:group {"className":"one-202x-footer__brand","layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group one-202x-footer__brand">
            <!-- wp:site-logo {"width":72,"shouldSyncIcon":false,"className":"one-202x-footer__logo"} /-->
            <!-- wp:site-title {"level":0,"className":"one-202x-footer__site-title"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"one-202x-footer__body","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-footer__body">
            <!-- wp:group {"className":"one-202x-footer__contact","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__contact">
                <!-- wp:one-202x/contact-details {"className":"one-202x-footer__address"} /-->

                <!-- wp:group {"className":"one-202x-footer__social","layout":{"type":"default"}} -->
                <div class="wp-block-group one-202x-footer__social">
                    <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                    <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e( 'Socials', 'one-base-theme' ); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#191a23","iconBackgroundColor":"accent","iconBackgroundColorValue":"#b9ff66","openInNewTab":false,"className":"is-style-default one-202x-footer__social-links","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default one-202x-footer__social-links">
                        <!-- wp:social-link {"url":"#","service":"x","label":"X"} /-->
                        <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->
                        <!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->
                        <!-- wp:social-link {"url":"#","service":"github","label":"GitHub"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"one-202x-footer__column","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__column">
                <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e( 'About', 'one-base-theme' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'About', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__navigation","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'About us', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Our people', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Careers', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"one-202x-footer__column","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__column">
                <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e( 'Services', 'one-base-theme' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'Services', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__navigation","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Strategy', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Web design and development', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Content and SEO', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Support and maintenance', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"one-202x-footer__column","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__column">
                <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e( 'Solutions', 'one-base-theme' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'Solutions', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__navigation","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Small business', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Growing teams', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Enterprise', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Accessibility', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"one-202x-footer__column","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__column">
                <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e( 'Resources', 'one-base-theme' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'Resources', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__navigation","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Insights', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Case studies', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Guides', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Events', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'FAQs', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Contact', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"one-202x-footer__bottom","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-footer__bottom">
            <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode( __( 'Legal', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__legal","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
            <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Privacy policy', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
            <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Terms of use', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
            <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Cookie policy', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
            <!-- wp:navigation-link {"label":<?php echo wp_json_encode( __( 'Accessibility', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->

            <!-- wp:group {"className":"one-202x-footer__copyright","style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-group one-202x-footer__copyright">
                <!-- wp:paragraph -->
                <p>©</p>
                <!-- /wp:paragraph -->
                <!-- wp:site-title {"level":0,"isLink":false} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:paragraph {"className":"one-202x-footer__credit"} -->
            <p class="one-202x-footer__credit"><?php
                printf(
                    /* translators: %s: Linked name of the website creator. */
                    esc_html__( 'Built by %s', 'one-base-theme' ),
                    '<a href="https://www.makingwebsitesbetter.com">Making Websites Better</a>'
                );
                ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
