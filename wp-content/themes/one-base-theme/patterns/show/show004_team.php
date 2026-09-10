<?php
/**
 * Title: Team — selected or latest
 * Slug: one-202x/show004_team
 * Categories: one-202x, one-202x-show
 * Description: Show selected team members in your chosen order, or the latest team members when none are selected.
 * Keywords: show004_team, team, people, members, grid, cards
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:query {"namespace":"one-202x/selected-content","tagName":"section","query":{"perPage":3,"one202xSelection":true,"one202xLatestCount":3,"pages":0,"offset":0,"postType":"team_member","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"wide","className":"one-202x-section one-202x-pattern-show004_team","layout":{"type":"default"}} -->
<section class="wp-block-query alignwide one-202x-section one-202x-pattern-show004_team">
    <!-- wp:heading -->
    <h2 class="wp-block-heading"><?php esc_html_e( 'Meet the team', 'one-base-theme' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:post-template {"lock":{"move":true,"remove":true},"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
        <!-- wp:one-202x/content-card {"lock":{"move":true,"remove":true},"headingLevel":3} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results {"lock":{"move":true,"remove":true}} -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e( 'No team members match this selection.', 'one-base-theme' ); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
</section>
<!-- /wp:query -->
