# Page layouts and shared patterns

Every file in `page/` is a composition only: after its registration header, it
contains WordPress pattern references in display order. Section markup, content,
queries and PHP data belong in the referenced section patterns:

```html
<!-- wp:pattern {"slug":"one-202x/show010_statistics-strip"} /-->
```

The homepage references the statistics and accreditation patterns directly. The
homepage and About Us layout also share `show014_blog-posts_latest-news` and
`show013_testimonials_clients`. Edit those section files to change their shared
source. Their existing CSS markers continue to load the same styles and scripts.

Sections with page-specific headings, images, buttons, anchors or query settings
use named variants alongside the original section patterns. For example,
`page011_contact` references `hero003_shapebanner_contact`,
`form005_training-enquiry_contact` and `ctas004_centred-panel_corporate`.
A plain pattern reference cannot pass different content into the referenced
pattern. These variants preserve the designed content instead of reverting to
generic defaults. A variant has its own markup; it does not inherit markup changes
from a similarly named base pattern. Existing marker classes share the CSS and
scripts. Layout wrappers needed by those classes live inside the section variants.

Reuse an existing section or variant wherever it is suitable. Create a variant
only for a different section configuration, and keep the page file reference-only.
The searchable FAQ hub keeps its search and category groups in one section because
they share interactive state.

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
`page014_course`, which contains only section-pattern references. WordPress expands
these into independent editable blocks when creating a course; no existing records
are seeded or overwritten.

Edit each course's overview, specifications, statistics, booking placeholder and
query selections in its content. The hero reads its title, featured image, course
category and existing course fields. Keep section HTML anchors aligned with the
editable Course section navigation links. The add-on course query excludes the
current course by default.

The corporate enquiry variant uses local Gravity Form 4, “A2E Course Corporate
Booking”. Its entries are stored without email notifications until a recipient is
configured. The separate booking card remains inactive until booking is integrated.
