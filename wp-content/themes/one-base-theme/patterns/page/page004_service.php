<?php
/**
 * Title: Service page — A2E
 * Slug: one-202x/page004_service
 * Categories: a2e
 * Post Types: page, service
 * Block Types: core/post-content
 * Description: Insert into a Page or Service using the Service page — A2E template. Each page keeps its own editable hero, expertise, pathways, partnerships, innovation, team, delivery methods, consultancy and contact panel.
 * Keywords: service, training, clinical, full page
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
$image_url = wp_get_upload_dir()['baseurl'] . '/2026/09/quilia-1-aA2Fadydc-unsplash.jpg';
$pathways = [
    [__('Oliver McGowan Mandatory Training', 'one-base-theme'), 'oliver-mcgowan-mandatory-training'],
    [__('Resuscitation Training', 'one-base-theme'), 'resuscitation-training'],
    [__('Deteriorating Patient Training', 'one-base-theme'), 'deteriorating-patient-training'],
    [__('Instructor Training', 'one-base-theme'), 'instructor-training'],
    [__('Associated Training Programmes', 'one-base-theme'), 'associated-training-programmes'],
    [__('Governance & Consulting', 'one-base-theme'), 'governance-consulting'],
    [__('Online Training Programmes', 'one-base-theme'), 'online-training-programmes'],
];
$delivery = [
    [__('Classroom Training', 'one-base-theme'), __('Accredited, clinician-led courses delivered at your site or our London and Dudley centres.', 'one-base-theme')],
    [__('In-Situ Simulations', 'one-base-theme'), __('Realistic resuscitation simulations run within your live clinical environment.', 'one-base-theme')],
    [__('Clinical Consultancy', 'one-base-theme'), __('Expert advisory from actively practising Resuscitation Officers and acute clinicians.', 'one-base-theme')],
    [__('Policy Creation', 'one-base-theme'), __('Formal policy development, audit and review aligned to CQC and RCUK standards.', 'one-base-theme')],
];
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page004_service","metadata":{"name":"Service page content"},"layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group alignfull one-202x-pattern-page004_service">

<!-- wp:group {"align":"full","className":"one-202x-pattern-hero003_shapebanner a2e-hero003--shape-2 a2e-hero003--media-left","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-hero003_shapebanner a2e-hero003--shape-2 a2e-hero003--media-left has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"className":"a2e-hero003__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-hero003__content">
        <!-- wp:heading {"level":1,"className":"a2e-hero003__title","fontSize":"h-2"} -->
        <h1 class="wp-block-heading a2e-hero003__title has-h-2-font-size"><?php esc_html_e('Clinical education for safer care', 'one-base-theme'); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"a2e-hero003__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-hero003__details">
            <!-- wp:paragraph {"className":"a2e-hero003__description"} -->
            <p class="a2e-hero003__description"><?php esc_html_e('Our services are engineered around a single, unwavering commitment: quality clinical education that improves patient safety. Whether you require a single localised classroom session at your own site or a fully managed, multi-year national training pipeline across dozens of client locations, our capacity scales precisely to your need.', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"className":"a2e-hero003__actions a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-group a2e-hero003__actions a2e-button-group">
                <!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Discover services', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"url":"#service-pathways"} -->
                    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
                <!-- /wp:one-202x/icon-button -->
                <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","borderColor":"accent","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('View all courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Over 100 years of clinical expertise', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('A to E Training and Solutions Ltd has been operating in the specialist field of resuscitation education, governance, and infrastructure, providing high quality education and consultancy since 2006. Our team of expert clinicians, who are nationally accredited educators, has more than 100 years of experience of resuscitation service provision for the healthcare sector.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Core service areas', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('7 specialist pathways. Complete training.', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->

</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Numbered cards — slider"},"tagName":"section","align":"full","className":"one-202x-pattern-show018_numbered-cards","backgroundColor":"base","textColor":"contrast","ariaLabel":<?php echo wp_json_encode(__('Numbered cards', 'one-base-theme')); ?>,"layout":{"type":"default"},"anchor":"service-pathways"} -->
<section id="service-pathways" class="wp-block-group alignfull one-202x-pattern-show018_numbered-cards has-contrast-color has-base-background-color has-text-color has-background" aria-label="<?php esc_attr_e('Numbered cards', 'one-base-theme'); ?>">
    <!-- wp:group {"metadata":{"name":"Scrolling cards"},"className":"a2e-numbered-cards__track","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-numbered-cards__track">
        <?php foreach ($pathways as $index => [$title, $slug]) :
            $term = get_term_by('slug', $slug, 'service_category');
            $url = $term ? get_term_link($term) : '';
            $url = is_wp_error($url) ? '' : $url;
        ?>
        <!-- wp:group {"metadata":{"name":<?php echo wp_json_encode(__('Page link', 'one-base-theme')); ?>},"tagName":"article","className":"a2e-numbered-card <?php echo $index === 1 ? 'a2e-numbered-card--solid' : 'a2e-numbered-card--reveal'; ?>","layout":{"type":"default"}} -->
        <article class="wp-block-group a2e-numbered-card <?php echo $index === 1 ? 'a2e-numbered-card--solid' : 'a2e-numbered-card--reveal'; ?>">
            <!-- wp:group {"className":"a2e-numbered-card__content","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-numbered-card__content">
                <!-- wp:paragraph {"className":"a2e-numbered-card__number","fontSize":"overline"} -->
                <p class="a2e-numbered-card__number has-overline-font-size"><?php echo esc_html(sprintf('%02d', $index + 1)); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"h-4"} -->
                <h3 class="wp-block-heading has-h-4-font-size"><?php if ($url) : ?><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a><?php else : ?><?php echo esc_html($title); ?><?php endif; ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"a2e-numbered-card__description"} -->
                <p class="a2e-numbered-card__description"><?php if ($index === 1) esc_html_e('RCUK-approved BLS, ILS and ALS pathways from Level 2 basic through to Level 4 advanced life support.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <?php if ($index !== 1) : ?>
            <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"a2e-numbered-card__image"} -->
            <figure class="wp-block-image size-full a2e-numbered-card__image"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure>
            <!-- /wp:image -->
            <?php endif; ?>
            <!-- wp:one-202x/icon-button {"className":"a2e-button a2e-numbered-card__button","backgroundColor":"base","textColor":"contrast","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Learn more', 'one-base-theme')); ?>,"url":<?php echo wp_json_encode($url, JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->
        </article>
        <!-- /wp:group -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Proven expertise. Lasting partnerships.', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We have a proven track record of working with a diverse range of clients in providing services and programmes that exceed nationally accepted standards and achieve the specific needs of service users and the unique environments in which they work.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We produce a bi annual newsletter with details of developments in medical emergencies and resuscitation practice in the UK and Europe. We also undertake a direct mailing to relevant organisations and groups quarterly. A significant proportion of our business is repeat and also through satisfied customer recommendations and referrals.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
<!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
<div class="wp-block-group a2e-button-group">
<!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","backgroundColor":"accent","textColor":"base","text":<?php echo wp_json_encode(__('Subscribe', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
<!-- /wp:one-202x/icon-button -->
<!-- wp:one-202x/icon-button {"url":<?php echo wp_json_encode(home_url('/contact-us/'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"className":"is-style-outline a2e-button","showIcon":false,"iconPosition":"right","textColor":"accent","borderColor":"accent","style":{"color":{"background":"transparent"}},"text":<?php echo wp_json_encode(__('Contact us', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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

<!-- wp:media-text {"align":"full","mediaType":"image","mediaPosition":"right","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-base-color has-contrast-background-color has-text-color has-background" style="grid-template-columns:auto 58%"><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Lorem ipsum dolor', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Ahead of the need, ahead of our competitors', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We have developed three innovative training programmes. These include a course aimed at dental care professionals, management of medical emergencies in deprived healthcare environments and dealing with medical emergencies in Phase 1 clinical research units.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('The development of our MEMaP (Medical Emergencies; Management and Preparedness) course for the deprived healthcare environments has been both challenging but also incredibly rewarding and is utterly unique in this field.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"className":"a2e-image-features__information","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
            <div class="wp-block-group a2e-image-features__information has-contrast-color has-base-background-color has-text-color has-background">
                <!-- wp:icon {"icon":"one-202x-solid/information","textColor":"contrast"} /-->
                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size"><?php esc_html_e('All courses have accompanying pre-course materials and have a sound balance between didactic teaching and practical hands-on. These training programmes have been developed through participation of those actually practicing in these areas and we are always growing and developing our programmes.', 'one-base-theme'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaPosition":"right","mediaWidth":20,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features a2e-service-page__training","backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features a2e-service-page__training has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:auto 20%"><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Training team', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php echo wp_kses_post(__('Real people<br>Real experience<br>Real situations', 'one-base-theme')); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We are unique in using trainers who are also instructors in nationally recognised resuscitation training programmes.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('Our unbreakable commitment to this team design helps to ensure that those delivering our training can relate the principles to real life settings and scenarios – meaning they are able to adapt training in the moment to the needs and experiences of the participants – without sugar coating, dumbing down or lowering our standards.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('<strong>The majority of our training courses have a certification lasting 12 months.</strong>', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
<!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
<div class="wp-block-group a2e-button-group">
<!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","backgroundColor":"accent","textColor":"base","text":<?php echo wp_json_encode(__('Meet the training team', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
<!-- /wp:one-202x/icon-button -->
<!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","showIcon":false,"iconPosition":"right","textColor":"accent","borderColor":"accent","style":{"color":{"background":"transparent"}},"text":<?php echo wp_json_encode(__('Discover Courses', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
    <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
<!-- /wp:one-202x/icon-button -->
</div>
<!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure></div>
<!-- /wp:media-text -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
    <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('How we deliver', 'one-base-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
    <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Tailored training programmes', 'one-base-theme'); ?></h2>
    <!-- /wp:heading -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"one-202x-pattern-cont011_three-columns a2e-columns--icons","backgroundColor":"base","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-cont011_three-columns a2e-columns--icons has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php foreach ($delivery as [$title, $description]) : ?>
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->

            <!-- wp:heading {"level":3,"fontSize":"body"} -->
            <h3 class="wp-block-heading has-body-font-size"><?php echo esc_html($title); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php echo esc_html($description); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":58,"isStackedOnMobile":true,"verticalAlignment":"center","className":"one-202x-pattern-cont010_image-features","backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center one-202x-pattern-cont010_image-features has-contrast-color has-base-background-color has-text-color has-background" style="grid-template-columns:58% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/placeholders/a2e-square.png')); ?>" alt=""/></figure><div class="wp-block-media-text__content">
    <!-- wp:group {"className":"a2e-image-features__content","layout":{"type":"default"}} -->
    <div class="wp-block-group a2e-image-features__content">
        <!-- wp:group {"className":"a2e-image-features__heading","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__heading">
            <!-- wp:paragraph {"className":"is-style-eyebrow"} -->
            <p class="is-style-eyebrow"><?php esc_html_e('Our Consultancy', 'one-base-theme'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"h-2"} -->
            <h2 class="wp-block-heading has-h-2-font-size"><?php esc_html_e('Expert support beyond clinical training', 'one-base-theme'); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"a2e-image-features__details","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-image-features__details">
            <!-- wp:group {"className":"a2e-service-page__copy","layout":{"type":"default"},"style":{"spacing":{"blockGap":"8px"}}} -->
            <div class="wp-block-group a2e-service-page__copy">
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We have a number of services outside of our courses that support both individuals and organisation. These include policy development, clinical simulation exercises and risk assessments.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><?php echo wp_kses_post(__('We are always looking for new ways to better support and equip our clients so please get in touch if you have a bespoke need.', 'one-base-theme')); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
<!-- wp:group {"className":"a2e-button-group","layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
<div class="wp-block-group a2e-button-group">
<!-- wp:one-202x/icon-button {"className":"a2e-button","showIcon":false,"iconPosition":"right","backgroundColor":"accent","textColor":"base","text":<?php echo wp_json_encode(__('Talk to Our Consultancy Team', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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

<!-- wp:group {"align":"full","className":"one-202x-pattern-ctas004_centred-panel","backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('For B2B & procurement teams', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
        <h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php esc_html_e('Looking for sector-specific solutions?', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
        <p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php esc_html_e('Explore our Who We Help sector pages or book a corporate consultation with our clinical leads.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
            <!-- wp:one-202x/icon-button {"backgroundColor":"base","textColor":"contrast","className":"a2e-button","showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Book a Consultation', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
                <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
            <!-- /wp:one-202x/icon-button -->

            <!-- wp:one-202x/icon-button {"className":"is-style-outline a2e-button","textColor":"base","borderColor":"base","style":{"color":{"background":"transparent"}},"showIcon":false,"iconPosition":"right","text":<?php echo wp_json_encode(__('Who We Help', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>} -->
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
