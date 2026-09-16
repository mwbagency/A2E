<?php
/**
 * Title: Homepage — A2E
 * Slug: one-202x/page001_homepage
 * Categories: a2e
 * Post Types: page
 * Description: The A2E homepage assembled from the existing hero, statistics, image and text, marquees, course cards, pathways, testimonials, news and call to action patterns.
 * Keywords: homepage, home, full page
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner one-202x-pattern-page001_homepage","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"},"metadata":{"name":"Homepage introduction"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page001_homepage one-202x-pattern-hero003_shapebanner has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__content">
        <!-- wp:heading {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-hero003__title has-h-2-font-size"><?php echo wp_kses_post(__('Founded & run<br>by clinicians<br>since 2006.', 'one-base-theme')); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__details">
            <!-- wp:paragraph {"className":"a2e-hero003__description"} -->
            <p class="a2e-hero003__description"><?php echo wp_kses_post(__('All our instructors are subject matter experts with lived experience. We design and deliver programmes to meet your specific needs, taking a flexible approach to design while unwavering on standards. This way, clinicians feel equipped and supported in real-life emergencies – not just in the classroom.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-hero003__actions a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-hero003__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Book Course Online', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#courses"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","borderColor":"accent","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Corporate Services Consultation', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:one-202x/media-cover {"mediaUrl":<?php echo wp_json_encode(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg', JSON_HEX_TAG | JSON_HEX_AMP); ?>,"mediaType":"image","alt":<?php echo wp_json_encode(__('An instructor presenting to a group in a classroom.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"posterUrl":<?php echo wp_json_encode(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg', JSON_HEX_TAG | JSON_HEX_AMP); ?>,"overlayOpacity":0,"playbackMode":"autoplay","className":"a2e-hero003__media"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-show010_statistics-strip","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show010_statistics-strip has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
                <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"fontSize":"h-2"} -->
                <p class="has-h-2-font-size"><?php echo wp_kses_post(__('350+', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size"><?php echo wp_kses_post(__('Clinical Instructors Nationwide', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
                <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"fontSize":"h-2"} -->
                <p class="has-h-2-font-size"><?php echo wp_kses_post(__('3,000+', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size"><?php echo wp_kses_post(__('Courses Delivered Annually', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
                <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"fontSize":"h-2"} -->
                <p class="has-h-2-font-size"><?php echo wp_kses_post(__('40,000+', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size"><?php echo wp_kses_post(__('Candidates Trained Each Year', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
            </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaPosition":"right","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast","metadata":{"name":"Training delivered across the UK"}} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:auto 58%"><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post(__('National coverage', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Training delivered across the UK', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('We train within client environments nationwide — NHS Trusts, private hospitals, universities and GP practices — as well as at our own dedicated training centres in North London (Archway) and West Midlands (Dudley). Over 200 active client sites and counting.', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"a2e-button-group"} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"accent","textColor":"base","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View Training Centres', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->

<!-- wp:one-202x/logo-marquee {"align":"full","className":"one-202x-pattern-ctas005_logo-marquee","metadata":{"name":"Clients and partners"}} -->
    <!-- wp:gallery {"columns":5,"imageCrop":false,"linkTo":"none","sizeSlug":"full"} -->
<figure class="wp-block-gallery has-nested-images columns-5">
<!-- wp:image {"width":"58px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} --><figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/accreditations/qualsafe.png')); ?>" alt="Qualsafe registered centre" style="object-fit:contain;width:58px;height:56px"/></figure><!-- /wp:image -->

<!-- wp:image {"width":"128px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} --><figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/partners/nuffield-health.png')); ?>" alt="Nuffield Health" style="object-fit:contain;width:128px;height:56px"/></figure><!-- /wp:image -->

<!-- wp:image {"width":"235px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} --><figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/partners/moorfields.png')); ?>" alt="Moorfields Private Eye Hospital" style="object-fit:contain;width:235px;height:56px"/></figure><!-- /wp:image -->

<!-- wp:image {"width":"128px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} --><figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/partners/nhs.png')); ?>" alt="NHS" style="object-fit:contain;width:128px;height:56px"/></figure><!-- /wp:image -->

<!-- wp:image {"width":"235px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} --><figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/partners/oxford-brookes.png')); ?>" alt="Oxford Brookes University" style="object-fit:contain;width:235px;height:56px"/></figure><!-- /wp:image -->
</figure>
<!-- /wp:gallery -->
<!-- /wp:one-202x/logo-marquee -->

<!-- wp:query {"namespace":"one-202x/selected-content","query":{"perPage":3,"one202xSelection":true,"one202xLatestCount":3,"pages":0,"offset":0,"postType":"course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"full","className":"one-202x-pattern-show008_popular-courses","layout":{"type":"default"},"metadata":{"name":"Popular courses"},"anchor":"courses"} -->
<div id="courses" class="wp-block-query alignfull one-202x-pattern-show008_popular-courses">
    <!-- wp:group {"className":"a2e-popular-courses__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-popular-courses__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Flexible training, unwavering standards', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-popular-courses__description","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-popular-courses__description">
            <!-- wp:paragraph -->
            <p><?php echo wp_kses_post(__('Some of our popular courses...', 'one-base-theme')); ?></p>
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
        <p><?php echo wp_kses_post(__('No courses are available yet.', 'one-base-theme')); ?></p>
        <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base","metadata":{"name":"A consultative and creative approach to every client"}} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post(__('Our courses', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('A consultative and creative approach to every client', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"default"}} --><div class="wp-block-group"><!-- wp:paragraph --><p><?php echo wp_kses_post(__('We know, from experience, that no two life support situations are the same – so why would your training be?', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('We take a consultative and creative approach; listening, understanding and challenging the preconceived parameters.', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('Creating an experience unique to you, in which your people can best learn, practise and demonstrate their skills.', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('Training programmes which befit the highest standard of front-line care.', 'one-base-theme')); ?></p><!-- /wp:paragraph --></div><!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"a2e-button-group"} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"yellow","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View our courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#courses"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"},"metadata":{"name":"Core service areas"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php echo wp_kses_post(__('Core service areas', 'one-base-theme')); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php echo wp_kses_post(__('7 specialist pathways.<br>Complete training.', 'one-base-theme')); ?></h2>
    <!-- /wp:heading -->

</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Specialist training pathways"},"tagName":"section","align":"full","className":"one-202x-pattern-show018_numbered-cards one-202x-pattern-page001_homepage","backgroundColor":"base","textColor":"contrast","ariaLabel":<?php echo wp_json_encode(__('Specialist training pathways', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull one-202x-pattern-show018_numbered-cards one-202x-pattern-page001_homepage has-contrast-color has-base-background-color has-text-color has-background" aria-label="Specialist training pathways">
    <!-- wp:group {"metadata":{"name":"Scrolling cards"},"className":"a2e-numbered-cards__track","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-numbered-cards__track">
                <!-- wp:group {"metadata":{"name":"Image card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card--reveal","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('01', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><a href="<?php echo esc_url(home_url('/service-category/oliver-mcgowan-mandatory-training/')); ?>"><?php echo wp_kses_post(__('Oliver McGowan Mandatory Training', 'one-base-theme')); ?></a></h3>
                <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
<p class="a2e-numbered-card__description"></p>
<!-- /wp:paragraph -->
</div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/oliver-mcgowan-mandatory-training/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->
                <!-- wp:group {"metadata":{"name":"Text card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card\u002d\u002dsolid","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card a2e-numbered-card--reveal">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('02', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><?php echo wp_kses_post(__('Resuscitation Training', 'one-base-theme')); ?></h3>
                <!-- /wp:heading -->

                                <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
                <p class="a2e-numbered-card__description"><?php echo wp_kses_post(__('RCUK-approved BLS, ILS and ALS pathways from Level 2 basic through to Level 4 advanced life support.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                            </div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/resuscitation-training/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->
                <!-- wp:group {"metadata":{"name":"Image card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card--reveal","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('03', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><a href="<?php echo esc_url(home_url('/service-category/deteriorating-patient-training/')); ?>"><?php echo wp_kses_post(__('Deteriorating Patient Training', 'one-base-theme')); ?></a></h3>
                <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
<p class="a2e-numbered-card__description"></p>
<!-- /wp:paragraph -->
</div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/deteriorating-patient-training/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->
                <!-- wp:group {"metadata":{"name":"Image card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card--reveal","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('04', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><a href="<?php echo esc_url(home_url('/service-category/instructor-training/')); ?>"><?php echo wp_kses_post(__('Instructor Training', 'one-base-theme')); ?></a></h3>
                <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
<p class="a2e-numbered-card__description"></p>
<!-- /wp:paragraph -->
</div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/instructor-training/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Image card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card--reveal","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('05', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><a href="<?php echo esc_url(home_url('/service-category/associated-training-programmes/')); ?>"><?php echo wp_kses_post(__('Associated Training Programmes', 'one-base-theme')); ?></a></h3>
                <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
<p class="a2e-numbered-card__description"></p>
<!-- /wp:paragraph -->
</div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/associated-training-programmes/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Image card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card--reveal","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('06', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><a href="<?php echo esc_url(home_url('/service-category/governance-consulting/')); ?>"><?php echo wp_kses_post(__('Governance & Consulting', 'one-base-theme')); ?></a></h3>
                <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
<p class="a2e-numbered-card__description"></p>
<!-- /wp:paragraph -->
</div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/governance-consulting/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Image card"},"tagName":"article","className":"a2e-numbered-card a2e-numbered-card--reveal","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo wp_kses_post(__('07', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><a href="<?php echo esc_url(home_url('/service-category/online-training-programmes/')); ?>"><?php echo wp_kses_post(__('Online Training Programmes', 'one-base-theme')); ?></a></h3>
                <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
<p class="a2e-numbered-card__description"></p>
<!-- /wp:paragraph -->
</div>
            <!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure>
            <!-- /wp:image -->

<!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":<?php echo wp_json_encode(home_url('/service-category/online-training-programmes/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
</article>
<!-- /wp:group -->
</div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:one-202x/logo-marquee {"align":"full","className":"one-202x-pattern-ctas005_logo-marquee"} -->
    <!-- wp:gallery {"columns":3,"imageCrop":false,"linkTo":"none","sizeSlug":"full"} -->
    <figure class="wp-block-gallery has-nested-images columns-3">
                <!-- wp:image {"width":"58px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/accreditations/qualsafe.png')); ?>" alt="Qualsafe registered centre" style="object-fit:contain;width:58px;height:56px"/></figure>
        <!-- /wp:image -->
                <!-- wp:image {"width":"128px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/accreditations/ihpn.png')); ?>" alt="Independent Healthcare Providers Network" style="object-fit:contain;width:128px;height:56px"/></figure>
        <!-- /wp:image -->
                <!-- wp:image {"width":"235px","height":"56px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/accreditations/skills-for-health.png')); ?>" alt="Skills for Health Quality Mark" style="object-fit:contain;width:235px;height:56px"/></figure>
        <!-- /wp:image -->
            </figure>
    <!-- /wp:gallery -->
<!-- /wp:one-202x/logo-marquee -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base","metadata":{"name":"The first few moments after any medical incident are crucial"}} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg'); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php echo wp_kses_post(__('About us', 'one-base-theme')); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('The first few moments after any medical incident are crucial', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"default"}} --><div class="wp-block-group"><!-- wp:paragraph --><p><?php echo wp_kses_post(__('We are clinician-led, we have lived experience and continue to practise. We know what it feels like to save a life, and we know the panic that can surround our clients when a situation occurs.', 'one-base-theme')); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p><?php echo wp_kses_post(__('That’s why we don’t just prepare them to pass an exam – we prepare them for the life experiences they will go on to have in life support and resuscitation. We can intersperse our caregiver with facts which reassures them that we not only care – but we know. We are a safe and practised pair of hands that they can rely on.', 'one-base-theme')); ?></p><!-- /wp:paragraph --></div><!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"a2e-button-group"} -->
            <div class="wp-block-group a2e-button-group">
                <!-- wp:one-202x/icon-button {"backgroundColor":"yellow","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Read Our Story', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->

<!-- wp:group {"metadata":{"name":"Testimonials introduction"},"align":"full","className":"one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-show011_content-feed one-202x-pattern-show014_blog-posts has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-content-feed__intro","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-content-feed__intro">
        <!-- wp:heading {"fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('You’re in good company', 'one-base-theme')); ?></h2>
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
<section style="padding-top:0" id="testimonials" class="wp-block-group alignfull one-202x-pattern-show013_testimonials" aria-label="Testimonials">
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

<!-- wp:group {"align":"full","className":"one-202x-pattern-ctas004_centred-panel","backgroundColor":"base","layout":{"type":"default"},"metadata":{"name":"Training enquiry call to action"}} -->
<div class="wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php echo wp_kses_post(__('Lorem ipsum dolor', 'one-base-theme')); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php echo wp_kses_post(__('Ready to strengthen your team’s clinical confidence?', 'one-base-theme')); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php echo wp_kses_post(__('Build practical capability with flexible, clinician-led training designed around your people and your setting.', 'one-base-theme')); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"base","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Book a Course', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#courses"} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","textColor":"base","borderColor":"base","style":{"color":{"background":"transparent"}},"showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Corporate Services Consultation', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
