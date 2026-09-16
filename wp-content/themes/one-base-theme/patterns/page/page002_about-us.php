<?php
/**
 * Title: About Us — A2E
 * Slug: one-202x/page002_about-us
 * Categories: a2e
 * Post Types: page
 * Block Types: core/post-content
 * Description: An editable About Us page built from the existing hero, timeline, accreditation logos, mission columns, people, team, news, courses, testimonials and contact patterns.
 * Keywords: about us, company, story, full page
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

$image_url = wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg';
// Figma supplies the founding story; the remaining years are editable milestones.
$years = ['2006', '2011', '2016', '2020', __('Now', 'one-base-theme')];
$commitments = [
    [
        __('Our Mission', 'one-base-theme'),
        __('The business ethos is to provide outstanding training using recognised teaching methodology for life support training with instructors who are still clinically credible.', 'one-base-theme'),
        '',
    ],
    [
        __('How We Operate', 'one-base-theme'),
        __('The premise of our training is to equip all sectors of the community with the correct knowledge to make a real difference and potentially possibly save a life. We are extremely excited about our work in the developing world where there is a severe lack of resources and training.', 'one-base-theme'),
        __('Not many companies can truly say that their work directly saves lives.', 'one-base-theme'),
    ],
    [
        __('Commitment of Our Services', 'one-base-theme'),
        __('We provide year long customer service, not just a once of year training session. Every customer will have access to our members only area where they can download the latest Resuscitation Updates and News, posters etc – We are a resource as well as a provider of training.', 'one-base-theme'),
        '',
    ],
];
$people_features = [
    [__('Active clinical registration', 'one-base-theme'), __('GMC, NMC or HCPC verified and continuously monitored.', 'one-base-theme')],
    [__('Front-line acute care', 'one-base-theme'), __('Resuscitation Officers, A&E Doctors, ICU Nurses, Paramedics and Midwives.', 'one-base-theme')],
    [__('Internal quality auditing', 'one-base-theme'), __('Ongoing class reviews and CPD to maintain teaching standards.', 'one-base-theme')],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"},"metadata":{"name":"About Us introduction"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero003_shapebanner has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__content">
        <!-- wp:heading {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-hero003__title has-h-2-font-size"><?php esc_html_e('About Us', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__details">
            <!-- wp:paragraph {"className":"a2e-hero003__description"} -->
            <p class="a2e-hero003__description"><?php esc_html_e('Founded and run by clinicians since 2006, A to E Training & Solutions is the UK\'s largest specialist healthcare training and clinical service provider — built on real people, real experience, and real situations.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-hero003__statistics","metadata":{"name":"Statistics"},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}} -->
            <div class="wp-block-group a2e-hero003__statistics">
                <!-- wp:group {"className":"a2e-hero003__statistic","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-hero003__statistic">
                    <!-- wp:paragraph {"className":"a2e-hero003__number","fontSize":"h-4"} -->
                    <p class="a2e-hero003__number has-h-4-font-size"><?php esc_html_e('350+', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                    <p class="has-small-font-size"><?php esc_html_e('Clinical instructors', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"a2e-hero003__statistic","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-hero003__statistic">
                    <!-- wp:paragraph {"className":"a2e-hero003__number","fontSize":"h-4"} -->
                    <p class="a2e-hero003__number has-h-4-font-size"><?php esc_html_e('3,000', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                    <p class="has-small-font-size"><?php esc_html_e('Courses per year', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"a2e-hero003__statistic","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-hero003__statistic">
                    <!-- wp:paragraph {"className":"a2e-hero003__number","fontSize":"h-4"} -->
                    <p class="a2e-hero003__number has-h-4-font-size"><?php esc_html_e('200+', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"fontSize":"small"} -->
                    <p class="has-small-font-size"><?php esc_html_e('Client sites', 'one-base-theme'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"a2e-hero003__actions a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-hero003__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Make an enquiry', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-202x/media-cover {"mediaUrl":<?php echo wp_json_encode($image_url, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"mediaType":"image","alt":<?php echo wp_json_encode(__('An instructor presenting to a group in a classroom.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"posterUrl":<?php echo wp_json_encode($image_url, JSON_HEX_TAG | JSON_HEX_AMP); ?>,"overlayOpacity":0,"playbackMode":"autoplay","className":"a2e-hero003__media"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('OUR JOURNEY', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('From 2006 founding to national scale', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
    <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Tracing our evolution from a specialist medical founding to the UK\'s largest specialist life support training entity.', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->


</div>
<!-- /wp:group -->

<!-- wp:tabs {"align":"full","className":"one-202x-pattern-show009_timeline","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-tabs alignfull one-202x-pattern-show009_timeline has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:tab-list {"ariaLabel":<?php echo wp_json_encode(__('Timeline years', 'one-base-theme')); ?>} -->
    <div class="wp-block-tab-list" role="tablist" aria-label="<?php esc_attr_e('Timeline years', 'one-base-theme'); ?>">
        <?php foreach ($years as $year) : ?>
        <button type="button" role="tab"><?php echo esc_html($year); ?></button>
        <?php endforeach; ?>
    </div>
    <!-- /wp:tab-list -->

    <!-- wp:tab-panels -->
    <div class="wp-block-tab-panels">
        <?php foreach ($years as $year) : ?>
        <!-- wp:tab-panel {"label":"<?php echo esc_attr($year); ?>","layout":{"type":"default"}} -->
        <section class="wp-block-tab-panel" role="tabpanel" tabindex="0">
            <!-- wp:media-text {"mediaPosition":"right","mediaType":"image","verticalAlignment":"top"} -->
            <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-top"><div class="wp-block-media-text__content">
                <!-- wp:heading {"fontSize":"h-2"} -->
                <h2 class="wp-block-heading has-h-2-font-size"><?php echo esc_html($year === '2006' ? __('Founded by clinicians', 'one-base-theme') : sprintf(__('Milestone — %s', 'one-base-theme'), $year)); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:group {"className":"a2e-timeline__description","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-timeline__description">
                    <!-- wp:paragraph -->
                    <p><?php echo esc_html($year === '2006'
                        ? __('A to E Training & Solutions Ltd was founded in 2006 by three colleagues (a nurse, paramedic, and doctor) who were active in the health service and who saw a gap in the provision of emergency life support and medical emergencies training. This field is not regulated and it is clear that there was a wide range of providers in the market delivering training of various quality.', 'one-base-theme')
                        : __('Add the story and image for this milestone.', 'one-base-theme')); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
            <!-- /wp:media-text -->
        </section>
        <!-- /wp:tab-panel -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:tab-panels -->
</div>
<!-- /wp:tabs -->

<!-- wp:pattern {"slug":"one-202x/ctas005_logo-marquee"} /-->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Mission, Method & Commitment', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Our Mission, Method and Commitment', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->




</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($commitments as [$title, $description, $emphasis]) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
            <!-- /wp:paragraph -->
            <?php if ($emphasis !== '') : ?>
            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><strong><?php echo esc_html($emphasis); ?></strong></p>
            <!-- /wp:paragraph -->
            <?php endif; ?>
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('OUR PEOPLE', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Real People, Real Experience, Real Situations', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Every educator in our network of 350+ instructors brings real-world, front-line clinical experience. We onboard only clinicians who have lived the acute medical emergencies they teach,', 'one-base-theme'); ?> <strong><?php esc_html_e('bringing genuine credibility to every session.', 'one-base-theme'); ?></strong></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-image-features__list","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-image-features__list">
                <?php foreach ($people_features as [$title, $description]) : ?>
                <!-- wp:group {"className":"a2e-image-features__point","layout":{"type":"default"}} -->
                <div class="wp-block-group a2e-image-features__point">
                    <!-- wp:icon {"icon":"one-202x/a2e-vision","textColor":"base"} /-->
                    <!-- wp:group {"className":"a2e-image-features__point-text","layout":{"type":"default"}} -->
                    <div class="wp-block-group a2e-image-features__point-text">
                        <!-- wp:heading {"level":3,"fontSize":"body"} -->
                        <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <?php endforeach; ?>
            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->

<!-- wp:pattern {"slug":"one-202x/show017_training-team"} /-->

<!-- wp:group {"metadata":{"name":"Latest news"},"align":"full","className":"one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-content-feed__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-content-feed__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Latest news', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-content-feed__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-content-feed__description">
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all news', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/news/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"layout":{"type":"default"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
            <!-- wp:one-202x/content-card {"headingLevel":3,"cardStyle":"resource"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('No blog posts found.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":3,"one202xSelection":true,"one202xLatestCount":3,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"},"anchor":"courses"} -->
<div id="courses" class="wp-block-query alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Check out some of our popular courses!', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
            <!-- wp:paragraph -->
            <p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View all courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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

<!-- wp:group {"metadata":{"name":"Testimonials introduction"},"align":"full","className":"one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-content-feed__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-content-feed__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Success stories, impactful results', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-content-feed__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-content-feed__description">
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('Lorem ipsum dolor sit amet consectetur. Pellentesque a diam hac nec in commodo enim facilisi donec.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"contrast","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('See all testimonials', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#testimonials"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","backgroundColor":"base","textColor":"contrast","borderColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Write a review', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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

<!-- wp:group {"align":"full","className":"one-202x-pattern-ctas004_centred-panel","backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Contact us', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Get in touch today!', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"base","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Book on a course', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#courses"} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"url":<?php echo wp_json_encode(home_url('/contact-us/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"is-style-outline a2e-button","textColor":"base","borderColor":"base","style":{"color":{"background":"transparent"}},"showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Contact us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
