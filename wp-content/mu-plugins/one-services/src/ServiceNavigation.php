<?php

declare(strict_types=1);

namespace One202x\Services;

final class ServiceNavigation
{
    /** Service categories own the hierarchy; published service records are its leaves. */
    public function tree(): array
    {
        $terms = get_terms(['taxonomy' => ServiceTaxonomy::TAXONOMY, 'hide_empty' => false]);
        if (is_wp_error($terms) || !$terms) {
            return [];
        }

        // usort(
        //     $terms,
        //     static fn($a, $b) => ((int) get_term_meta($a->term_id, 'a2e_menu_order', true) <=> (int) get_term_meta($b->term_id, 'a2e_menu_order', true))
        //         ?: strnatcasecmp($a->name, $b->name)
        // );

        $children = [];
        $by_id = [];
        $services = [];

        foreach ($terms as $term) {
            $children[$term->parent][] = $term;
            $by_id[$term->term_id] = $term;
        }

        $posts = get_posts([
            'post_type' => ServicePostType::POST_TYPE,
            'post_status' => 'publish',
            'has_password' => false,
            'posts_per_page' => -1,
            'orderby' => ['menu_order' => 'ASC', 'title' => 'ASC'],
            'suppress_filters' => false,
        ]);

        foreach ($posts as $post) {
            $assigned = get_the_terms($post, ServiceTaxonomy::TAXONOMY);

            if (!$assigned || is_wp_error($assigned)) {
                continue;
            }

            $ancestors = [];

            foreach ($assigned as $term) {
                $parent = $term->parent;

                while ($parent && isset($by_id[$parent]) && !isset($ancestors[$parent])) {
                    $ancestors[$parent] = true;
                    $parent = $by_id[$parent]->parent;
                }
            }

            foreach ($assigned as $term) {
                if (!isset($ancestors[$term->term_id])) {
                    $services[$term->term_id][] = [
                        'id' => $post->ID,
                        'name' => get_the_title($post),
                        'url' => get_permalink($post),
                        'type' => 'service',
                        'children' => [],
                    ];
                }
            }
        }

        $branch = static function (int $parent) use (&$branch, $children, $services): array {
            $nodes = [];

            foreach ($children[$parent] ?? [] as $term) {
                $url = get_term_link($term);

                if (is_wp_error($url)) {
                    continue;
                }

                $nodes[] = [
                    'id' => $term->term_id,
                    'name' => $term->name,
                    'url' => $url,
                    'type' => 'service_category',
                    'children' => $branch($term->term_id),
                ];
            }

            return array_merge($nodes, $services[$parent] ?? []);
        };

        return $branch(0);
    }
}
