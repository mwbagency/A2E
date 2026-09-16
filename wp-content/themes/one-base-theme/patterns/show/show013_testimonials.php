<?php
/**
 * Title: Testimonials — scrolling cards
 * Slug: one-202x/show013_testimonials
 * Categories: a2e
 * Description: A scrolling row of testimonial cards. Choose testimonials in order or show the latest entries.
 * Keywords: testimonials, quotes, reviews, logos, scroll
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"tagName":"section","align":"full","className":"one-202x-pattern-show013_testimonials","ariaLabel":<?php echo wp_json_encode(__('Testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show013_testimonials" aria-label="<?php esc_attr_e('Testimonials', 'one-base-theme'); ?>">
    <!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":0,"postType":"testimonial","testimonialTextOnly":true,"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
            <!-- wp:one-202x/content-card {"cardStyle":"testimonial"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('No testimonials are available yet.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</section>
<!-- /wp:group -->
