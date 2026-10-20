<?php
/**
 * Title: Course profile — A2E
 * Slug: one-202x/page014_course
 * Categories: a2e
 * Description: Editable course content with overview, booking design, specifications, add-ons, testimonials, instructors, corporate enquiry and FAQs. The course template supplies the dynamic hero.
 * Viewport Width: 1440
 * Post Types: course
 */
defined('ABSPATH') || exit;
?>
<!-- wp:pattern {"slug":"one-202x/show020_course-navigation"} /-->

<!-- wp:pattern {"slug":"one-202x/cont015_course-overview"} /-->

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
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
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"layout":{"type":"default"},"anchor":"testimonials","align":"full"} -->
<div id="testimonials" class="wp-block-group alignfull">
<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:group {"align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Success stories, impactful results', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"text":<?php echo wp_json_encode(__('Write a review', 'one-base-theme')); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<?php
})();
?>
<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:pattern {"slug":"one-202x/show013_testimonials"} /-->
</div>
<!-- /wp:group -->
<?php
})();
?>
</div>
<!-- /wp:group -->
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"layout":{"type":"default"},"anchor":"training-team","align":"full"} -->
<div id="training-team" class="wp-block-group alignfull">
<!-- wp:pattern {"slug":"one-202x/show017_training-team"} /-->
</div>
<!-- /wp:group -->
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"anchor":"corporate-booking","align":"full","className":"one-202x-pattern-form005_training-enquiry","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div id="corporate-booking" class="wp-block-group alignfull one-202x-pattern-form005_training-enquiry has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Corporate training solutions', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Deploy standardized paediatric life support training across your entire clinical workforce. We offer on-site delivery, bespoke scheduling, and volume licensing for trusts and private practices.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-training-enquiry__form","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-training-enquiry__form">
                <!-- wp:gravityforms/form {"formId":"4","title":false,"description":false,"ajax":true,"theme":"orbital"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"anchor":"course-faqs","align":"full","className":"one-202x-pattern-show012_faqs-actions","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div id="course-faqs" class="wp-block-group alignfull one-202x-pattern-show012_faqs-actions has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-faqs-actions__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-faqs-actions__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Frequently Asked Questions', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","url":"#course-booking","text":<?php echo wp_json_encode(__('Book now', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"iconPosition":"right","url":"/contact-us/","text":<?php echo wp_json_encode(__('Talk to us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-faqs/faqs {"limit":7,"columns":1,"singleOpen":true} /-->
</div>
<!-- /wp:group -->
<?php
})();
?>
