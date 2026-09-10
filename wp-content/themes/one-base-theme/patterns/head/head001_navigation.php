<?php
/**
 * Title: Head
 * Description: A to E logo, utility links, primary navigation, search and contact link.
 * Slug: one-202x/head001_navigation
 * Inserter: no
 */

use One202x\Theme\Navigation;

defined('ABSPATH') || exit;

$primary = Navigation::reference('primary');
$utility = Navigation::reference('utility');
?>
<!-- wp:group {"align":"full","className":"one-202x-head","backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull one-202x-head has-contrast-color has-base-background-color has-text-color has-background">
    <!-- wp:group {"align":"wide","className":"one-202x-head__inner","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide one-202x-head__inner">
        <!-- wp:navigation <?php echo wp_json_encode($utility + [
            'ariaLabel' => __('Utility navigation', 'one-base-theme'),
            'overlayMenu' => 'never',
            'className' => 'one-202x-head__utility-navigation',
            'layout' => ['type' => 'flex', 'justifyContent' => 'right', 'flexWrap' => 'nowrap'],
        ]); ?> -->
            <?php if (!$utility) { echo Navigation::default_items('utility'); } ?>
        <!-- /wp:navigation -->

        <!-- wp:group {"className":"one-202x-head__bar","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group one-202x-head__bar">
            <!-- wp:site-logo {"width":152,"shouldSyncIcon":false,"className":"one-202x-head__logo"} /-->

            <!-- wp:navigation <?php echo wp_json_encode($primary + [
                'ariaLabel' => __('Primary navigation', 'one-base-theme'),
                'overlayMenu' => 'mobile',
                'overlay' => 'head-navigation-overlay',
                'submenuVisibility' => 'click',
                'maxNestingLevel' => 3,
                'className' => 'one-202x-head__navigation',
                'layout' => ['type' => 'flex', 'justifyContent' => 'right', 'flexWrap' => 'nowrap'],
            ]); ?> -->
                <?php if (!$primary) { echo Navigation::default_items('primary'); } ?>
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
