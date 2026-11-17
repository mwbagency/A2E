<?php
/**
 * Title: Simple page — A2E
 * Slug: one-202x/page013_simple-starter
 * Categories: a2e
 * Post Types: page
 * Block Types: core/post-content
 * Description: Start a new page with an editable page title and independent lorem ipsum content. Use with the default Page — title in content template.
 * Keywords: simple, privacy, cookies, policy, information, full page
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
        <!-- wp:group {"className":"a2e-simple-page__content","layout":{"type":"constrained"}} -->
        <div class="wp-block-group a2e-simple-page__content">
            <?php get_template_part('pattern-layouts/simple-page-content'); ?>
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
<?php
})();
?>
