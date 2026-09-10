<?php
/**
 * Title: Case study grid
 * Slug: one-202x/othe001_case-study-grid
 * Categories: one-202x, one-202x-othe
 * Block Types: core/query
 * Description: Display case studies with category filters beside a responsive card grid and page navigation.
 * Keywords: othe001_case-study-grid, case studies, projects, grid, cards
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:query {"tagName":"section","query":{"perPage":6,"pages":0,"offset":0,"postType":"case_study","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"wide","className":"one-202x-section one-202x-pattern-othe001_case-study-grid","layout":{"type":"default"}} -->
<section class="wp-block-query alignwide one-202x-section one-202x-pattern-othe001_case-study-grid">
    <!-- wp:heading -->
    <h2 class="wp-block-heading"><?php esc_html_e( 'Case studies', 'one-base-theme' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns -->
    <div class="wp-block-columns">
    <!-- wp:column {"width":"25%"} -->
    <div class="wp-block-column" style="flex-basis:25%">
        <!-- wp:one-202x/query-filters {"lock":{"move":true,"remove":true},"orientation":"vertical"} /-->
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"width":"75%"} -->
    <div class="wp-block-column" style="flex-basis:75%">
    <!-- wp:post-template {"lock":{"move":true,"remove":true},"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"18rem"}} -->
        <!-- wp:one-202x/content-card {"lock":{"move":true,"remove":true},"headingLevel":3} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"lock":{"move":true,"remove":true},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results {"lock":{"move":true,"remove":true}} -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'No case studies are available yet.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</section>
<!-- /wp:query -->
