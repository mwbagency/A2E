<?php

declare(strict_types=1);

namespace One202x\Faqs;

final class Plugin
{
    public function register_hooks(): void
    {
        (new FaqPostType())->register_hooks();
        (new FaqTaxonomy())->register_hooks();
        (new FaqFields())->register_hooks();
    }
}
