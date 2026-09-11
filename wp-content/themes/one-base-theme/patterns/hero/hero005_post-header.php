<?php
/**
 * Title: Blog post header
 * Slug: one-202x/hero005_post-header
 * Categories: a2e
 * Description: The current post’s categories, title, publication date, reading time and social share links.
 * Keywords: blog, post, article, header, sharing
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-hero005_post-header","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero005_post-header has-base-color has-contrast-background-color has-text-color has-background">
    <!-- wp:paragraph {"className":"a2e-post-header__back","fontSize":"small"} -->
    <p class="a2e-post-header__back has-small-font-size"><a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"><?php esc_html_e('< All news', 'one-base-theme'); ?></a></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"className":"a2e-post-header__row","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-post-header__row">
        <!-- wp:group {"className":"a2e-post-header__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-post-header__heading">
            <!-- wp:post-terms {"term":"category","fontSize":"small"} /-->
            <!-- wp:post-title {"level":1,"fontSize":"h-2"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-post-header__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-post-header__details">
            <!-- wp:group {"className":"a2e-post-header__meta","fontSize":"small","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
            <div class="wp-block-group a2e-post-header__meta has-small-font-size">
                <!-- wp:post-date {"format":"j M Y"} /-->
                <!-- wp:post-time-to-read {"displayAsRange":false,"averageReadingSpeed":200} /-->
                <!-- wp:paragraph -->
                <p><?php esc_html_e('read', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            <!-- wp:one-social-sharing/share-links /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
