<?php
/**
 * Title: Call to action — centred panel
 * Slug: one-202x/ctas004_centred-panel
 * Categories: a2e
 * Description: An inset teal panel with a centred heading, supporting text and two editable buttons.
 * Keywords: call to action, centred, panel, buttons
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

get_template_part('pattern-layouts/centred-panel', null, [
    'root_attributes' => ['align' => 'full', 'className' => 'one-202x-pattern-ctas004_centred-panel', 'backgroundColor' => 'base', 'layout' => ['type' => 'default']],
    'root_class' => 'wp-block-group alignfull one-202x-pattern-ctas004_centred-panel has-base-background-color has-background',
    'eyebrow' => (esc_html__('Lorem ipsum dolor', 'one-base-theme')),
    'heading' => (esc_html__('The headline goes here', 'one-base-theme')),
    'description' => (esc_html__('I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing', 'one-base-theme')),
    'buttons' => [['backgroundColor' => 'base', 'textColor' => 'contrast', 'className' => 'a2e-button', 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Primary button', 'one-base-theme')], ['className' => 'is-style-outline a2e-button', 'textColor' => 'base', 'borderColor' => 'base', 'style' => ['color' => ['background' => 'transparent']], 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Secondary button', 'one-base-theme')]],
]);
