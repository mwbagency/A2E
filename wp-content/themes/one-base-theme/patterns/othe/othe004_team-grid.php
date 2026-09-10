<?php
/**
 * Title: Team — filtered directory
 * Slug: one-202x/othe004_team-grid
 * Categories: one-202x, one-202x-othe
 * Block Types: core/query
 * Description: Display team members with category filters above a responsive card grid and page navigation.
 * Keywords: othe004_team-grid, team, people, members, grid, cards
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:query {"tagName":"section","query":{"perPage":6,"pages":0,"offset":0,"postType":"team_member","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"wide","className":"one-202x-section one-202x-pattern-othe004_team-grid","layout":{"type":"default"}} -->
<section class="wp-block-query alignwide one-202x-section one-202x-pattern-othe004_team-grid">
    <!-- wp:heading -->
    <h2 class="wp-block-heading"><?php esc_html_e( 'Meet the team', 'one-base-theme' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:one-202x/query-filters {"lock":{"move":true,"remove":true}} /-->

    <!-- wp:post-template {"lock":{"move":true,"remove":true},"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
        <!-- wp:one-202x/content-card {"lock":{"move":true,"remove":true},"headingLevel":3} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"lock":{"move":true,"remove":true},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results {"lock":{"move":true,"remove":true}} -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'No team members match this selection.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
</section>
<!-- /wp:query -->
