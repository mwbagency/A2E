<?php
/**
 * Title: Service detail — A2E
 * Slug: one-202x/page005_service-detail
 * Categories: a2e
 * Post Types: service
 * Description: Editable instructor-training service content. The Services template supplies the hero from the service title, summary and featured image. Course, team, testimonial and FAQ selections remain editable.
 * Keywords: service, instructor training, full page
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
$statistics = [
    ['6+', __('Instructor & Train-the-Trainer Programmes', 'one-base-theme')],
    ['100%', __('Delivered by Clinical Experts', 'one-base-theme')],
    ['4000+', __('Training Sessions Delivered', 'one-base-theme')],
];
$delivery = [
    __('Policy Audit', 'one-base-theme'),
    __('Custom Strategy Design', 'one-base-theme'),
    __('National Faculty Implementation', 'one-base-theme'),
    __('Compliance Verification Tracking', 'one-base-theme'),
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page005_service-detail","metadata":{"name":"Service detail content"},"layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page005_service-detail">
<!-- wp:group {"align":"full","className":"one-202x-pattern-show010_statistics-strip","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show010_statistics-strip has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($statistics as [$figure, $description]) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"fontSize":"h-2"} -->
                <p class="has-h-2-font-size"><?php echo esc_html($figure); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaPosition":"right","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:auto 58%"><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Develop your own training capability', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-detail__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-detail__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('Lorem ipsum dolor sit amet consectetur. Scelerisque sit a in in urna. Odio sagittis morbi id sapien vitae nisi duis. Est quam feugiat molestie eu enim sed lectus scelerisque scelerisque. Congue sed pellentesque sed hendrerit mattis aliquam.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->



<!-- wp:group {"tagName":"section","align":"full","className":"a2e-service-detail__steps","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull a2e-service-detail__steps">
    <!-- wp:heading {"fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('From learners to educators', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->
    <!-- wp:list {"ordered":true} -->
    <ol class="wp-block-list">
        <?php foreach ([__('The challenge', 'one-base-theme'), __('Our approach', 'one-base-theme'), __('The outcome', 'one-base-theme')] as $step) : ?>
        <!-- wp:list-item -->
        <li><strong><?php echo esc_html($step); ?></strong><br><?php esc_html_e('Semper id sit facilisi faucibus nunc dictum. Dignissim mattis sit pellentesque ac nunc nunc penatibus pellentesque. Nibh.', 'one-base-theme'); ?></li>
        <!-- /wp:list-item -->
        <?php endforeach; ?>
    </ol>
    <!-- /wp:list -->
</section>
<!-- /wp:group -->


<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('How It Works', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('From clinical expertise to confident instruction', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->

</div>
<!-- /wp:group -->



<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($delivery as $title) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Vitae neque cursus id vitae in aliquam ultrices id. Enim risus id vulputate montes morbi vestibulum massa facilisis ipsum. Semper id sit facilisi faucibus nunc dictum. Dignissim mattis sit pellentesque ac nunc nunc penatibus pellentesque. Nibh.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->


<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":6,"one202xSelection":true,"one202xLatestCount":6,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"anchor":"service-courses","align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"}} -->
<div id="service-courses" class="wp-block-query alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Instructor training programmes', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Choose from a range of instructor and train-the-trainer programmes designed to help healthcare professionals develop the skills needed to deliver effective education within their organisation.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View all courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(get_post_type_archive_link('course') ?: '', JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:one-202x/content-card {"headingLevel":3,"cardStyle":"programme"} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p><?php esc_html_e('No courses are available yet.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->

<!-- wp:group {"metadata":{"name":"Training team — introduction and cards"},"tagName":"section","backgroundColor":"base","textColor":"contrast","align":"full","className":"one-202x-pattern-show016_team-members one-202x-pattern-show017_training-team","ariaLabel":<?php echo wp_json_encode(__('Team members', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show016_team-members one-202x-pattern-show017_training-team has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Team members', 'one-base-theme'); ?>">
    <!-- wp:group {"className":"a2e-training-team__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-training-team__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Learn from experienced clinical educators', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-training-team__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-training-team__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Meet the full team', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(get_post_type_archive_link('team_member'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":3,"one202xSelection":true,"one202xLatestCount":3,"pages":0,"offset":0,"postType":"team_member","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:one-202x/content-card {"headingLevel":3} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php esc_html_e('No team members are available yet.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</section>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Success stories, impactful results', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"text":<?php echo wp_json_encode(__('Write a review', 'one-base-theme')); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->


<!-- wp:pattern {"slug":"one-202x/show013_testimonials"} /-->

<!-- wp:group {"anchor":"service-enquiry","align":"full","className":"one-202x-pattern-form005_training-enquiry","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div id="service-enquiry" class="wp-block-group alignfull one-202x-pattern-form005_training-enquiry has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Build your instructor capability plan', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Tell us about your team, sites and delivery goals. Our specialist faculty will shape the right route with you.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-training-enquiry__form","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-training-enquiry__form">
                <!-- wp:gravityforms/form {"formId":"2","title":false,"description":false,"ajax":true,"theme":"orbital"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"one-202x/show012_faqs-actions"} /-->

<!-- wp:group {"align":"full","className":"one-202x-pattern-ctas004_centred-panel","backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Contact Us', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Ready to build your internal faculty?', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Whether you\'re developing your first group of instructors or expanding an established faculty, we can help you identify the right training pathway for your organisation.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"base","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Talk to Our Training Team', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#service-enquiry"} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","textColor":"base","borderColor":"base","style":{"color":{"background":"transparent"}},"showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Explore All Courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(get_post_type_archive_link('course') ?: '', JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
