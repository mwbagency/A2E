<?php
/**
 * Title: Centred heading and buttons
 * Slug: one-202x/cont009_centred-intro
 * Categories: a2e
 * Description: A centred overline, heading, supporting text and two editable buttons.
 * Keywords: heading, introduction, centred, buttons, text
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;

get_template_part('pattern-layouts/centred-intro', null, [
    'root_attributes' => ['align' => 'full', 'className' => 'one-202x-pattern-cont009_centred-intro', 'backgroundColor' => 'base', 'textColor' => 'contrast', 'layout' => ['type' => 'default']],
    'root_class' => 'wp-block-group alignfull one-202x-pattern-cont009_centred-intro has-contrast-color has-base-background-color has-text-color has-background',
    'eyebrow' => (esc_html__('Lorem ipsum dolor', 'one-base-theme')),
    'heading' => (esc_html__('The headline goes here', 'one-base-theme')),
    'description' => (esc_html__('I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing', 'one-base-theme')),
    'buttons' => [['className' => 'a2e-button', 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Primary button', 'one-base-theme')], ['className' => 'is-style-outline a2e-button', 'backgroundColor' => 'base', 'textColor' => 'contrast', 'borderColor' => 'contrast', 'showIcon' => false, 'iconPosition' => 'right', 'text' => __('Secondary button', 'one-base-theme')]],
]);
