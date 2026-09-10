<?php

defined('ABSPATH') || exit;
if (!class_exists(\One202x\TeamMembers\TeamMemberValues::class)) { return []; }
$values = (new \One202x\TeamMembers\TeamMemberValues())->all($post_id, [], ['source' => 'post_details']);
$phone = (string) ($values['telephone'] ?? '');
$email = sanitize_email((string) ($values['email'] ?? ''));
$linkedin = esc_url_raw((string) ($values['linkedin_url'] ?? ''));
return [
    ['label' => __('Role', 'one-base-theme'), 'value' => $values['job_title'] ?? ''],
    ['label' => __('Department', 'one-base-theme'), 'value' => $values['department'] ?? ''],
    ['label' => __('Email', 'one-base-theme'), 'value' => is_email($email) ? $email : '', 'url' => 'mailto:' . $email],
    ['label' => __('Telephone', 'one-base-theme'), 'value' => $phone, 'url' => 'tel:' . preg_replace('/[^0-9+]/', '', $phone)],
    ['label' => __('LinkedIn', 'one-base-theme'), 'value' => $linkedin !== '' ? __('View profile', 'one-base-theme') : '', 'url' => $linkedin],
];
