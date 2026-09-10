<?php

defined('ABSPATH') || exit;
if (!class_exists(\One202x\CaseStudies\CaseStudyValues::class)) { return []; }
$values = (new \One202x\CaseStudies\CaseStudyValues())->all($post_id, [], ['source' => 'post_details']);
$url = esc_url_raw((string) ($values['project_url'] ?? ''));
return [
    ['label' => __('Client', 'one-base-theme'), 'value' => $values['client_name'] ?? ''],
    ['label' => __('Overview', 'one-base-theme'), 'value' => $values['summary'] ?? ''],
    ['label' => __('Project', 'one-base-theme'), 'value' => $url !== '' ? __('Visit project', 'one-base-theme') : '', 'url' => $url],
];
