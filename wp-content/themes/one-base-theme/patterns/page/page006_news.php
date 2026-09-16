<?php
/**
 * Title: News page — Knowledge Hub
 * Slug: one-202x/page006_news
 * Categories: a2e
 * Post Types: page
 * Description: A section banner filtering eight latest news articles, with load more results and FAQs. Uses existing post categories; no content is created automatically.
 * Keywords: news, knowledge hub, blog, categories, page
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
?>
<!-- wp:query {"anchor":"news","enhancedPagination":true,"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-hero004_filtered-listing one-202x-pattern-page006_news","layout":{"type":"default"}} -->
<div id="news" class="wp-block-query alignfull one-202x-pattern-hero004_filtered-listing one-202x-pattern-page006_news">
    <!-- wp:group {"className":"a2e-filtered-listing__intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:heading {"level":1,"className":"a2e-filtered-listing__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-filtered-listing__title has-h-2-font-size"><?php echo wp_kses_post(__('Knowledge Hub', 'one-base-theme')); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e('The central home for A to E news, clinical updates, service developments and editorial authority content for healthcare teams across the UK.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-202x/query-filters {"allLabel":"All News","source":"taxonomy:category","heading":<?php echo wp_json_encode(__('Categories', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"is-style-a2e-category-tabs a2e-filtered-listing__filters"} /-->

    <!-- wp:group {"className":"a2e-filtered-listing__results one-202x-pattern-show011_content-feed","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__results one-202x-pattern-show011_content-feed">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":4}} -->
        <!-- wp:one-202x/content-card {"headingLevel":2,"cardStyle":"resource"} /-->
        <!-- /wp:post-template -->

        <!-- wp:one-202x/query-results {"itemLabel":"news articles"} -->
            <!-- wp:one-202x/icon-button {"text":"Load more news","showIcon":false,"iconPosition":"right","backgroundColor":"base","textColor":"contrast","className":"a2e-query-results__more"} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        <!-- /wp:one-202x/query-results -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('No news matches this category. Select All News to see every article.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-show012_faqs-actions","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show012_faqs-actions has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-faqs-actions__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-faqs-actions__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Frequently Asked Questions', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all FAQ’s', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Talk to us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-faqs/faqs {"limit":7,"columns":1,"singleOpen":true} /-->
</div>
<!-- /wp:group -->
