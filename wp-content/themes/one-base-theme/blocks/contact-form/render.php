<?php

defined('ABSPATH') || exit;

if (!WP_Block_Type_Registry::get_instance()->is_registered('gravityforms/form')) {
    return;
}
// Older empty wrappers use the default contact form.
if (empty($block->parsed_block['innerBlocks'])) {
    $content = do_blocks('<!-- wp:gravityforms/form {"formId":"1","title":false,"description":false} /-->');
}
if (trim($content) === '') {
    return;
}
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Rendered native plugin block. ?>
</div>
