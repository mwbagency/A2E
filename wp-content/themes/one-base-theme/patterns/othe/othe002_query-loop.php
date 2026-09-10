<?php
/**
 * Title: Content: Query loop
 * Slug: one-202x/othe002_query-loop
 * Inserter: no
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:query {"query":{"inherit":true},"align":"wide"} -->
<div class="wp-block-query alignwide">
    <!-- wp:post-template {"layout":{"type":"default"}} -->
    <!-- wp:one-202x/content-card {"headingLevel":2} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'No content was found. Try a different search.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:search {"label":<?php echo wp_json_encode( __( 'Search this site', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>,"buttonText":<?php echo wp_json_encode( __( 'Search', 'one-base-theme' ), JSON_HEX_TAG | JSON_HEX_AMP ); ?>} /-->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
