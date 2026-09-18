<?php
/**
 * Title: Testimonials — latest text cards
 * Slug: one-202x/show013_testimonials_text-grid
 * Categories: a2e
 * Description: Testimonials — latest text cards. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":0,"postType":"testimonial","testimonialTextOnly":true,"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-page003_testimonials a2e-testimonials-page__grid","layout":{"type":"default"},"metadata":{"name":"Latest client testimonials"}} -->
<div class="wp-block-query alignfull one-202x-pattern-page003_testimonials a2e-testimonials-page__grid">
    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:one-202x/content-card {"cardStyle":"testimonial"} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('No client testimonials are available yet.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
