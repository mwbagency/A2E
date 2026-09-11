<?php

/**
 * Title: Filtered content — section banner and cards
 * Slug: one-202x/hero004_filtered-listing
 * Categories: a2e
 * Keywords: resources, banner, categories, filters, query
 * Description: An editable banner with category filters and a Query Loop for your chosen content type.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:query {"enhancedPagination":true,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-hero004_filtered-listing","layout":{"type":"default"}} -->
<div class="wp-block-query alignfull one-202x-pattern-hero004_filtered-listing">
    <!-- wp:group {"className":"a2e-filtered-listing__intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:heading {"className":"a2e-filtered-listing__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading a2e-filtered-listing__title has-h-2-font-size"><?php echo wp_kses_post(__('Discover our <em>Resources</em>', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec. Diam nisl nibh dolor blandit aliquet. Integer augue mattis est nam. Ullamcorper pellentesque potenti arcu imperdiet quam. Id.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-202x/query-filters {"heading":<?php echo wp_json_encode(__('Categories', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"is-style-a2e-category-tabs a2e-filtered-listing__filters"} /-->

    <!-- wp:group {"className":"a2e-filtered-listing__results","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__results">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
        <!-- wp:one-202x/content-card {"headingLevel":3,"cardStyle":"auto"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('No results were found in this category.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->