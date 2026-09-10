<?php
/**
 * @var array{attributes: string, question: string, answer: string, post_id: int} $args
 */

defined('ABSPATH') || exit;
?>
<details <?php echo $args['attributes']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Built with get_block_wrapper_attributes or a fixed class. ?>>
    <summary><?php echo esc_html($args['question']); ?></summary>
    <div class="one-faqs-faqs__answer"><?php echo wp_kses_post($args['answer']); ?></div>
</details>
