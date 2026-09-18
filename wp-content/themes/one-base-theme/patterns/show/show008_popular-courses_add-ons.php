<?php
/**
 * Title: Course add-ons — tailored training
 * Slug: one-202x/show008_popular-courses_add-ons
 * Categories: a2e
 * Description: An editable introduction and three course cards. Choose courses in order or show the latest courses.
 * Keywords: courses, programmes, cards, popular, selected
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":3,"one202xSelection":true,"excludeCurrent":true,"one202xLatestCount":3,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"anchor":"add-ons","align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"}} -->
<div id="add-ons" class="wp-block-query alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Tailored training options', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
<div class="wp-block-group">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('This session is commonly commissioned with Adult Basic Life Support to become Combined Adult & Paediatric Basic Life Support.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>We can also add a range of custom sessions depending on a client’s needs.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","url":"/courses/","text":<?php echo wp_json_encode(__('View all courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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
