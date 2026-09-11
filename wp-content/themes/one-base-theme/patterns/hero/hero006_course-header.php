<?php
/**
 * Title: Course hero — image and details
 * Slug: one-202x/hero006_course-header
 * Categories: a2e
 * Description: The current course’s featured image, category, title, validity, duration and difficulty.
 * Keywords: course, programme, hero, header, image
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":60,"customOverlayColor":"#111111","isUserOverlayColor":true,"contentPosition":"bottom left","align":"full","className":"one-202x-pattern-hero006_course-header","layout":{"type":"default"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-left one-202x-pattern-hero006_course-header"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim" style="background-color:#111111"></span><div class="wp-block-cover__inner-container">
    <!-- wp:post-terms {"term":"course_category","className":"a2e-course-hero__category","fontSize":"small"} /-->
    <!-- wp:post-title {"level":1,"className":"a2e-course-hero__title","fontSize":"h-2"} /-->

    <!-- wp:group {"className":"a2e-course-hero__facts","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}} -->
    <div class="wp-block-group a2e-course-hero__facts">
        <?php foreach ([
            'certification_validity' => __('Start Date', 'one-base-theme'),
            'duration' => __('Duration', 'one-base-theme'),
            'difficulty' => __('Difficulty', 'one-base-theme'),
        ] as $field => $label) : ?>
        <!-- wp:group {"className":"a2e-course-hero__fact","layout":{"type":"default"}} -->
        <div class="wp-block-group a2e-course-hero__fact">
            <!-- wp:paragraph {"className":"a2e-course-hero__label","textColor":"yellow","fontSize":"small"} -->
            <p class="a2e-course-hero__label has-yellow-color has-text-color has-small-font-size"><?php echo esc_html($label); ?></p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"acf/field","args":{"key":"field_one202x_course_details_<?php echo esc_attr($field); ?>"}}}},"className":"a2e-course-hero__value","fontSize":"body"} -->
            <p class="a2e-course-hero__value has-body-font-size"></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        <?php endforeach; ?>
    </div>
    <!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
