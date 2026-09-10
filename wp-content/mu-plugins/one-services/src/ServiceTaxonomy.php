<?php

declare(strict_types=1);

namespace One202x\Services;

final class ServiceTaxonomy
{
    public const TAXONOMY = 'service_category';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
        add_action(self::TAXONOMY . '_add_form_fields', [$this, 'add_order_field']);
        add_action(self::TAXONOMY . '_edit_form_fields', [$this, 'edit_order_field']);
        add_action('created_' . self::TAXONOMY, [$this, 'save_order']);
        add_action('edited_' . self::TAXONOMY, [$this, 'save_order']);
    }

    public function register(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            [ServicePostType::POST_TYPE],
            [
                'labels' => [
                    'name' => __('Service categories', 'one-services'),
                    'singular_name' => __('Service category', 'one-services'),
                ],
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'rewrite' => [
                    'slug' => 'service-category',
                    'with_front' => false,
                    'hierarchical' => true,
                ],
            ]
        );
    }

    public function add_order_field(): void
    {
        echo '<div class="form-field"><label for="a2e-menu-order">' . esc_html__('Menu order', 'one-services') . '</label>';
        $this->order_input(0);
        echo '</div>';
    }

    public function edit_order_field(\WP_Term $term): void
    {
        echo '<tr class="form-field"><th><label for="a2e-menu-order">' . esc_html__('Menu order', 'one-services') . '</label></th><td>';
        $this->order_input((int) get_term_meta($term->term_id, 'a2e_menu_order', true));
        echo '</td></tr>';
    }

    private function order_input(int $order): void
    {
        wp_nonce_field('a2e_service_order', 'a2e_service_order_nonce');
        echo '<input type="number" id="a2e-menu-order" name="a2e_menu_order" value="' . esc_attr((string) $order) . '" min="0" step="1">';
        echo '<p class="description">' . esc_html__('Lower numbers appear first. Use a parent category for each service area and a child category for its training levels.', 'one-services') . '</p>';
    }

    public function save_order(int $term_id): void
    {
        if (!current_user_can('manage_categories') || !isset($_POST['a2e_service_order_nonce'], $_POST['a2e_menu_order'])
            || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['a2e_service_order_nonce'])), 'a2e_service_order')) {
            return;
        }

        update_term_meta($term_id, 'a2e_menu_order', absint($_POST['a2e_menu_order']));
    }
}
