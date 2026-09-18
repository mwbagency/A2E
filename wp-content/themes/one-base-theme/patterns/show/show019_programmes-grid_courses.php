<?php
/**
 * Title: Courses — catalogue and filters
 * Slug: one-202x/show019_programmes-grid_courses
 * Categories: a2e
 * Keywords: programmes, courses, filters, taxonomy, query
 * Description: The courses page catalogue, with a page heading, category tabs, taxonomy filters and six courses per batch.
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
?>
<!-- wp:query {"enhancedPagination":true,"query":{"perPage":6,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-hero004_filtered-listing one-202x-pattern-show019_programmes-grid","metadata":{"name":"Courses — catalogue and filters"},"layout":{"type":"default"}} -->
<div class="wp-block-query alignfull one-202x-pattern-hero004_filtered-listing one-202x-pattern-show019_programmes-grid">
    <!-- wp:group {"className":"a2e-filtered-listing__intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:heading {"level":1,"className":"a2e-filtered-listing__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-filtered-listing__title has-h-2-font-size"><?php esc_html_e('Discover our courses', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec. Diam nisl nibh dolor blandit aliquet. Integer augue mattis est nam. Ullamcorper pellentesque potenti arcu imperdiet quam. Id.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
    <!-- wp:one-202x/query-filters {"heading":"Course categories","className":"is-style-a2e-category-tabs a2e-filtered-listing__filters"} /-->
    <!-- wp:group {"className":"a2e-programmes-grid","metadata":{"name":"Programme filters and results"},"layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-programmes-grid">
        <!-- wp:group {"className":"a2e-programmes-grid__sidebar","metadata":{"name":"Programme filters"},"layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-programmes-grid__sidebar">
            <!-- wp:one-202x/query-filters {"source":"sort","heading":"Sort by"} /-->
            <?php foreach ([
                'course_difficulty' => __('Difficulty', 'one-base-theme'),
                'course_validation' => __('Validation (years)', 'one-base-theme'),
                'course_duration' => __('Duration (hours)', 'one-base-theme'),
                'course_price' => __('Price', 'one-base-theme'),
            ] as $taxonomy => $heading) : ?>
                <!-- wp:one-202x/query-filters <?php echo wp_json_encode(['source' => 'taxonomy:' . $taxonomy, 'heading' => $heading, 'className' => 'is-style-a2e-filter-buttons']); ?> /-->
            <?php endforeach; ?>
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"a2e-programmes-grid__results","metadata":{"name":"Programme results"},"layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-programmes-grid__results">
            <!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
            <!-- wp:one-202x/content-card {"headingLevel":3,"cardStyle":"programme"} /-->
            <!-- /wp:post-template -->
            <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('No courses match these filters. Try another selection.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->
            <!-- wp:one-202x/query-results {"itemLabel":"courses"} -->
            <!-- wp:one-202x/icon-button {"text":"Load more courses","showIcon":false,"iconPosition":"right","backgroundColor":"base","textColor":"contrast","className":"a2e-query-results__more"} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
            <!-- /wp:one-202x/query-results -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->
