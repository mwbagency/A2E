<?php
/**
 * Title: Course framework specifications — starter
 * Slug: one-202x/show007_course-details_course
 * Categories: a2e
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
        <!-- wp:heading {"level":2} -->
        <h2 class="wp-block-heading"><?php esc_html_e('Framework Specifications', 'one-base-theme'); ?></h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->
    <?php foreach ([__('Full Curriculum', 'one-base-theme'), __('Certification Validity', 'one-base-theme'), __('Prerequisites & Duration', 'one-base-theme'), __('Assessment Protocols', 'one-base-theme'), __('Clinical Governance & Regulatory Landscape', 'one-base-theme')] as $index => $summary) : ?>
    <!-- wp:details <?php echo wp_json_encode(['showContent' => $index === 0]); ?> -->
    <details class="wp-block-details"<?php echo $index === 0 ? ' open' : ''; ?>><summary><?php echo esc_html($summary); ?></summary>
<?php if ($index === 0) : ?>
<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item --><li>Chain of survival</li><!-- /wp:list-item --><!-- wp:list-item --><li>Recognising and responding to clinical deterioration</li><!-- /wp:list-item --><!-- wp:list-item --><li>Recognition of cardiac arrest</li><!-- /wp:list-item --><!-- wp:list-item --><li>Summoning emergency assistance</li><!-- /wp:list-item --><!-- wp:list-item --><li>Artificial ventilation</li><!-- /wp:list-item --><!-- wp:list-item --><li>Starting and maintaining effective chest compressions</li><!-- /wp:list-item --><!-- wp:list-item --><li>Recognition and management of unconsciousness</li><!-- /wp:list-item --><!-- wp:list-item --><li>Use of an Automated External Defibrillator (AED) in paediatrics</li><!-- /wp:list-item --><!-- wp:list-item --><li>Recognition and management of infant and child choking</li><!-- /wp:list-item --><!-- wp:list-item --><li>Roles and responsibilities (including legislation) in an emergency</li><!-- /wp:list-item --><!-- wp:list-item --><li>Do Not Attempt Cardiopulmonary Resuscitation decisions.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->
<?php else : ?>
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Add the course information here.', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->
<?php endif; ?>
    </details>
    <!-- /wp:details -->
    <?php endforeach; ?>
</div>
<!-- /wp:group -->
