<?php
/**
 * Title: Post — article, author and sharing
 * Slug: one-202x/cont013_post-article
 * Categories: a2e
 * Description: Post — article, author and sharing. Editable section variant used by the A2E page layouts.
 * Inserter: no
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page007_post","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page007_post">
    <!-- wp:group {"tagName":"article","className":"a2e-post-article","backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
    <article class="wp-block-group a2e-post-article has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:post-content {"className":"a2e-post-article__content","layout":{"type":"constrained"}} /-->

        <!-- wp:group {"className":"a2e-post-article__byline","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
        <div class="wp-block-group a2e-post-article__byline">
            <!-- wp:group {"className":"a2e-post-article__author","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-post-article__author">
                <!-- wp:post-author-name {"isLink":true} /-->
                <!-- wp:post-author-biography /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"a2e-post-header__sharing","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-post-header__sharing">
                <!-- wp:shortcode -->
                [addtoany]
                <!-- /wp:shortcode -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </article>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
