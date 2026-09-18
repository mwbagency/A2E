<?php
/**
 * Title: Testimonials — clients below an introduction
 * Slug: one-202x/show013_testimonials_clients
 * Categories: a2e
 * Description: Client testimonial slider with a testimonials anchor and no top padding, for use below a separate introduction.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"tagName":"section","align":"full","className":"one-202x-pattern-show013_testimonials","ariaLabel":<?php echo wp_json_encode(__('Testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"},"metadata":{"name":"Client testimonials"},"anchor":"testimonials","style":{"spacing":{"padding":{"top":"0"}}}} -->
<section id="testimonials" class="wp-block-group alignfull one-202x-pattern-show013_testimonials" aria-label="Testimonials" style="padding-top:0">
    <!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":0,"postType":"testimonial","testimonialTextOnly":true,"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
            <!-- wp:one-202x/content-card {"cardStyle":"testimonial"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('No testimonials are available yet.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</section>
<!-- /wp:group -->
