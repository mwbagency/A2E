<?php
/**
 * Title: Team members — selected or latest
 * Slug: one-202x/show016_team-members
 * Categories: a2e
 * Description: Six recent team members in a three-column grid, with biographies and circular photos. Choose members manually to control their order.
 * Keywords: team, members, people, staff, biographies
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"metadata":{"name":"Team members — selected or latest"},"tagName":"section","backgroundColor":"base","textColor":"contrast","align":"full","className":"one-202x-pattern-show016_team-members","ariaLabel":<?php echo wp_json_encode(__('Team members', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show016_team-members has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Team members', 'one-base-theme'); ?>">
    <!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":0,"postType":"team_member","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:one-202x/content-card {"headingLevel":3} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('No team members are available yet.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</section>
<!-- /wp:group -->
