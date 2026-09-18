<?php

/**
 * Title: Footer
 * Description: A to E company details, social links, institution navigation, contacts and legal links.
 * Slug: one-202x/foot001_footer
 * Inserter: no
 */

defined('ABSPATH') || exit;

$institution_links = [
    [__('About us', 'one-base-theme'), home_url('/about-us/')],
    [__('Our Services', 'one-base-theme'), get_post_type_archive_link('service')],
    [__('Who We Help', 'one-base-theme'), home_url('/who-we-help/')],
    [__('Careers', 'one-base-theme'), home_url('/careers/')],
    [__('Knowledge Hub', 'one-base-theme'), home_url('/news/')],
];

$legal_links = [
    [__('Privacy Policy', 'one-base-theme'), home_url('/privacy-policy/')],
    [__('Cookies Policy', 'one-base-theme'), home_url('/cookies-policy/')],
    [__('Terms & Conditions', 'one-base-theme'), home_url('/terms-and-conditions/')],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-footer","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-footer">
    <!-- wp:group {"className":"one-202x-footer__main","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-footer__main has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:group {"className":"one-202x-footer__inner","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-footer__inner">
            <!-- wp:group {"className":"one-202x-footer__brand","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__brand">
                <!-- wp:image {"width":"232px","height":"86px","sizeSlug":"full","linkDestination":"custom","className":"one-202x-footer__logo"} -->
                <figure class="wp-block-image size-full is-resized one-202x-footer__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/a-to-e-logo-light.svg')); ?>" alt="<?php esc_attr_e('A to E Training & Solutions', 'one-base-theme'); ?>" style="width:232px;height:86px" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:group {"className":"one-202x-footer__company","layout":{"type":"default"}} -->
                <div class="wp-block-group one-202x-footer__company">
                <!-- wp:paragraph -->
                    <p><?php esc_html_e("The UK's largest specialist healthcare training and clinical service provider, clinician-led since 2006.", 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph -->
                    <p><?php esc_html_e('REGISTERED COMPANY NO.', 'one-base-theme'); ?> <strong>05948372</strong><br><?php esc_html_e('VAT NUMBER:', 'one-base-theme'); ?> <strong>GB 912 4471 03</strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:template-part {"slug":"social-links","tagName":"div","className":"one-202x-footer__social"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"one-202x-footer__links","layout":{"type":"default"}} -->
            <div class="wp-block-group one-202x-footer__links">
                <!-- wp:group {"className":"one-202x-footer__column","layout":{"type":"default"}} -->
                <div class="wp-block-group one-202x-footer__column">
                    <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                    <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e('Institution', 'one-base-theme'); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode(__('Institution', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__navigation","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
                    <?php foreach ($institution_links as [$label, $url]) : ?>
                        <!-- wp:navigation-link <?php echo wp_json_encode(['label' => $label, 'url' => $url, 'kind' => 'custom'], JSON_HEX_TAG | JSON_HEX_AMP); ?> /-->
                    <?php endforeach; ?>
                    <!-- /wp:navigation -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"one-202x-footer__column","layout":{"type":"default"}} -->
                <div class="wp-block-group one-202x-footer__column">
                    <!-- wp:heading {"level":2,"className":"one-202x-footer__heading"} -->
                    <h2 class="wp-block-heading one-202x-footer__heading"><?php esc_html_e('Contact us', 'one-base-theme'); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:group {"tagName":"address","className":"one-202x-footer__contact","layout":{"type":"default"}} -->
                    <address class="wp-block-group one-202x-footer__contact">
                        <!-- wp:paragraph {"className":"one-202x-footer__location"} -->
                        <p class="one-202x-footer__location"><?php esc_html_e('Vorley Road, Archway,', 'one-base-theme'); ?><br><?php esc_html_e('London N19 5HE', 'one-base-theme'); ?></p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"one-202x-footer__email"} -->
                        <p class="one-202x-footer__email"><a href="mailto:admin@a-ets.com">admin@a-ets.com</a></p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"one-202x-footer__phone"} -->
                        <p class="one-202x-footer__phone"><a href="tel:08001123205">0800 112 3205</a></p>
                        <!-- /wp:paragraph -->
                    </address>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"one-202x-footer__bottom","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-footer__bottom has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:group {"className":"one-202x-footer__bottom-inner","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-footer__bottom-inner">
            <!-- wp:navigation {"ariaLabel":<?php echo wp_json_encode(__('Legal', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"overlayMenu":"never","showSubmenuIcon":false,"className":"one-202x-footer__legal","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
            <?php foreach ($legal_links as [$label, $url]) : ?>
                <!-- wp:navigation-link <?php echo wp_json_encode(['label' => $label, 'url' => $url, 'kind' => 'custom'], JSON_HEX_TAG | JSON_HEX_AMP); ?> /-->
            <?php endforeach; ?>
            <!-- /wp:navigation -->

            <!-- wp:paragraph {"className":"one-202x-footer__copyright"} -->
            <p class="one-202x-footer__copyright"><?php
                                                    printf(
                                                        /* translators: %s: Current year. */
                                                        esc_html__('© %s A to E Training & Solutions Ltd. All rights reserved.', 'one-base-theme'),
                                                        esc_html(wp_date('Y'))
                                                    );
                                                    ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->