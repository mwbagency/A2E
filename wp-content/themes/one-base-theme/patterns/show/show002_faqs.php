<?php

/**
 * Title: FAQs — two columns
 * Slug: one-202x/show002_faqs
 * Categories: one-202x, one-202x-show
 * Keywords: show002_faqs, faq, questions, answers, support, columns
 * Description: A centred Section Intro above a two-column FAQ List.
 * Viewport Width: 1440
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"tagName":"section","align":"full","className":"one-202x-section one-202x-pattern-show002_faqs","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull one-202x-section one-202x-pattern-show002_faqs">
    <!-- wp:one-202x/section-intro {"subtitle":<?php echo wp_json_encode(__('Need to know', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"title":<?php echo wp_json_encode(__('Frequently asked questions', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Find clear answers to the questions we hear most often. If you still need help, our team is ready to talk.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"alignment":"center","align":"wide","className":"one-202x-show002-faqs__intro"} -->
        <!-- wp:one-202x/icon-button {"text":<?php echo wp_json_encode(__('Ask a question', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#contact","iconPosition":"right"} -->
            <!-- wp:icon {"icon":"core/arrow-up-right","lock":{"move":true,"remove":true}} /-->
        <!-- /wp:one-202x/icon-button -->
    <!-- /wp:one-202x/section-intro -->

    <!-- wp:one-faqs/faqs {"limit":8,"columns":2,"align":"wide","className":"one-202x-show002-faqs__list"} /-->
</section>
<!-- /wp:group -->
