<?php
/**
 * Title: Form — contact with locations
 * Slug: one-202x/form003_contact-split
 * Categories: one-202x, one-202x-form
 * Description: Shared locations, telephone numbers and email addresses from Site contacts beside a Gravity Form.
 * Keywords: form003_contact-split, contact, gravity forms, locations, telephone, email
 * Viewport Width: 1440
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"one-202x-section one-202x-pattern-form003_contact-split","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide one-202x-section one-202x-pattern-form003_contact-split">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl","top":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"lock":{"move":true,"remove":true}} -->
<div class="wp-block-column">
    <!-- wp:one-202x/section-intro {"subtitle":<?php echo wp_json_encode(__('Get in touch', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"title":<?php echo wp_json_encode(__('Let’s talk about your plans', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"description":<?php echo wp_json_encode(__('Send us a message or contact one of our offices. Our team will help you find the right person.', 'one-base-theme'), JSON_HEX_TAG | JSON_HEX_AMP); ?>,"showButton":false} /-->

    <!-- wp:one-202x/contact-details /-->

</div>
<!-- /wp:column -->
<!-- wp:column {"lock":{"move":true,"remove":true}} -->
<div class="wp-block-column">
    <!-- wp:one-202x/contact-form -->
    <!-- wp:gravityforms/form {"formId":"1","title":false,"description":false} /-->
    <!-- /wp:one-202x/contact-form -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</section>
<!-- /wp:group -->
