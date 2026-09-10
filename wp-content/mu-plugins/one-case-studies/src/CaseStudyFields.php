<?php

declare(strict_types=1);

namespace One202x\CaseStudies;

use One202x\Platform\Acf\FieldGroup;
use One202x\Platform\Acf\Location;

final class CaseStudyFields extends FieldGroup
{
    public function id(): string
    {
        return 'case_study_details';
    }

    public function title(): string
    {
        return __('Case study details', 'one-case-studies');
    }

    public function fields(): array
    {
        return [
            [
                'id' => 'client_name',
                'label' => __('Client Name', 'one-case-studies'),
                'type' => 'text',
                'required' => true,
                'allow_in_bindings' => true,
            ],
            [
                'id' => 'project_url',
                'label' => __('Project Url', 'one-case-studies'),
                'type' => 'url',
            ],
            [
                'id' => 'summary',
                'label' => __('Summary', 'one-case-studies'),
                'type' => 'textarea',
                'rows' => 5,
                'new_lines' => 'wpautop',
            ],
        ];
    }

    public function location(): array
    {
        return Location::postTypes(CaseStudyPostType::POST_TYPE);
    }
}
