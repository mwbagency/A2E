<?php
/**
 * Title: Programmes — filtered course grid
 * Slug: one-202x/show019_programmes-grid
 * Categories: a2e
 * Keywords: programmes, courses, filters, taxonomy, query
 * Description: A section banner and category tabs sharing a Query Loop with course filters, programme cards and load more results.
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
?>
<!-- wp:query {"enhancedPagination":true,"query":{"perPage":6,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-hero004_filtered-listing one-202x-pattern-show019_programmes-grid","metadata":{"name":"Programmes — filtered course grid"},"layout":{"type":"default"}} -->
<div class="wp-block-query alignfull one-202x-pattern-hero004_filtered-listing one-202x-pattern-show019_programmes-grid">
    <!-- wp:group {"className":"a2e-filtered-listing__intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:heading {"className":"a2e-filtered-listing__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading a2e-filtered-listing__title has-h-2-font-size"><?php echo wp_kses_post(__('Discover our <em>Programmes</em>', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Explore our courses and find the right training for you.', 'one-base-theme'); ?></p>
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
            <!-- wp:one-202x/icon-button {"text":"Load more","showIcon":false,"iconPosition":"right","backgroundColor":"base","textColor":"contrast","className":"a2e-query-results__more"} -->
            <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
            <!-- /wp:one-202x/query-results -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->
