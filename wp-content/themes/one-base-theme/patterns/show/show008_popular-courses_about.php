<?php
/**
 * Title: Courses — about us selection
 * Slug: one-202x/show008_popular-courses_about
 * Categories: a2e
 * Description: Courses — about us selection. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":3,"one202xSelection":true,"one202xLatestCount":3,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"},"anchor":"courses"} -->
<div id="courses" class="wp-block-query alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Check out some of our popular courses!', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View all courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:one-202x/content-card {"headingLevel":3,"cardStyle":"programme"} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('No courses are available yet.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
