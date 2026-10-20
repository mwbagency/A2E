<?php
/**
 * Title: Simple page — A2E
 * Slug: one-202x/page009_simple
 * Categories: a2e
 * Description: A centred page title and a narrow, editable text column for policies and information pages.
 * Post Types: page
 * Inserter: no
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
?>
<!-- wp:group {"align":"full","className":"one-202x-pattern-page009_simple","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page009_simple">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro">
        <!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
        <p class="has-text-align-center is-style-eyebrow"><?php esc_html_e('Information', 'one-base-theme'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:post-title {"textAlign":"center","level":1,"className":"a2e-centred-intro__title","fontSize":"h-2"} /-->
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
<!-- wp:group {"align":"full","className":"one-202x-pattern-page009_simple","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull one-202x-pattern-page009_simple">
    <!-- wp:group {"className":"a2e-simple-page__body","layout":{"type":"constrained"}} -->
    <div class="wp-block-group a2e-simple-page__body">
        <!-- wp:post-content {"className":"a2e-simple-page__content","layout":{"type":"constrained"}} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
<?php
})();
?>
