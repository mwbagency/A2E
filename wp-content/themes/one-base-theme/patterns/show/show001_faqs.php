<?php

/**
 * Title: FAQs — with image
 * Slug: one-202x/show001_faqs
 * Categories: one-202x, one-202x-show
 * Keywords: show001_faqs, faq, questions, answers, image, support
 * Description: A two-column FAQ section composed from Section Intro, Media Cover, and FAQ List blocks.
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"tagName":"section","align":"full","className":"one-202x-section one-202x-pattern-show001_faqs","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull one-202x-section one-202x-pattern-show001_faqs">
    <!-- wp:group {"align":"wide","className":"one-202x-show001-faqs__layout","layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"22rem"}} -->
    <div class="wp-block-group alignwide one-202x-show001-faqs__layout">
        <!-- wp:group {"className":"one-202x-show001-faqs__left","layout":{"type":"default"}} -->
        <div class="wp-block-group one-202x-show001-faqs__left">
            <!-- wp:one-202x/section-intro {"subtitle":<?php echo wp_json_encode(__('Need to know', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"title":<?php echo wp_json_encode(__('Frequently asked questions', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Find clear answers to the questions we hear most often. If you still need help, our team is ready to talk.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"one-202x-show001-faqs__intro"} -->
            <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode(__('Ask a question', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#contact","iconPosition":"left"} -->
            <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
            <!-- /wp:one-202x/section-intro -->

            <!-- wp:one-202x/media-cover {"mediaUrl":<?php echo wp_json_encode(get_theme_file_uri('assets/images/placeholders/default-4x3.webp'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"mediaType":"image","alt":"","focalPoint":{"x":0.5,"y":0.5},"overlayColor":"#ffffff","overlayOpacity":0,"className":"one-202x-show001-faqs__media"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:one-faqs/faqs {"limit":8,"columns":1,"className":"one-202x-show001-faqs__list"} /-->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
