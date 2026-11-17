# Page layouts and shared patterns

The section library contains one registered pattern per unique reusable layout.
Insert a section and edit its text, images, links, anchors and query selections on
the page. New content should not create a new pattern file, including a hidden
pattern. Register a new section only for a different reusable layout.

The existing files in `page/` preserve the supplied page designs. They combine
ordinary blocks, shared `pattern-layouts/` calls with local content data, and
references to sections that can be reused as supplied:

```html
<!-- wp:pattern {"slug":"one-202x/show010_statistics-strip"} /-->
```

Populate new pages in their saved editable blocks. Do not add a page starter just
to store another page's copy, or create registered section presets to keep starter
files reference-only.

## Shared source and pattern removal

Content-only section presets are removed from the registered library. Their
designed content belongs directly in the existing page compositions. The retained
page starters and structural template patterns keep their roles; hidden
content-only compatibility patterns are not part of the library.

The introduction, call-to-action, image/text and five shape-hero layouts share PHP
source markup in `pattern-layouts/`. Reusable patterns and existing page starters
can supply local content to those partials. Edit a shared partial for a family-wide
source change. Image/text compositions keep their varied content blocks in a
buffered slot, with the surrounding layout maintained once.

Keep genuine layout alternatives, including the searchable FAQ hub and testimonial
grid. Appearance and content choices belong to the inserted blocks:

- **Hero — shaped media and statistics:** select the outer Group, then use
  **Hero appearance** to choose one of five shapes and the image side. The fixed
  service header retains its own mask. Text, statistics, buttons and media remain
  editable blocks.
- **Image and text — editable content:** use the Media & Text toolbar to switch
  the image side; edit the body blocks for icon features or an information panel.
- **Columns — editable text, icons and buttons:** change the native Columns count
  and insert or remove Icon blocks. Icon styling follows the content.
- **Team members — selected or latest:** choose people and the result count in the
  Query settings. Add an ordinary heading when needed.
- **Logos — accreditation marquee:** replace the logo images and add an optional
  introduction. Partner and accreditation logos share the same layout.
- Insert the native **Breadcrumbs** block and choose its **A2E** style.

The simple-page sample copy is shared by the existing page starter and the empty
page editor through `pattern-layouts/simple-page-content.php`; it is not a
separate registered section. The unused legacy Content Listing and Contact Form
wrapper blocks have been removed. Use Query Loop with Content Card and the native
Gravity Forms block respectively.

The November 2026 cleanup reduced the theme catalogue from 84 to 74 patterns and
18 to 16 custom blocks. All 112 saved records with content (including revisions)
were checked: none actively referenced the removed patterns or blocks. Existing
page content, template content, media, query choices and form IDs were preserved.
The distinct content-feed, FAQ and testimonial layouts remain available; their
different layouts and interactions are not content-only duplicates.

Before removing any further pattern, audit page files, templates, starter code and
saved WordPress records for active references. Snapshot expanded output and saved
content, preserve the exact blocks or shared-layout calls in their content owners,
and compare output afterward. Saved blocks that only record a pattern's origin
need no rewrite. If a saved record actively references a removed slug, expand it
once only within the task's authorized scope. Preserve CSS markers, wrappers,
assets and content; do not add automatic migrations or seed pages.

WordPress caches pattern headers. After deploying pattern removals or metadata
changes, refresh that cache once with `wp eval 'wp_get_theme()->delete_pattern_cache();'`
(use the project's Docker WP-CLI command locally), then reload the editor. Do not
add a theme-startup cache flush or content migration for this.

## Accreditation marquee

The accreditation marquee accepts individual Image blocks. Use **Add logos** to
select multiple images directly; use each image's normal controls to replace,
reorder, link or edit its alt text. Editor previews stay within 56px high and
240px wide. Existing gallery-based marquees still render; **Ungroup existing
logos** converts a plain gallery in the editor when requested, retaining the image
blocks. Galleries with captions, anchors or dynamic sources are kept intact.

## References are not synced patterns

- **Theme pattern reference:** WordPress loads the registered PHP pattern while
  resolving the theme layout. Source changes reach layouts that still use that
  reference.
- **Unsynced pattern inserted in the editor:** WordPress expands the pattern into
  editable blocks. Once saved, this is an independent copy. Editing the PHP source
  does not replace those saved blocks.
- **Synced pattern:** A shared record stored in the WordPress database. Saved
  instances reference that record. Editing its original updates every linked
  instance. Detaching an instance makes it independent.
- **Synced pattern with overrides:** The structure stays shared, while supported
  text, images and other content can differ per instance. Custom block support
  must be checked before using overrides.

The `metadata.patternName` that WordPress adds to an inserted theme pattern records
its origin; it does not turn the saved blocks into a synced pattern. Shared CSS
and dynamic block rendering still update independently of pattern synchronisation.

Site Editor customisations saved in the database take precedence over their theme
template files. A source refactor therefore does not overwrite existing pages or
saved template customisations. Review those separately if migrating existing
content to references or synced patterns.

## Course profiles

`single-course.html` supplies the shared header, dynamic course hero, Post Content
and footer. The theme's `Setup::course_editor_template()` gives empty course editors
the `page014_course` composition. Its page-specific blocks and reusable section
references become independent editable blocks when creating a course; no existing
records are seeded or overwritten.

Edit each course's overview, specifications, statistics, booking placeholder and
query selections in its content. The hero reads its title, featured image, course
category and existing course fields. Keep section HTML anchors aligned with the
editable Course section navigation links. The add-on course query excludes the
current course by default.

The corporate enquiry form uses local Gravity Form 4, “A2E Course Corporate
Booking”. Its entries are stored without email notifications until a recipient is
configured. The separate booking card remains inactive until booking is integrated.
