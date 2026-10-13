# Heading Panel

Insert **Heading Panel** from the **A2E** block category. Edit its subtitle,
title, heading level, description, repeatable buttons and optional image in the
ACF sidebar or expanded field panel. Image alternative text comes from the Media
Library. An empty block shows an editor prompt and no frontend output.

This block requires ACF PRO 6.8.1 or later (the project locks 6.8.9). It uses
WordPress API v3 and ACF Blocks v3. Fields live in `acf.fields` in `block.json`;
ACF generates their keys and block location. Keep block and field names stable
once content has been saved.

The existing `App/Blocks.php` discovery registers the block without another loader.
`render.php` reuses Section Intro, Icon Button, Core Icon and Media Cover renderers.
Shared style handles are declared in metadata for frontend and iframe previews.
Edit `src/styles/blocks/heading-panel/style.css`, then run
`npm run build:css:blocks` to rebuild its stylesheet.

For a new ACF block, add its own `blocks/<slug>/block.json` and PHP renderer with
the same `apiVersion`, `acf.blockVersion`, `acf.renderTemplate` and `acf.fields`
conventions. Domain fields still belong in their owning MU-plugin.

References: [ACF inline fields](https://www.advancedcustomfields.com/blog/acf-6-8-1-released/),
[ACF Blocks V3](https://www.advancedcustomfields.com/resources/acf-blocks-v3/),
[preview wrappers](https://www.advancedcustomfields.com/resources/acf-blocks-using-get_block_wrapper_attributes/).
