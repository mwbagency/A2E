<?php

defined('ABSPATH') || exit;

echo (new \One202x\Theme\FaqsBlock())->render_faqs($attributes); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- The presenter escapes its output.
