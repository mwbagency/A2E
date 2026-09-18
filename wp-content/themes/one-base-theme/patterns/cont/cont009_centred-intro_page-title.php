<?php
/**
 * Title: Introduction — information page title
 * Slug: one-202x/cont009_centred-intro_page-title
 * Categories: a2e
 * Description: Introduction — information page title. Editable section variant used by the A2E page layouts.
 * Inserter: no
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
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
