<?php
/**
 * Title: Posts and resources — content feed
 * Slug: one-202x/show011_content-feed
 * Categories: a2e
 * Description: An editable introduction and four article cards. Use the Query Loop settings to choose the post type, number of items and filters.
 * Keywords: posts, resources, articles, related, news, cards
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-show011_content-feed","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show011_content-feed has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-content-feed__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-content-feed__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Related posts', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-content-feed__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-content-feed__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"contrast","textColor":"base"} -->
                <div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"><?php esc_html_e('See all news & updates', 'one-base-theme'); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
            <!-- wp:one-202x/content-card {"headingLevel":3,"cardStyle":"resource"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('No items found.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
