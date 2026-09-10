<?php
$footer = get_block_template(get_stylesheet() . '//footer', 'wp_template_part');
$social = get_block_template(get_stylesheet() . '//social-links', 'wp_template_part');
$pattern = WP_Block_Patterns_Registry::get_instance()->get_registered('one-202x/foot001_footer');
if (!$footer || !$social || !$pattern) {
    throw new RuntimeException('Footer, social template part or pattern is missing.');
}
foreach (parse_blocks($social->content)[0]['innerBlocks'] as $block) {
    if (!empty($block['attrs']['url'])) {
        throw new RuntimeException('A social URL was populated.');
    }
}
$public_html = do_blocks($footer->content);
if (str_contains($public_html, 'href="#"') || substr_count($public_html, 'mailto:admin@a-ets.com') !== 1) {
    throw new RuntimeException('Unexpected footer links.');
}
echo "Footer source: {$footer->source}; social part source: {$social->source}; URLs remain unset.\n";
// Render example destinations only in this disposable visual check, without saving any content.
$sample_social = str_replace('"service":', '"url":"https://example.com/","service":', $social->content);
$sample_footer = preg_replace('/<!-- wp:template-part \{"slug":"social-links".*?\/-->/', $sample_social, $pattern['content']);
$sample_html = do_blocks($sample_footer);
do_action('wp_enqueue_scripts');
wp_enqueue_script('wp-block-library');
ob_start();
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head><body><main class="wp-site-blocks"><?php echo $sample_html; ?></main><output id="validation"></output><script type="application/json" id="block-markup"><?php echo wp_json_encode([$pattern['content'], $social->content], JSON_HEX_TAG | JSON_HEX_AMP); ?></script><?php wp_footer(); ?><script>
try {
    wp.blockLibrary.registerCoreBlocks();
    const failures = [];
    let count = 0;
    const inspect = blocks => blocks.forEach(block => {
        count++;
        if (!block.isValid) failures.push({ name: block.name, issues: block.validationIssues });
        inspect(block.innerBlocks);
    });
    JSON.parse(document.getElementById('block-markup').textContent).forEach(markup => inspect(wp.blocks.parse(markup)));
    document.getElementById('validation').textContent = JSON.stringify({ count, failures });
} catch (error) {
    document.getElementById('validation').textContent = JSON.stringify({ error: error.message });
}
</script></body></html><?php
file_put_contents(ABSPATH . 'a2e-footer-review-temporary/index.html', ob_get_clean());
