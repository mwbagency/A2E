<?php

defined('ABSPATH') || exit;

if (!class_exists(\One202x\Platform\Content\SiteContacts::class)) {
    return;
}
$contacts = (new \One202x\Platform\Content\SiteContacts())->all();
$display = $attributes['display'] ?? 'all';
$kinds = $display === 'all' ? ['locations', 'phones', 'emails'] : [$display];
if ($display === 'primary-phone') {
    $phone = $contacts['phones'][0] ?? null;
    if (!$phone) { return; }
    $phone_attributes = wp_json_encode([
        'text' => $phone['number'], 'url' => 'tel:' . $phone['dial'],
        'className' => trim(($attributes['className'] ?? '') . ' is-style-icon-link'),
    ], JSON_HEX_TAG | JSON_HEX_AMP);
    echo '<div ' . get_block_wrapper_attributes() . '>';
    echo do_blocks('<!-- wp:one-202x/icon-button ' . $phone_attributes . ' --><!-- wp:icon {"icon":"one-202x/phone"} /--><!-- /wp:one-202x/icon-button -->');
    echo '</div>';
    return;
}
$kinds = array_values(array_filter($kinds, static fn(string $kind): bool => !empty($contacts[$kind])));
if (!$kinds) { return; }
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
    <?php foreach ($kinds as $kind) : ?>
        <ul role="list" class="one-202x-contact-details__<?php echo esc_attr($kind); ?>">
            <?php foreach ($contacts[$kind] as $row) : ?>
                <li>
                    <?php if ($row['label'] !== '') : ?><strong><?php echo esc_html($row['label']); ?></strong><?php endif; ?>
                    <?php if ($kind === 'locations') : ?>
                        <address><?php echo nl2br(esc_html($row['address'])); ?></address>
                    <?php elseif ($kind === 'phones') : ?>
                        <a href="<?php echo esc_attr('tel:' . $row['dial']); ?>"><bdi dir="ltr"><?php echo esc_html($row['number']); ?></bdi></a>
                    <?php else : ?>
                        <a href="<?php echo esc_attr('mailto:' . $row['email']); ?>"><bdi dir="ltr"><?php echo esc_html($row['email']); ?></bdi></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>
