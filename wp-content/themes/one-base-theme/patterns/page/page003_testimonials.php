<?php
/**
 * Title: Client Testimonials — A2E
 * Slug: one-202x/page003_testimonials
 * Categories: a2e
 * Post Types: page
 * Block Types: core/post-content
 * Description: A testimonials page with a section banner, two grids of client quotes, the video testimonial slider and a contact panel. The second grid skips the first six quotes.
 * Keywords: testimonials, reviews, clients, full page
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-hero004_filtered-listing one-202x-pattern-page003_testimonials","layout":{"type":"default"},"metadata":{"name":"Client testimonials introduction"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero004_filtered-listing one-202x-pattern-page003_testimonials">
    <!-- wp:group {"className":"a2e-filtered-listing__intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-filtered-listing__intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:heading {"level":1,"className":"a2e-filtered-listing__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-filtered-listing__title has-h-2-font-size"><?php esc_html_e('Client testimonials', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p><?php esc_html_e('We pride ourselves on getting good feedback and due to the practical nature of the courses and the efforts of our instructors we think the feedback is superb. See what our clients say about our training courses.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
<?php
})();
?>

<!-- wp:pattern {"slug":"one-202x/show013_testimonials_text-grid"} /-->

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
get_template_part('pattern-layouts/centred-intro', null, [
    'root_attributes' => ['align' => 'full', 'className' => 'one-202x-pattern-cont009_centred-intro one-202x-pattern-page003_testimonials', 'backgroundColor' => 'base', 'textColor' => 'contrast', 'layout' => ['type' => 'default']],
    'root_class' => 'wp-block-group alignfull one-202x-pattern-cont009_centred-intro one-202x-pattern-page003_testimonials has-contrast-color has-base-background-color has-text-color has-background',
    'eyebrow' => (esc_html__('Testimonials', 'one-base-theme')),
    'heading' => (esc_html__('Voices of learning and impact', 'one-base-theme')),
]);
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"metadata":{"name":"Video testimonials — slider"},"tagName":"section","align":"full","backgroundColor":"base","textColor":"contrast","className":"one-202x-pattern-show013_testimonials one-202x-pattern-show015_video-testimonials one-202x-pattern-page003_testimonials","ariaLabel":<?php echo wp_json_encode(__('Video testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show013_testimonials one-202x-pattern-show015_video-testimonials one-202x-pattern-page003_testimonials has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Video testimonials', 'one-base-theme'); ?>">
    <!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":0,"postType":"testimonial","testimonialVideoOnly":true,"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
            <!-- wp:one-202x/content-card {"cardStyle":"testimonial-video"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('No video testimonials are available yet.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</section>
<!-- /wp:group -->
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":6,"postType":"testimonial","testimonialTextOnly":true,"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-page003_testimonials a2e-testimonials-page__grid a2e-testimonials-page__grid--continued","layout":{"type":"default"},"metadata":{"name":"More client testimonials"}} -->
<div class="wp-block-query alignfull one-202x-pattern-page003_testimonials a2e-testimonials-page__grid a2e-testimonials-page__grid--continued">
    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:one-202x/content-card {"cardStyle":"testimonial"} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('No more client testimonials are available yet.', 'one-base-theme'); ?></p>
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
get_template_part('pattern-layouts/centred-panel', null, [
    'root_attributes' => ['align' => 'full', 'className' => 'one-202x-pattern-ctas004_centred-panel one-202x-pattern-page003_testimonials', 'backgroundColor' => 'base', 'layout' => ['type' => 'default']],
    'root_class' => 'wp-block-group alignfull one-202x-pattern-ctas004_centred-panel one-202x-pattern-page003_testimonials has-base-background-color has-background',
    'eyebrow' => (esc_html__('Lorem ipsum dolor', 'one-base-theme')),
    'heading' => (esc_html__('The headline goes here', 'one-base-theme')),
    'description' => (esc_html__('I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing', 'one-base-theme')),
    'buttons' => [['url' => home_url('/contact-us/'), 'backgroundColor' => 'base', 'textColor' => 'contrast', 'className' => 'a2e-button', 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Contact us', 'one-base-theme')], ['className' => 'is-style-outline a2e-button', 'textColor' => 'base', 'borderColor' => 'base', 'style' => ['color' => ['background' => 'transparent']], 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Secondary button', 'one-base-theme')]],
]);
})();
?>
