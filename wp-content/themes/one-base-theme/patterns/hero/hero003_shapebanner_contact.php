<?php
/**
 * Title: Hero — contact
 * Slug: one-202x/hero003_shapebanner_contact
 * Categories: a2e
 * Description: Hero — contact. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$image_url = wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg';
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page011_contact","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page011_contact">
    <!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner a2e-hero003--shape-4 a2e-hero003--media-left","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull one-202x-pattern-hero003_shapebanner a2e-hero003--shape-4 a2e-hero003--media-left has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__content">
            <!-- wp:heading {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} -->
                <h1 class="wp-block-heading a2e-hero003__title has-h-2-font-size"><?php esc_html_e('Let’s start a conversation', 'one-base-theme'); ?></h1>
            <!-- /wp:heading -->
            <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-hero003__details">
                <!-- wp:paragraph {"className":"a2e-hero003__description"} -->
                    <p class="a2e-hero003__description"><?php esc_html_e('Have you got a question about a course, service or product? Or maybe you can’t see what you’re looking for.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- wp:one-202x/media-cover {"mediaUrl":<?php echo wp_json_encode($image_url, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"mediaType":"image","alt":<?php echo wp_json_encode(__('An instructor presenting to a group in a classroom.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"posterUrl":<?php echo wp_json_encode($image_url, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"overlayOpacity":0,"playbackMode":"autoplay","className":"a2e-hero003__media"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
