<?php
/**
 * Title: Post — article and related news
 * Slug: one-202x/page007_post
 * Categories: a2e
 * Description: Editable post content, the author's profile and share links, followed by four recent posts excluding the current article.
 * Post Types: post
 * Inserter: no
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page007_post","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page007_post">
    <!-- wp:group {"tagName":"article","className":"a2e-post-article","backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
    <article class="wp-block-group a2e-post-article has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:post-content {"className":"a2e-post-article__content","layout":{"type":"constrained"}} /-->

        <!-- wp:group {"className":"a2e-post-article__byline","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
        <div class="wp-block-group a2e-post-article__byline">
            <!-- wp:group {"className":"a2e-post-article__author","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-post-article__author">
                <!-- wp:post-author-name {"isLink":true} /-->
                <!-- wp:post-author-biography /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"a2e-post-header__sharing","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-post-header__sharing">
                <!-- wp:shortcode -->
                [addtoany]
                <!-- /wp:shortcode -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </article>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"one-202x-pattern-show011_content-feed","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull one-202x-pattern-show011_content-feed has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:group {"className":"a2e-content-feed__intro","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-content-feed__intro">
            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Related news and updates', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:group {"className":"a2e-content-feed__description","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-content-feed__description">
                <!-- wp:paragraph -->
                <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
                <div class="wp-block-group a2e-button-group">
                    <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all news & updates', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/news/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                        <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                    <!-- /wp:one-202x/icon-button -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"excludeCurrent":true,"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
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
</div>
<!-- /wp:group -->
