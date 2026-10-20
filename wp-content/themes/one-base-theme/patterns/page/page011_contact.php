<?php
/**
 * Title: Contact page — A2E
 * Slug: one-202x/page011_contact
 * Categories: a2e
 * Description: A shaped hero, editable office details, a Gravity Forms enquiry form and a corporate services callout.
 * Post Types: page
 * Inserter: no
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
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
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page011_contact","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page011_contact">
    <!-- wp:group {"className":"one-202x-pattern-form005_training-enquiry a2e-contact-page__section","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-form005_training-enquiry a2e-contact-page__section">
        <!-- wp:group {"className":"a2e-contact-page__intro a2e-contact-page__visit","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-contact-page__intro a2e-contact-page__visit">
            <!-- wp:heading {"fontSize":"h-4"} -->
                <h2 class="wp-block-heading has-h-4-font-size">Visit, call or email us</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"fontSize":"body"} -->
                <p class="has-body-font-size">Our teams work across the UK, with training centres and delivery locations in London, Birmingham and Bolton.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"a2e-contact-page__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-contact-page__details">
            <!-- wp:group {"className":"a2e-contact-page__contacts","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-contact-page__contacts">
                <!-- wp:group {"className":"a2e-contact-page__contact","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-contact-page__contact">
                    <!-- wp:icon {"icon":"one-202x-regular/email","textColor":"contrast"} /-->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><a href="mailto:admin@a-ets.com">admin@a-ets.com</a></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
                <!-- wp:group {"className":"a2e-contact-page__contact","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-contact-page__contact">
                    <!-- wp:icon {"icon":"one-202x-regular/telephone","textColor":"contrast"} /-->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><a href="tel:08001123205">0800 112 3205</a></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"className":"a2e-contact-page__locations","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-contact-page__locations">
                <!-- wp:group {"className":"a2e-contact-page__location","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-contact-page__location">
                    <!-- wp:icon {"icon":"one-202x/a2e-puzzle","textColor":"contrast"} /-->
                    <!-- wp:group {"className":"a2e-contact-page__address","layout":{"type":"default"}} -->
                    <div class="wp-block-group a2e-contact-page__address">
                        <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                            <h3 class="wp-block-heading has-h-4-font-size">London</h3>
                        <!-- /wp:heading -->
                        <!-- wp:paragraph {"fontSize":"small"} -->
                            <p class="has-small-font-size">Unit 2, Lysander Mews,<br>Lysander Grove, London,<br>N19 3QP</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <!-- wp:group {"className":"a2e-contact-page__location","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-contact-page__location">
                    <!-- wp:icon {"icon":"one-202x/a2e-puzzle","textColor":"contrast"} /-->
                    <!-- wp:group {"className":"a2e-contact-page__address","layout":{"type":"default"}} -->
                    <div class="wp-block-group a2e-contact-page__address">
                        <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                            <h3 class="wp-block-heading has-h-4-font-size">Birmingham</h3>
                        <!-- /wp:heading -->
                        <!-- wp:paragraph {"fontSize":"small"} -->
                            <p class="has-small-font-size">Baylies Hall, Tower Street,<br>Dudley, DY1 1NB</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <!-- wp:group {"className":"a2e-contact-page__location","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-contact-page__location">
                    <!-- wp:icon {"icon":"one-202x/a2e-puzzle","textColor":"contrast"} /-->
                    <!-- wp:group {"className":"a2e-contact-page__address","layout":{"type":"default"}} -->
                    <div class="wp-block-group a2e-contact-page__address">
                        <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                            <h3 class="wp-block-heading has-h-4-font-size">Bolton</h3>
                        <!-- /wp:heading -->
                        <!-- wp:paragraph {"fontSize":"small"} -->
                            <p class="has-small-font-size">Bolton Wanderers FC<br>Stadium, Horwich, Bolton,<br>BL6 6JW</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"a2e-contact-page__intro a2e-contact-page__enquiry","layout":{"type":"default"},"anchor":"contact-enquiry"} -->
        <div id="contact-enquiry" class="wp-block-group a2e-contact-page__intro a2e-contact-page__enquiry">
            <!-- wp:heading {"fontSize":"h-4"} -->
                <h2 class="wp-block-heading has-h-4-font-size">Make an enquiry</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"fontSize":"body"} -->
                <p class="has-body-font-size">We’re ready for your enquiry. Get in touch. Just pop your details into the form below and we’ll get back to you as soon as we can.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"a2e-contact-page__form","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-contact-page__form">
            <!-- wp:gravityforms/form {"formId":"3","title":false,"description":false,"ajax":true,"theme":"orbital"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
<?php
})();
?>

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>

<!-- wp:group {"align":"full","className":"one-202x-pattern-page011_contact","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page011_contact">
    <?php
get_template_part('pattern-layouts/centred-panel', null, [
    'root_attributes' => ['align' => 'full', 'className' => 'one-202x-pattern-ctas004_centred-panel', 'backgroundColor' => 'base', 'layout' => ['type' => 'default']],
    'root_class' => 'wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background',
    'eyebrow' => (esc_html__('For B2B & procurement teams', 'one-base-theme')),
    'heading' => (esc_html__('Corporate framework contracts', 'one-base-theme')),
    'description' => (esc_html__('Talk to our commercial team about workforce training, framework agreements, service provision and tailored delivery across your organisation.', 'one-base-theme')),
    'buttons' => [['url' => '#contact-enquiry', 'backgroundColor' => 'base', 'textColor' => 'contrast', 'className' => 'a2e-button', 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Speak to Corporate Services', 'one-base-theme')]],
]);
?>

</div>
<!-- /wp:group -->
<?php
})();
?>
