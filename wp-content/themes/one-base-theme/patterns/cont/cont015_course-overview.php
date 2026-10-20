<?php
/**
 * Title: Course overview, booking and specifications
 * Slug: one-202x/cont015_course-overview
 * Categories: a2e
 * Description: Editable course overview, booking placeholder, curriculum, key statistics and a selectable instructor.
 * Viewport Width: 1440
 */
defined('ABSPATH') || exit;
?>
<!-- wp:group {"layout":{"type":"default"},"className":"one-202x-pattern-cont015_course-overview","align":"full"} -->
<div class="wp-block-group alignfull one-202x-pattern-cont015_course-overview">
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__top"} -->
<div class="wp-block-group a2e-course-profile__top">
<!-- wp:group {"layout":{"type":"default"},"className":"one-202x-pattern-show007_course-details a2e-course-profile__overview","anchor":"overview"} -->
<div id="overview" class="wp-block-group one-202x-pattern-show007_course-details a2e-course-profile__overview">
<!-- wp:group {"layout":{"type":"default"},"className":"one-202x-course-details__heading"} -->
<div class="wp-block-group one-202x-course-details__heading">
<!-- wp:icon {"icon":"one-202x/a2e-vision"} /-->
<!-- wp:heading {"level":2,"fontSize":"h-5"} -->
<h2 class="wp-block-heading has-h-5-font-size">Overview</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__overview-copy"} -->
<div class="wp-block-group a2e-course-profile__overview-copy">
<!-- wp:paragraph -->
<p>Focused on the specific needs of infants and children, this course provides clinical and non clinical participants with the knowledge and skills to manage a paediatric emergency and/or cardiac arrest.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Along with theory, hands-on rehearsal – including the use of a defibrillator – will equip participants with the confidence to use their skills to start basic life support. They will also explore the need for empathy at a time of huge stress for all concerned.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><strong>Mapped to Core Skills Training Framework (Level 2).</strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"anchor":"course-booking"} -->
<div id="course-booking" class="wp-block-group">
<!-- wp:one-202x/booking-card {"price":"£55.00"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__main","anchor":"framework-specifications"} -->
<div id="framework-specifications" class="wp-block-group a2e-course-profile__main">
<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
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
<?php
})();
?>
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__main"} -->
<div class="wp-block-group a2e-course-profile__main">
<!-- wp:heading {"level":2,"fontSize":"h-4"} -->
<h2 class="wp-block-heading has-h-4-font-size">From Training to Life-Saving Action</h2>
<!-- /wp:heading -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__stats"} -->
<div class="wp-block-group a2e-course-profile__stats">
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__stat"} -->
<div class="wp-block-group a2e-course-profile__stat">
<!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:heading {"level":3,"fontSize":"body"} -->
<h3 class="wp-block-heading has-body-font-size">2 in 1,000</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Almost 2 in 1,000 people admitted to hospital will have a <strong>cardiac arrest</strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__stat"} -->
<div class="wp-block-group a2e-course-profile__stat">
<!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:heading {"level":3,"fontSize":"body"} -->
<h3 class="wp-block-heading has-body-font-size">1 in 2</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Half of all <strong>out-of-hospital cardiac arrests</strong> are witnessed by a bystander</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__stat"} -->
<div class="wp-block-group a2e-course-profile__stat">
<!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:heading {"level":3,"fontSize":"body"} -->
<h3 class="wp-block-heading has-body-font-size">4×</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Immediate CPR can <strong>quadruple survival of out-of-hospital cardiac arrest</strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__stat"} -->
<div class="wp-block-group a2e-course-profile__stat">
<!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:heading {"level":3,"fontSize":"body"} -->
<h3 class="wp-block-heading has-body-font-size">50–70%</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Defibrillation within 3–5 minutes of collapse can produce <strong>survival rates up to 50–70%</strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__stat"} -->
<div class="wp-block-group a2e-course-profile__stat">
<!-- wp:icon {"icon":"one-202x/a2e-puzzle"} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:heading {"level":3,"fontSize":"body"} -->
<h3 class="wp-block-heading has-body-font-size">10%</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Each minute of delay reduces the probability of <strong>survival to hospital discharge by 10%.</strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__main"} -->
<div class="wp-block-group a2e-course-profile__main">
<!-- wp:query {"namespace": "one-202x/selected-content", "query": {"perPage": 1, "one202xSelection": true, "one202xLatestCount": 1, "postType": "team_member", "order": "desc", "orderBy": "date", "inherit": false}, "layout": {"type": "default"}} -->
<div class="wp-block-query">
<!-- wp:post-template -->
<!-- wp:group {"layout":{"type":"default"},"className":"a2e-course-profile__instructor"} -->
<div class="wp-block-group a2e-course-profile__instructor">
<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Instructor profile</p>
<!-- /wp:paragraph -->
<!-- wp:one-202x/content-card {"headingLevel":2} /-->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Select an instructor once team members have been added.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
