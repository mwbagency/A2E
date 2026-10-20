<?php
/** Shared source layout for the introduction and preserved page presets. */
defined('ABSPATH') || exit;
?>
<!-- wp:group <?php echo wp_json_encode($args['root_attributes']); ?> -->
<div class="<?php echo esc_attr($args['root_class']); ?>">
    <?php get_template_part('pattern-layouts/centred-content', null, $args); ?>
</div>
<!-- /wp:group -->
