<?php
/**
 * Title: Page not found
 * Slug: one-202x/404
 * Inserter: no
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><?php esc_html_e( 'Page not found', 'one-base-theme' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Sorry, we could not find the page you are looking for. Try a search or return to the home page.', 'one-base-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":<?php echo wp_json_encode( __( 'Search this site', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"buttonText":<?php echo wp_json_encode( __( 'Search', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons">
    <!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'one-base-theme' ); ?></a></div>
    <!-- /wp:button -->
</div>
<!-- /wp:buttons -->
