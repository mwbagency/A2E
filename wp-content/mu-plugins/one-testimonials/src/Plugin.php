<?php

declare(strict_types=1);

namespace One202x\Testimonials;

final class Plugin
{
    public function register_hooks(): void
    {
        (new TestimonialPostType())->register_hooks();
        (new TestimonialTaxonomy())->register_hooks();
        (new TestimonialFields())->register_hooks();
    }
}
