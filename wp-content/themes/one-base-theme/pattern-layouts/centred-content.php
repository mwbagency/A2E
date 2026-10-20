<?php
/** Theme-owned preset values; editors receive ordinary editable core blocks. */
defined('ABSPATH') || exit;
?>
<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow"><?php echo wp_kses_post($args['eyebrow']); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"a2e-centred-intro__title","fontSize":"h-2"} -->
<h2 class="wp-block-heading has-text-align-center a2e-centred-intro__title has-h-2-font-size"><?php echo wp_kses_post($args['heading']); ?></h2>
<!-- /wp:heading -->

<?php if (isset($args['description'])) : ?>
<!-- wp:paragraph {"align":"center","className":"a2e-centred-intro__description","fontSize":"body"} -->
<p class="has-text-align-center a2e-centred-intro__description has-body-font-size"><?php echo wp_kses_post($args['description']); ?></p>
<!-- /wp:paragraph -->
<?php endif; ?>

<?php if (!empty($args['buttons'])) : ?>
<!-- wp:group {"className":"a2e-centred-intro__actions a2e-button-group","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group a2e-centred-intro__actions a2e-button-group">
    <?php foreach ($args['buttons'] as $button) : ?>
    <!-- wp:one-202x/icon-button <?php echo wp_json_encode($button, JSON_HEX_TAG | JSON_HEX_AMP); ?> -->
        <!-- wp:icon {"icon":"core/arrow-right","lock":{"move":true,"remove":true}} /-->
    <!-- /wp:one-202x/icon-button -->
    <?php endforeach; ?>
</div>
<!-- /wp:group -->
<?php endif; ?>
