<?php
/**
 * Title: FAQs — searchable category hub
 * Slug: one-202x/show012_faqs_searchable-hub
 * Categories: a2e
 * Description: FAQs — searchable category hub. Editable section variant used by the A2E page layouts.
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page008_faqs","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page008_faqs">
    <!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro one-202x-pattern-othe007_search-results a2e-search-results__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro one-202x-pattern-othe007_search-results a2e-search-results__intro">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Knowledge Hub', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","level":1,"className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Frequently Asked Questions', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Find clear answers about our clinical training, accreditation frameworks, room hire, and booking options. Search our FAQ hub to get the information you need quickly.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:search {"label":<?php echo wp_json_encode(__('Search FAQs', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showLabel":false,"placeholder":<?php echo wp_json_encode(__('Search for an answer...', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"buttonText":<?php echo wp_json_encode(__('Search', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"faq"},"className":"a2e-search-results__form a2e-faqs-page__search"} /-->
    </div>
    <!-- /wp:group -->


    <!-- wp:html -->
    <noscript>
        <style>
            .one-202x-pattern-page008_faqs {
                & .a2e-faqs-page__search {
                    display: none;
                }
            }
        </style>
    </noscript>
    <p class="a2e-faqs-page__status screen-reader-text" role="status" aria-atomic="true" data-empty-label="<?php esc_attr_e('No answers found. Try different words or contact our team below.', 'one-base-theme'); ?>" data-results-label="<?php esc_attr_e('Matching answers: %d', 'one-base-theme'); ?>"></p>
    <!-- /wp:html -->

    <!-- wp:group {"tagName":"section","className":"one-202x-pattern-show012_faqs-actions a2e-faqs-page__category","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
    <section class="wp-block-group one-202x-pattern-show012_faqs-actions a2e-faqs-page__category has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('General Enquiries', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:one-faqs/faqs {"categorySlug":"general-enquiries","showAll":true,"columns":1,"singleOpen":true} /-->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","className":"one-202x-pattern-show012_faqs-actions a2e-faqs-page__category","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
    <section class="wp-block-group one-202x-pattern-show012_faqs-actions a2e-faqs-page__category has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Accreditation Frameworks', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:one-faqs/faqs {"categorySlug":"accreditation-frameworks","showAll":true,"columns":1,"singleOpen":true} /-->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","className":"one-202x-pattern-show012_faqs-actions a2e-faqs-page__category","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
    <section class="wp-block-group one-202x-pattern-show012_faqs-actions a2e-faqs-page__category has-contrast-color has-base-background-color has-text-color has-background">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Booking & Admin', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:one-faqs/faqs {"categorySlug":"booking-admin","showAll":true,"columns":1,"singleOpen":true} /-->
    </section>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
