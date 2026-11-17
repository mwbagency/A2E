# Minimal page and section library

The main WordPress Pages are **Homepage** and **Blocks**. Their saved content is
independently editable. The library contains 36 registered patterns (including
structural header, footer, listing and article patterns) and 10 custom theme
blocks. Keep one pattern per reusable layout; copy, images, links, anchors and
query choices belong to the inserted blocks.

The November 2026 minimisation removed 38 further patterns, six unused custom
blocks, eight named-page templates and their unused assets. The other 14 Pages,
an obsolete Testimonials template and the utility menu were moved to WordPress
Trash. The primary menu and footer now link to Homepage and Blocks. A local
recovery snapshot was captured before the cleanup. No content-type records or
Homepage/Blocks body content were rewritten.

## Content variation checks

The requested local **Blocks — Content Tests** page (`/blocks-content-tests/`)
duplicates Blocks as ordinary editable content and adds focused edge cases. Its
44 labelled sections cover short/long copy, portrait/square/landscape images and
a wide SVG, zero to three buttons, optional icons, long unbroken labels and long
booking-card fields. It is excluded from indexing and navigation. It adds no
registered patterns or custom blocks and travels with the database, not Git.

Query results and forms retain their existing records/settings; card renderer
checks use isolated local fixtures rather than rewriting shared content. Check
the saved page at phone, tablet and desktop widths, including keyboard reveal
states, whenever changing shared styles. The original Homepage and Blocks remain
the baseline; do not overwrite them with test content or automatically seed QA
pages on deployment.

## Editing the retained layouts

Select an image, button or text block directly to edit its settings. The post
editor disables automatic content-only mode for unsynced pattern copies, so there
is no **Edit pattern** step. This applies to existing content and newly inserted
sections. Their reusable definitions remain in theme code; changing a page only
changes that page. Shared template parts retain WordPress's separate editing mode.
Creating, editing or deleting database pattern definitions is disabled in the CMS.
The theme's registered patterns remain available to insert as editable copies.

Homepage and Blocks use this same editing model. The three course-detail values
in Blocks are ordinary paragraphs because that demonstration page is not a course
record. Their original course pattern retains its field bindings. When copying a
record-specific layout into a demonstration page, keep such adjustments local to
the page's blocks.

Query cards, FAQs, categories and forms still use their source records or plugin
settings. Their page-level selection and presentation controls are directly
editable, but changing a record's title, image or content belongs in that record's
editor. A native Post Title block edits the page or post title itself.

- **Hero — shaped media and statistics:** select the outer Group and use
  **Hero appearance** to choose one of five shapes and the image side. The service
  header has its own fixed mask. Text, statistics, buttons and media stay editable.
- **Image and text — editable content:** use the Media & Text toolbar to change
  image side, and edit the content column's blocks.
- **Columns — editable text, icons and buttons:** use the native column count and
  add/remove Icon blocks. Styling follows the actual content.
- **Team members — selected or latest:** choose people and result count in Query
  settings; add an ordinary heading when needed.
- **Logos — accreditation marquee:** add, replace and reorder individual Image
  blocks. Existing Gallery-based marquees still render and can be ungrouped.
- **Numbered cards — slider:** use the retained section's ordinary editable
  blocks. The unused second custom-block implementation has been removed.
- Use native **Breadcrumbs** with the **A2E** style, and native **Gravity Forms**
  for forms. Existing form selections remain unchanged.

`patterns/page/` keeps only the homepage composition and the structural article
body used by the single-post template. These are not additional saved Pages. New
page, service and course editors start empty. Build their content from the section
library only when requested; do not recreate the old catalogue of full-page
starters or automatically populate records.

The content types and their single/archive templates remain available for the
records that power cards and demonstrations. Their media, fields and form setup
were not removed. Booking remains design-only until an integration is requested.

## Source, saved blocks and compatibility

Shared PHP in `pattern-layouts/` owns repeated source markup. It does not
synchronise inserted blocks. An unsynced pattern becomes ordinary editable page
content after insertion; `metadata.patternName` only records its origin. Shared
CSS and dynamic renderers can still update its appearance.

Keep CSS marker classes used in saved content even when the matching pattern is
removed. Before further removals, audit source references, saved pages, reusable
blocks, custom templates and revisions. Capture a recovery snapshot and compare
expanded output. Remove unused files rather than leaving hidden compatibility
patterns; never add automatic migrations or seeding.

## Git and deployment

Git tracks source and rebuilt assets, not the WordPress database. The local page
and navigation cleanup travels with the eventual database transfer; pushing code
does not delete pages on another installation. No database cleanup is run at
startup or on deployment.

The Buddy staging and production pipelines are manual. They refresh the theme's
pattern cache after replacing the code. For a manual installation, run
`wp eval 'wp_get_theme()->delete_pattern_cache();'` once after deployment, then
reload the editor. Site Editor customisations saved in the database can override
source templates.
