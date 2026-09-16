<?php
/**
 * Title: Search results — A2E
 * Slug: one-202x/othe007_search-results
 * Categories: a2e
 * Inserter: no
 * Description: The search template introduction, inherited results and learner support sidebar.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro one-202x-pattern-othe007_search-results a2e-search-results__intro","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro one-202x-pattern-othe007_search-results a2e-search-results__intro">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Knowledge Hub', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":1,"className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h1 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Search results', 'one-base-theme'); ?></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
    <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Find guidance, training, clinical updates and practical resources from A to E.', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:search {"label":<?php echo wp_json_encode(__('Search this site', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showLabel":false,"placeholder":<?php echo wp_json_encode(__('Search A to E', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"buttonText":<?php echo wp_json_encode(__('Search', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"buttonPosition":"button-inside","buttonUseIcon":true,"className":"a2e-search-results__form"} /-->
</div>
<!-- /wp:group -->

<!-- wp:query {"query":{"inherit":true},"align":"full","className":"one-202x-pattern-othe007_search-results a2e-search-results__results","layout":{"type":"default"}} -->
<div class="wp-block-query alignfull one-202x-pattern-othe007_search-results a2e-search-results__results">
    <!-- wp:query-total {"displayType":"total-results","className":"a2e-search-results__count"} /-->

    <!-- wp:group {"className":"a2e-search-results__layout","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-search-results__layout">
        <!-- wp:group {"className":"a2e-search-results__list","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-search-results__list">
            <!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:one-202x/content-card {"headingLevel":2,"cardStyle":"search"} /-->
            <!-- /wp:post-template -->

            <!-- wp:query-no-results -->
                <!-- wp:heading {"fontSize":"h-4"} -->
                <h2 class="wp-block-heading has-h-4-font-size"><?php esc_html_e('No results found', 'one-base-theme'); ?></h2>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p><?php esc_html_e('Try a different search term or fewer words. Our learner support team can also help you find what you need.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->

            <!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
                <!-- wp:query-pagination-previous /-->
                <!-- wp:query-pagination-numbers /-->
                <!-- wp:query-pagination-next /-->
            <!-- /wp:query-pagination -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"tagName":"aside","className":"a2e-search-results__sidebar","layout":{"type":"default"}} -->
        <aside class="wp-block-group a2e-search-results__sidebar">
            <!-- wp:pattern {"slug":"one-202x/cont008_support-card"} /-->
        </aside>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->
