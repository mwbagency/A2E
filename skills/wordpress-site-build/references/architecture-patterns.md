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

A page pattern is a list of references, not a second copy of every section:

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

Reuse an existing section reference first. A plain `core/pattern` reference cannot
pass arbitrary heading, image or button parameters. When copy or structure differs,
choose deliberately between editable content after insertion, a named section
variant, or a shared structure with supported content overrides. Preserve Figma
content; do not silently substitute generic placeholders to achieve reuse.

A named variant is independently maintained markup unless it explicitly uses a
shared implementation. Similar filenames or CSS classes do not create inheritance.
Avoid cloning every section merely because its text differs, and do not promise
that changing a base pattern updates its variants. Explain the trade-off when the
user requires both independent content and global structural updates.

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
