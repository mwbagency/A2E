<?php

/**
 * Title: Services — editable feature grid
 * Slug: one-202x/cont002_features
 * Categories: one-202x, one-202x-cont
 * Keywords: cont002_features, services, grid, featured, two-column
 * Description: A two-column grid layout to showcase services or features with icons, headings, and descriptions.
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-cont002_features","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-cont002_features"><!-- wp:group {"align":"wide","className":"one-202x-section-intro","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide one-202x-section-intro"><!-- wp:heading {"level":2,"className":"one-202x-section-title"} -->
        <h2 class="wp-block-heading one-202x-section-title"><?php esc_html_e( 'Services', 'one-base-theme' ); ?></h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'At our digital marketing agency, we offer a range of services to help businesses grow and succeed online.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
    <!-- wp:group {"align":"wide","className":"one-202x-services-grid","layout":{"type":"grid", "minimumColumnWidth":"18rem"}} -->
    <div class="wp-block-group alignwide one-202x-services-grid">

        <!-- wp:group {"className":"one-202x-service-card is-style-card-light","layout":{"type":"default"}, "style":{"spacing":{"padding":"var:preset|spacing|lg"}}} -->
        <div class="wp-block-group one-202x-service-card is-style-card-light" style="padding:var(--wp--preset--spacing--lg)">
            <!-- wp:heading {"level":3,"className":"one-202x-service-card__title", "backgroundColor":"accent"} -->
            <h3 class="wp-block-heading one-202x-service-card__title has-accent-background-color has-background">
                <mark><?php esc_html_e( 'Search engine optimisation', 'one-base-theme' ); ?></mark>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:image {"sizeSlug":"full","width":"100%","height":"auto","aspectRatio":"4/3","scale":"cover","linkDestination":"none","className":"one-202x-service-card__art"} -->
            <figure class="wp-block-image size-full is-resized one-202x-service-card__art">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/default-4x3.webp')); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover;width:100%;height:auto" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'Learn more', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode( home_url( '/services/search-engine-optimisation/' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"className":"is-style-icon-link"} -->
                <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->


        <!-- wp:group {"className":"one-202x-service-card is-style-card-accent","layout":{"type":"default"}, "style":{"spacing":{"padding":"var:preset|spacing|lg"}}} -->
        <div class="wp-block-group one-202x-service-card is-style-card-accent" style="padding:var(--wp--preset--spacing--lg)"><!-- wp:heading {"level":3,"className":"one-202x-service-card__title"} -->
            <h3 class="wp-block-heading one-202x-service-card__title"><mark><?php esc_html_e( 'Pay-per-click advertising', 'one-base-theme' ); ?></mark></h3>
            <!-- /wp:heading -->
            <!-- wp:image {"sizeSlug":"full","width":"100%","height":"auto","aspectRatio":"4/3","scale":"cover","linkDestination":"none","className":"one-202x-service-card__art"} -->
            <figure class="wp-block-image size-full is-resized one-202x-service-card__art"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/default-4x3.webp')); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover;width:100%;height:auto" /></figure>
            <!-- /wp:image -->
            <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'Learn more', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode( home_url( '/services/pay-per-click-advertising/' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"className":"is-style-icon-link"} -->
                <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->


        <!-- wp:group {"className":"one-202x-service-card is-style-card-dark","layout":{"type":"default"}, "style":{"spacing":{"padding":"var:preset|spacing|lg"}}} -->
        <div class="wp-block-group one-202x-service-card is-style-card-dark" style="padding:var(--wp--preset--spacing--lg)"><!-- wp:heading {"level":3,"className":"one-202x-service-card__title"} -->
            <h3 class="wp-block-heading one-202x-service-card__title"><mark><?php esc_html_e( 'Social media marketing', 'one-base-theme' ); ?></mark></h3>
            <!-- /wp:heading -->
            <!-- wp:image {"sizeSlug":"full","width":"100%","height":"auto","aspectRatio":"4/3","scale":"cover","linkDestination":"none","className":"one-202x-service-card__art"} -->
            <figure class="wp-block-image size-full is-resized one-202x-service-card__art"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/default-4x3.webp')); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover;width:100%;height:auto" /></figure>
            <!-- /wp:image -->
            <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'Learn more', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode( home_url( '/services/social-media-marketing/' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"className":"is-style-icon-link"} -->
                <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->


        <!-- wp:group {"className":"one-202x-service-card is-style-card-light","layout":{"type":"default"}, "style":{"spacing":{"padding":"var:preset|spacing|lg"}}} -->
        <div class="wp-block-group one-202x-service-card is-style-card-light" style="padding:var(--wp--preset--spacing--lg)"><!-- wp:heading {"level":3,"className":"one-202x-service-card__title"} -->
            <h3 class="wp-block-heading one-202x-service-card__title"><mark><?php esc_html_e( 'Email marketing', 'one-base-theme' ); ?></mark></h3>
            <!-- /wp:heading -->
            <!-- wp:image {"sizeSlug":"full","width":"100%","height":"auto","aspectRatio":"4/3","scale":"cover","linkDestination":"none","className":"one-202x-service-card__art"} -->
            <figure class="wp-block-image size-full is-resized one-202x-service-card__art"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/default-4x3.webp')); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover;width:100%;height:auto" /></figure>
            <!-- /wp:image -->
            <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode( __( 'Learn more', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode( home_url( '/services/email-marketing/' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"className":"is-style-icon-link"} -->
                <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
