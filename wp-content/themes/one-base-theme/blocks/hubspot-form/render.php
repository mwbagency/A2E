<?php

defined('ABSPATH') || exit;

$portal_id = $attributes['portalId'] ?? '';
$form_id = $attributes['formId'] ?? '';
$region = $attributes['region'] ?? 'na1';
$locale = $attributes['locale'] ?? '';

if (!preg_match('/^\d{1,20}$/D', $portal_id)
    || !preg_match('/^[a-f\d]{8}(?:-[a-f\d]{4}){3}-[a-f\d]{12}$/iD', $form_id)
    || !preg_match('/^[a-z]{2}\d{1,2}$/D', $region)
) {
    return;
}

// Do not contact a third party from server-side editor previews.
if (wp_is_serving_rest_request()) {
    return;
}

$legacy = ($attributes['embedType'] ?? 'current') === 'legacy';
$host = $region === 'na1' ? 'js.hsforms.net' : 'js-' . $region . '.hsforms.net';
$handle = 'one-202x-hubspot-' . $region . '-' . ($legacy ? 'legacy' : $portal_id);
$script_url = 'https://' . $host . '/forms/embed/' . ($legacy ? 'v2' : $portal_id) . '.js';

// HubSpot must serve its own loader; WordPress deduplicates it per account/region.
wp_enqueue_script($handle, $script_url, array(), null, array('in_footer' => true, 'strategy' => 'defer'));
$target_id = wp_unique_id('one-hubspot-');

if ($legacy) {
    $settings = array('portalId' => $portal_id, 'formId' => $form_id, 'region' => $region, 'target' => '#' . $target_id);
    if ($locale !== '' && preg_match('/^[a-z]{2,3}(?:[-_][a-z\d]{2,8})*$/iD', $locale)) {
        $settings['locale'] = $locale;
    }
    // The inline initializer makes Core keep this dependency synchronous in the footer.
    wp_add_inline_script($handle, 'if(window.hbspt){window.hbspt.forms.create(' . wp_json_encode($settings, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) . ');}', 'after');
}
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <?php if ($legacy) : ?>
        <div id="<?php echo esc_attr($target_id); ?>"></div>
    <?php else : ?>
        <div class="hs-form-frame" data-region="<?php echo esc_attr($region); ?>" data-form-id="<?php echo esc_attr($form_id); ?>" data-portal-id="<?php echo esc_attr($portal_id); ?>"></div>
    <?php endif; ?>
    <noscript><p><?php esc_html_e('Please enable JavaScript to use this form.', 'one-base-theme'); ?></p></noscript>
</div>
