<?php

declare(strict_types=1);

namespace One202x\Services;

use WP_Block_List;
use WP_HTML_Tag_Processor;

defined('ABSPATH') || exit;

final class ServicesMenu
{
    private ?array $tree = null;

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register_style']);
        add_filter('block_core_navigation_render_inner_blocks', [$this, 'populate']);
        add_filter('render_block_context', [$this, 'category_context'], 10, 2);
        add_filter('render_block_core/navigation', [$this, 'category_interactivity']);
    }

    public function register_style(): void
    {
        register_block_style('core/navigation-link', [
            'name' => 'a2e-services-menu',
            'label' => __('A2E Services dropdown', 'one-services'),
        ]);
    }

    public function populate(WP_Block_List $blocks): WP_Block_List
    {
        foreach ($blocks as $index => $block) {
            if (
                $block->name !== 'core/navigation-link'
                || !in_array('is-style-a2e-services-menu', explode(' ', $block->attributes['className'] ?? ''), true)
            ) {
                continue;
            }

            $this->tree ??= (new ServiceNavigation())->tree();

            if (!$this->tree) {
                continue;
            }

            $children = [
                $this->item(
                    [
                        'label' => __('Our Services', 'one-services'),
                        'className' => 'a2e-services-menu__heading'
                    ]
                )
            ];

            foreach ($this->tree as $node) {
                $children[] = $this->branch($node, 0);
            }


            $children[] = $this->item([
                'label' => __('See all services', 'one-services'),
                'url' => $block->attributes['url'] ?? get_post_type_archive_link('service'),
                'className' => 'a2e-services-menu__all',
            ]);

            $attributes = $block->attributes;
            $attributes['className'] .= ' a2e-services-menu';

            // Assign parsed data back into the same list so Core retains its Navigation context.
            $blocks[$index] = $this->item($attributes, $children);
        }

        return $blocks;
    }

    private function branch(array $node, int $depth): array
    {
        return $this->item([
            'label' => $node['name'],
            'url' => $node['url'],
            'id' => $node['id'],
            'type' => $node['type'],
            'kind' => $node['type'] === 'service' ? 'post-type' : 'taxonomy',
            'className' => 'a2e-services-menu__' . ($depth === 0 ? 'area' : ($node['type'] === 'service' ? 'course' : 'level')),
        ], array_map(fn($child) => $this->branch($child, $depth + 1), $node['children']));
    }

    private function item(array $attributes, array $children = []): array
    {
        return [
            'blockName' => $children ? 'core/navigation-submenu' : 'core/navigation-link',
            'attrs' => $attributes,
            'innerBlocks' => $children,
            'innerHTML' => '',
            'innerContent' => array_fill(0, count($children), null),
        ];
    }

    public function category_context(array $context, array $block): array
    {
        if (
            $block['blockName'] === 'core/navigation-submenu'
            && preg_match('/\ba2e-services-menu__(area|level)\b/', $block['attrs']['className'] ?? '')
        ) {
            // A category remains a real link, with a separate button to explore its children.
            $context['submenuVisibility'] = 'hover';
            $context['openSubmenusOnClick'] = null;
            $context['showSubmenuIcon'] = true;
        }

        return $context;
    }

    public function category_interactivity(string $content): string
    {
        $tags = new WP_HTML_Tag_Processor($content);
        while ($tags->next_tag(['tag_name' => 'LI', 'class_name' => 'has-child'])) {
            if ($tags->has_class('a2e-services-menu__area') || $tags->has_class('a2e-services-menu__level')) {
                $tags->set_attribute('data-wp-on--pointerenter', 'actions.openMenuOnHover');
                $tags->set_attribute('data-wp-on--pointerleave', 'actions.closeMenuOnHover');
            }
        }

        return $tags->get_updated_html();
    }
}
