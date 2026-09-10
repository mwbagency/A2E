<?php

/**
 * Title: Hero — text and image
 * Slug: one-202x/hero002_splitbanner
 * Categories: one-202x, one-202x-hero
 * Description: A two-column hero with a heading, introductory text, image, and call-to-action button.
 * Keywords: hero002_splitbanner, featured, background image, heading, call-to-action
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"align":"wide", "className":"one-202x-hero", "layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide one-202x-hero">

    <!-- wp:columns {"align":"wide", "className":"one-202x-hero__columns"} -->
    <div class="wp-block-columns alignwide one-202x-hero__columns">

        <!-- wp:column {"width":"48%","className":"one-202x-hero__column one-202x-hero__copy"} -->
        <div class="wp-block-column one-202x-hero__column one-202x-hero__copy" style="flex-basis:48%">

            <!-- wp:heading {"level":1,"className":"one-202x-hero__title", "fontSize":"hero"} -->
            <h1 class="wp-block-heading one-202x-hero__title has-hero-font-size">
                <?php esc_html_e(
                    'Navigating the digital landscape for success',
                    'one-base-theme'
                ); ?>
            </h1>
            <!-- /wp:heading -->


            <!-- wp:paragraph {"fontSize":"h-5"} -->
            <p class="has-h-5-font-size">
                <?php esc_html_e(
                    'Our digital marketing agency helps businesses grow and succeed online through SEO, PPC, social media and content creation.',
                    'one-base-theme'
                ); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link wp-element-button" href="#contact">
                        <?php esc_html_e('Book a consultation', 'one-base-theme'); ?>
                    </a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"52%","className":"one-202x-hero__art"} -->
        <div class="wp-block-column one-202x-hero__art" style="flex-basis:52%">
            <!-- wp:image {"sizeSlug":"full","width":"100%","height":"auto","aspectRatio":"4/3","scale":"cover", "linkDestination":"none"} -->
            <figure class="wp-block-image size-full is-resized">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/default-4x3.webp')); ?>" alt="" style="aspect-ratio:4/3;object-fit:cover;width:100%;height:auto" />
            </figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
