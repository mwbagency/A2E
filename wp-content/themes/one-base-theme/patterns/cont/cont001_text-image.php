<?php
/**
 * Title: Content — text and image
 * Description: A simple editable text and image section that stacks on small screens.
 * Slug: one-202x/cont001_text-image
 * Categories: one-202x, one-202x-cont
 * Keywords: cont001_text-image, content, text, image, about
 * Viewport Width: 1200
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-pattern-cont001_text-image","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide one-202x-pattern-cont001_text-image">
    <!-- wp:media-text {"align":"wide","mediaType":"image","isStackedOnMobile":true,"verticalAlignment":"center"} -->
    <div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholders/default-4x3.webp' ) ); ?>" alt=""/></figure><div class="wp-block-media-text__content">
        <!-- wp:heading -->
        <h2 class="wp-block-heading"><?php esc_html_e( 'Introduce your organisation', 'one-base-theme' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'Use this space to explain what you do, who you help, and what makes your approach different.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'Add a relevant image and share the details that help visitors understand your work.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->
    </div></div>
    <!-- /wp:media-text -->
</section>
<!-- /wp:group -->
