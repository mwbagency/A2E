# Architecture and pattern composition

## Ownership and reuse

| Concern | Usual owner in this workflow |
| --- | --- |
| Brand tokens, markup, CSS, editor controls, block rendering, presentation interactions, patterns and templates | Theme |
| Post types, taxonomies, fields, validation, data access and domain rules | The relevant content plugin or MU-plugin |
| Forms, sharing, SEO and established integrations | A suitable existing plugin |

Preserve the repository's existing ownership where justified. Domain-specific
navigation generation may belong with the content plugin it requires, while its
visual styling belongs in the theme. Keep functions near the block or module that
uses them. Do not create a new `App` class for every small feature.

Reuse native blocks when they express the design and remain practical to edit.
Use a pattern for a composition of existing blocks. Extend an existing custom
block for reusable behaviour or data controls; create a new block only when those
needs cannot be met cleanly. Prefer convention-based asset and block discovery
where the starter provides it. Do not hard-code a second manual registry.

## Page patterns

A page pattern can compose references to reusable sections:

```php
<?php
/**
 * Title: Example page
 * Slug: site/page-example
 * Categories: site
 * Post Types: page
 */
defined('ABSPATH') || exit;
?>
<!-- wp:pattern {"slug":"site/hero-introduction"} /-->
<!-- wp:pattern {"slug":"site/course-listing"} /-->
<!-- wp:pattern {"slug":"site/contact-callout"} /-->
```

Use the site's actual registered slugs and categories. Newly created patterns use
that site's category; retain the category and namespace of inherited starter
components unless a rename is requested.

Keep one registered section pattern per unique reusable layout. Insert an existing
section and edit its content on the page by default. A new heading, image, link,
anchor or query selection is page content, not another layout. Register a new
pattern only for a genuinely different reusable layout. Reusable behaviour or
controls may belong in a block instead of another pattern.

A plain `core/pattern` reference cannot pass arbitrary content parameters. Do not
work around that limitation by creating a pattern for every page's copy. If an
existing page starter needs exact content, it may contain ordinary blocks or call
shared theme source partials with local data. References remain useful for
sections that can be reused as supplied. Preserve designed content and wrappers;
do not replace them with generic defaults during consolidation.

Do not add page-starter patterns solely to populate another page. A page starter
is justified by a reusable composition, not by the existence of a new page.
Keeping a content-only pattern registered with `Inserter: no` does not remove the
duplicate; do not maintain a hidden catalogue of these variants.

## Consolidating duplicate patterns

1. Identify the canonical reusable layout and compare each candidate's structure.
   Keep deliberate layout differences. Record the content, classes, wrappers,
   anchors, media, links, form IDs and query settings that must survive.
2. Audit references in page compositions, templates, template parts, starter code
   and saved WordPress records, including reusable blocks and customised
   templates. File searches alone are insufficient. Distinguish active
   `core/pattern` references from origin metadata on already expanded blocks.
3. Before removal, snapshot expanded source output and relevant saved content.
   Capture representative rendered layouts when moving wrappers or markup.
4. Put a content-only variant's exact blocks or shared-source call and local data
   into the page composition or other source that owns that content. Reuse a
   canonical reference only where its supplied content is identical. Shared PHP
   partials can maintain repeated structure without registering extra patterns.
5. If saved records actively reference a removed slug, perform only a
   task-authorized one-off expansion into equivalent editable blocks, with the
   prior content captured for recovery. Preserve unrelated records and
   customisations. Never add startup migrations, seeding or automatic rewrites.
6. Remove the duplicate registrations and files after their references are
   resolved. Preserve asset-discovery markers in the resulting content. Refresh
   the theme's pattern cache once when needed, then check the registered library,
   expanded output, saved content, editor validity and representative rendering.

Similar filenames or shared CSS do not create markup inheritance, and shared PHP
source does not synchronise already inserted blocks. Explain that distinction
when global updates are required; choose templates, synced patterns or suitable
custom blocks explicitly.

Layout wrappers belong within section patterns when needed by their styles. Keep
interdependent UI, such as a searchable FAQ hub and its answer groups, in a
coherent section. Keep wrappers minimal and verify geometry when moving them.

## References, copies and synchronisation

| Mechanism | Source and update behaviour |
| --- | --- |
| Theme `core/pattern` reference | Resolves the registered source while that reference remains in use. |
| Unsynced pattern inserted and saved | Becomes independently editable blocks; later source markup changes do not replace them. |
| Synced pattern | Instances reference a shared database record; editing the original updates linked instances. |
| Synced pattern with overrides | Shares structure while selected supported content differs per instance. Check block support. |
| Template part | Shared structural area, typically a header or footer. |

Shared CSS and dynamic block rendering can still update independently of these
content relationships. Origin metadata such as `patternName` is not proof of a
synced relationship. Inspect saved markup and records before removing or migrating
patterns. Do not equate file-level deduplication with updates to saved pages.

When the project requires direct page editing, expose the inserted blocks' own
image and button controls without a separate pattern-editing step. Inspect the
installed editor's settings for automatic content-only mode on unsynced copies
and disable that mode in post editors where supported. Keep code-defined pattern
sources separate from page content; do not rewrite saved pages or strip origin
metadata just to change the editing interface. Preserve shared template-part and
synced-pattern protections.

## Templates and starter content

- A selectable template needs a template file and the appropriate `theme.json`
  registration, including eligible post types. Confirm it appears in the editor.
- A default single-post template follows the post type's template hierarchy.
- A post-type starter layout prepopulates new records; it must not overwrite
  existing content or be mistaken for a live shared template.
- Include native Post Content where the user needs to edit normal page/post content.
  Avoid putting identical editorial content into every post's shared template.
- An editable, filterable landing page can be a normal Page containing Query blocks;
  do not force it into an archive template simply because it lists records.
- Saved database template/global-style customisations can override source files.
  Inspect those before concluding a `theme.json` or template edit is ineffective.
