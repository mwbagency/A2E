<?php
/**
 * Title: FAQs page — A2E
 * Slug: one-202x/page008_faqs
 * Categories: a2e
 * Description: A searchable FAQ hub with three category groups and a contact panel. Manage answers and categories under FAQs.
 * Post Types: page
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>
<!-- wp:pattern {"slug":"one-202x/show012_faqs_searchable-hub"} /-->

<?php
// Page content; edit the inserted blocks independently.
(static function (): void {
get_template_part('pattern-layouts/centred-panel', null, [
    'root_attributes' => ['align' => 'full', 'className' => 'one-202x-pattern-ctas004_centred-panel', 'backgroundColor' => 'base', 'layout' => ['type' => 'default']],
    'root_class' => 'wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background',
    'eyebrow' => (esc_html__('Need more support?', 'one-base-theme')),
    'heading' => (esc_html__('Still have questions?', 'one-base-theme')),
    'description' => (esc_html__('Speak to our team about training, room hire, or a tailored programme for your organisation.', 'one-base-theme')),
    'buttons' => [['url' => home_url('/contact-us/'), 'backgroundColor' => 'base', 'textColor' => 'contrast', 'className' => 'a2e-button', 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Get in touch', 'one-base-theme')]],
]);
})();
?>
