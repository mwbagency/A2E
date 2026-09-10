<?php
/**
 * Title: Head navigation overlay
 * Description: A to E mobile drawer using the shared primary and utility menus.
 * Slug: one-202x/head002_navigation-overlay
 * Inserter: no
 */

use One202x\Theme\Navigation;

defined('ABSPATH') || exit;

$primary = Navigation::reference('primary');
$utility = Navigation::reference('utility');
?>
<!-- wp:group {"className":"one-202x-mobile-nav","backgroundColor":"base","textColor":"contrast","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group one-202x-mobile-nav has-contrast-color has-base-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
    <!-- wp:group {"className":"one-202x-mobile-nav__top","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group one-202x-mobile-nav__top">
        <!-- wp:site-logo {"width":152,"shouldSyncIcon":false,"className":"one-202x-mobile-nav__logo"} /-->
        <!-- wp:navigation-overlay-close {"displayMode":"icon"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:navigation <?php echo wp_json_encode($primary + [
        'ariaLabel' => __('Primary navigation', 'one-base-theme'),
        'overlayMenu' => 'never',
        'submenuVisibility' => 'click',
        'maxNestingLevel' => 3,
        'className' => 'one-202x-mobile-nav__menu',
        'layout' => ['type' => 'flex', 'orientation' => 'vertical', 'justifyContent' => 'left', 'flexWrap' => 'nowrap'],
    ]); ?> -->
        <?php if (!$primary) { echo Navigation::default_items('primary'); } ?>
    <!-- /wp:navigation -->

    <!-- wp:group {"className":"one-202x-mobile-nav__footer","layout":{"type":"default"}} -->
    <div class="wp-block-group one-202x-mobile-nav__footer">
        <!-- wp:navigation <?php echo wp_json_encode($utility + [
            'ariaLabel' => __('Utility navigation', 'one-base-theme'),
            'overlayMenu' => 'never',
            'className' => 'one-202x-mobile-nav__utility-navigation',
            'layout' => ['type' => 'flex', 'orientation' => 'vertical', 'justifyContent' => 'left', 'flexWrap' => 'nowrap'],
        ]); ?> -->
            <?php if (!$utility) { echo Navigation::default_items('utility'); } ?>
        <!-- /wp:navigation -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
