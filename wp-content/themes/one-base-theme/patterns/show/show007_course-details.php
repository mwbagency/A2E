<?php
/**
 * Title: Course details — accordion
 * Slug: one-202x/show007_course-details
 * Categories: one-202x, one-202x-show
 * Description: Editable framework specifications using native Details blocks.
 * Keywords: course, accordion, curriculum, specifications
 * Viewport Width: 856
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"className":"one-202x-pattern-show007_course-details","layout":{"type":"default"}} -->
<div class="wp-block-group one-202x-pattern-show007_course-details">
    <!-- wp:group {"className":"one-202x-course-details__heading","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-course-details__heading">
        <!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->
        <!-- wp:heading {"level":3} -->
        <h3 class="wp-block-heading"><?php esc_html_e('Framework Specifications', 'one-base-theme'); ?></h3>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->
    <?php foreach ([__('Full Curriculum', 'one-base-theme'), __('Certification Validity', 'one-base-theme'), __('Prerequisites & Duration', 'one-base-theme'), __('Assessment Protocols', 'one-base-theme'), __('Clinical Governance & Regulatory Landscape', 'one-base-theme')] as $index => $summary) : ?>
    <!-- wp:details <?php echo wp_json_encode(['showContent' => $index === 0]); ?> -->
    <details class="wp-block-details"<?php echo $index === 0 ? ' open' : ''; ?>><summary><?php echo esc_html($summary); ?></summary>
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Add the course information here.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
    </details>
    <!-- /wp:details -->
    <?php endforeach; ?>
</div>
<!-- /wp:group -->
