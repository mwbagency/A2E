<?php
/** The call-to-action panel uses the same editable content as an introduction. */
defined('ABSPATH') || exit;
?>
<!-- wp:group <?php echo wp_json_encode($args['root_attributes']); ?> -->
<div class="<?php echo esc_attr($args['root_class']); ?>">
    <!-- wp:group {"className":"one-202x-pattern-cont009_centred-intro","backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-pattern-cont009_centred-intro has-base-color has-contrast-background-color has-text-color has-background">
        <?php get_template_part('pattern-layouts/centred-content', null, $args); ?>
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
