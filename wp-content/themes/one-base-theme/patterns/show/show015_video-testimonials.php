<?php
/**
 * Title: Video testimonials — slider
 * Slug: one-202x/show015_video-testimonials
 * Categories: a2e
 * Description: A sliding row of portrait videos. Show the latest video testimonials or select and order them manually.
 * Keywords: testimonials, video, reviews, slider, scroll
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"metadata":{"name":"Video testimonials — slider"},"tagName":"section","align":"full","backgroundColor":"base","textColor":"contrast","className":"one-202x-pattern-show013_testimonials one-202x-pattern-show015_video-testimonials","ariaLabel":<?php echo wp_json_encode(__('Video testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show013_testimonials one-202x-pattern-show015_video-testimonials has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Video testimonials', 'one-base-theme'); ?>">
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
