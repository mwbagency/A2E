<?php

declare(strict_types=1);

namespace One202x\CaseStudies;

final class Plugin
{
    public function register_hooks(): void
    {
        (new CaseStudyPostType())->register_hooks();
        (new CaseStudyTaxonomy())->register_hooks();
        (new CaseStudyFields())->register_hooks();
        (new CaseStudyValues())->register_hooks();
    }
}
