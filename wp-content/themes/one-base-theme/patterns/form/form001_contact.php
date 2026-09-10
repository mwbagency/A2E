<?php
/**
 * Title: Form — contact
 * Slug: one-202x/form001_contact
 * Categories: one-202x, one-202x-form
 * Description: Contact introduction and a Gravity Forms selector. Requires the Gravity Forms plugin.
 * Keywords: form001_contact, contact, gravity forms
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-form001_contact","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-form001_contact">
<!-- wp:one-202x/section-intro {"title":<?php echo wp_json_encode(__('Get in touch', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Tell us how we can help.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showSubtitle":false,"showButton":false} /-->
<!-- wp:one-202x/contact-form -->
<!-- wp:gravityforms/form {"formId":"1","title":false,"description":false} /-->
<!-- /wp:one-202x/contact-form -->
</section>
<!-- /wp:group -->
