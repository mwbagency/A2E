# One Base lunch and learn

**13 October 2026 · Mixed team · 15 minutes, followed by questions**

Present this as a change in how we build and maintain websites. Use A2E as the example. The comparison is the older MWB/ACF approach inspected in the RVT theme, not a claim that every previous project worked identically.

Your main message:

> “We’re keeping our reusable design approach, while giving more of the ordinary page-building work to WordPress. We can assemble approved sections, edit their content visually and keep brand decisions in shared settings. Custom code remains available where the content or behaviour needs it.”

## Running order

| Time | Slide | What you do |
| --- | --- | --- |
| 0:00–1:00 | 1. One Base | Explain the reason for the change. |
| 1:00–3:00 | 2. What has changed | Compare the old and new approaches fairly. |
| 3:00–5:00 | 3. Blocks, patterns and templates | Explain the vocabulary with one concrete section. |
| 5:00–9:00 | 4. Building a section | Switch to WordPress for a four-minute demonstration. |
| 9:00–11:00 | 5. Customisation and its reach | Show local styling and explain site-wide settings. |
| 11:00–12:30 | 6. Reuse and shared updates | Explain independent copies and synced patterns. |
| 12:30–14:00 | 7. What the structure improves | Connect the engineering choices to team benefits. |
| 14:00–15:00 | 8. Choosing the right starting point | Give people a usable workflow and invite questions. |

The spoken sections below leave room for clicking and explaining what appears on screen. Rehearse once with a timer. If time slips, shorten slide 7 and leave the developer walkthrough for questions.

## Before people arrive

1. Sign in to the local [A2E admin](http://localhost:8000/wp-admin/). Open the homepage in another tab.
2. Prepare an unpublished page called **Lunch and learn demo**. Use **Page — title in content** when the page includes its own H1. Keep one clear H1 in the page content. Alternatively use **Page — automatic title** and let that template supply the title.
3. Find **Call to action — centred panel** in the pattern inserter's **A2E** category. Its source slug is `one-202x/ctas004_centred-panel`. Search by the displayed title, not by the PHP filename.
4. Have the block settings sidebar and List View available. Rehearse selecting the outer section, its heading and an Icon Button.
5. Prepare a plain Group containing a Heading and Paragraph after the section. This makes the **Light Card**, **Accent Card** and **Dark Card** styles easy to demonstrate without fighting a section's own CSS.
6. Open **Appearance → Editor → Styles** in a separate tab. Preview only during the talk, or use a disposable copy if you want to save global changes.
7. Open these two files in your code editor if the developers want a quick look: `theme.json` and `patterns/page/page001_homepage.php` inside the One Base theme. The full paths are in the developer reference below.
8. Use normal presentation mode for the slides and Presenter View for the notes. Keep this guide available separately for the click sequence.

**Demo boundary:** the sample site contains placeholder copy and course records. The booking card is design for a later integration. Avoid demonstrating booking/payment completion or submitting enquiry forms. The lesson is the editing and theme architecture.

**If the editor is unavailable:** keep slides 4 and 5 on screen and talk through the steps. Show the public A2E page as the result, and use the PHP pattern to point out its Heading, Paragraph and Icon Button blocks. Do not claim to have demonstrated saving.

## Slide 1 · One Base · 0:00–1:00

**Show:** the opening slide. Briefly point to the A2E homepage if already open.

**Say:**

> “Today I want to show you how our new base theme changes the way we build and edit a website. By the end, you should know what a block is, what a pattern is, and where to make a change depending on how widely it should apply.
>
> “The reason for this work is to make everyday page building more flexible, while keeping a consistent design. A heading change, a different image or a new arrangement of existing content should use the editing system wherever possible. Developers can then spend more time on the behaviour and data that are specific to the project.
>
> “I’ll use A2E to show that in practice.”

## Slide 2 · What has changed · 1:00–3:00

**Show:** the comparison table. Explain the first two rows to everyone. Keep the final row brief.

**Say:**

> “Our previous base theme already gave us reusable sections, ACF controls and global brand settings. Those were useful capabilities, and we’re keeping that approach to reuse.
>
> “A typical section in the older theme was a custom ACF block. A developer defined its fields and the rendering template. Editors could change what those controls exposed, but a different internal arrangement often needed development work.
>
> “In One Base, many sections are patterns assembled from WordPress blocks and a smaller set of reusable custom components. That means the section arrives designed, but the pieces inside it are still editable. A new arrangement can often reuse the same pieces.
>
> “Brand settings now have a standard home in theme.json and WordPress Styles. The old theme also had central colour and font controls. The improvement is that the settings work through WordPress’s shared styling system.
>
> “We’ve also separated content definitions, such as courses and their fields, from the theme. That makes a future redesign easier to reason about because the content model has its own home.”

**Keep the comparison fair:** both implementations already use Gutenberg and automatic block discovery. Do not describe this as “we finally have blocks”, “we removed ACF”, or “we invented reusable components”. The new registration uses WordPress block metadata, rather than the older PHP class conventions.

## Slide 3 · Blocks, patterns and templates · 3:00–5:00

**Show:** the definitions slide. Use a call-to-action section throughout the explanation.

**Say:**

> “A block is a piece of content or functionality with its own controls. A Heading is a block. An Image is a block. Our Icon Button is also a block, with controls for its link and optional icon. Blocks can contain other blocks, and some blocks fetch data.
>
> “A pattern is a prepared arrangement of blocks. Our call-to-action pattern contains a surrounding Group, a heading, supporting copy and buttons. Inserting the pattern saves you from assembling and styling that arrangement from scratch.
>
> “A page pattern is a larger starting layout made from several sections. A template has a different job: it supplies the shared page structure, including where the page’s own content appears. A template part is a shared area such as the header or footer.
>
> “When you need a heading, add a block. When you need a designed section, start with a pattern. When you need to change the shared page shell, look at the template.
>
> “Whether a pattern stays linked to other uses is a separate choice. I’ll show that after the demo.”

**Audience prompt:** “In this call to action, which part is the pattern, and which parts are blocks?” Take one answer, then move on.

## Slide 4 · Building a section · 5:00–9:00

**Switch to the prepared unpublished page.**

| Time | Do this | Say this |
| --- | --- | --- |
| 5:00–5:40 | Open the `+` inserter, choose **Patterns**, then **A2E**. Insert **Call to action — centred panel**. | “We start with a section that already has a design. This gives us a consistent starting point.” |
| 5:40–6:20 | Open **List View**. Select the outer Group, then the Heading and a Paragraph inside it. | “The section contains individual blocks. List View shows the structure and makes the right level easier to select.” |
| 6:20–7:10 | Change the heading to **Talk to us about your training needs**. Replace the supporting paragraph. Select an Icon Button, set its text to **Get in touch**, and set the link to `/contact-us/`. Toggle its optional icon if time permits. | “These are content changes. The section keeps its layout while I edit the message and the action.” |
| 7:10–8:00 | Select the outermost section Group. Open its options menu and choose **Duplicate**. Change only the duplicate’s heading. Use the move controls to reposition the whole section. | “These two copies can have different content. Moving the outer Group keeps the section together.” |
| 8:00–9:00 | Save the page as a draft, reload it, and preview it at desktop and mobile widths. | “Saving and reopening checks that the content persists. The frontend preview checks how the actual page behaves at different widths.” |

If duplicating a section that has an HTML anchor, give the duplicate a unique anchor. Keep the `one-202x-pattern-*` class: it connects the section to its assets. Do not remove structural wrappers to tidy List View.

Do not put an entire section into **Create pattern** during this four-minute demonstration. Explain synced patterns on slide 6, or demonstrate them during questions.

## Slide 5 · Customisation and its reach · 9:00–11:00

**Show:** the prepared plain Group, then the Styles screen. Return to the slide if the controls take too long to locate.

**Say:**

> “Before making a change, decide how far it should reach.
>
> “For one section, select its block and use the controls available for that block. Here I can give this Group the Light Card, Accent Card or Dark Card style. These are named appearances of the same block, so we can offer useful choices without making a new block for every colour treatment.
>
> “For the wider site, authorised editors can use Appearance, Editor, Styles. Those changes affect the elements that use those settings. A local colour or custom CSS can still take precedence, so a global change does not necessarily repaint every element.
>
> “For developers, theme.json defines the starting palette, typography, spacing and widths. In A2E, the content width is 760 pixels and the wide width is 1,280 pixels. Component CSS then handles the layout details that the shared settings do not cover.
>
> “That gives us a common design foundation and room for deliberate exceptions. It also means we need to understand where a change is stored: editor customisations live in the database and can override the theme files.”

**Do:** switch a Group style in the draft. In the Styles screen, point to typography and colours. If you preview a global change, discard it before leaving. Explain that role permissions determine who can access site-wide controls.

**Optional developer view, maximum 20 seconds:** show `settings.layout`, `settings.color.palette` and `styles` in `theme.json`. Explain “a token is a named design value”. Do not scroll through the whole file.

## Slide 6 · Reuse and shared updates · 11:00–12:30

**Say:**

> “Reusable does not automatically mean synchronised.
>
> “When we insert an ordinary theme pattern into a page, WordPress expands it into editable blocks. Each saved copy has its own content. Changing the source pattern later changes the starting point for future insertions. It does not rewrite those saved copies.
>
> “A synced pattern is an explicit shared record. Editing that original updates the instances still linked to it. That is useful for an identical notice or shared call to action. If the content should differ from page to page, choose independent copies, or consider supported pattern overrides after checking the blocks involved.
>
> “There’s a separate kind of sharing: the CSS and dynamic block renderer can update across many pages even where the text is independent. So ask both questions: is the content shared, and is the styling shared?”

**Examples:** a course-specific introduction is usually independent. A centrally maintained notice may be synced. A header is usually a template part. Course cards may display shared course records through dynamic blocks, which is another mechanism again.

## Slide 7 · What the structure improves · 12:30–14:00

**Say:**

> “For editors, the main benefit is starting from a designed section and being able to edit its pieces. For designers, shared styles make the approved choices visible in the editing system. For developers, ordinary layouts can use existing blocks, while custom blocks handle the specialist controls and behaviour.
>
> “The code has clearer homes too. Presentation lives in the theme. Course and service definitions live in their content modules. A theme change still needs a compatibility review, but it does not need to own those definitions.
>
> “Pattern assets also follow the sections that render on the frontend, which gives us a way to avoid loading every section’s assets on every page. Shared assets still load, and the editor needs the pattern styles for previews. This is a useful loading strategy, not a measured speed claim.
>
> “The responsibility that comes with flexibility is testing. We still check the saved editor content, the real page, mobile layout and keyboard interactions. Reusing a block or a pattern gives us a stronger starting point, but it does not replace those checks.”

**Optional code view:** the homepage composition file contains section references in display order. Explain that this removes duplicated section markup from page composition files. Named section variants still own their own markup and do not inherit later markup changes from a similarly named base file.

## Slide 8 · Choosing the right starting point · 14:00–15:00

**Say:**

> “When you build the next page, look for an existing pattern first. Edit its content and use the style choices we have provided. If the arrangement needs to change, check whether the existing blocks can do it. A new custom block makes sense when we need a new kind of control, reusable behaviour or data integration.
>
> “Before changing anything shared, decide whether the change belongs to one page, to a shared section, or to the whole site. Then save, reopen and preview it.
>
> “The result we’re aiming for is less repeated implementation and more consistent editing, with development work focused on the parts that actually need it.
>
> “What’s a page change you currently ask a developer to make? Let’s use that to work out which part of this system would handle it.”

## Instructions people can use afterwards

### Add or rearrange a section

1. Edit the appropriate page or post. Open the `+` inserter and switch to **Patterns**.
2. Browse **A2E**, **One Base**, or a section category. A2E-created material uses A2E; inherited components retain their existing categories.
3. Insert a suitable section. Use List View to select its content blocks and update text, media and links.
4. Move or duplicate the entire outer section Group when rearranging. Preserve its marker classes. Keep anchors unique.
5. Save, reload and inspect the frontend at desktop and mobile widths. Keep heading levels meaningful independently of their visual size.

### Change a section’s appearance

1. Select the correct block in List View.
2. Open its settings and style controls. Available controls depend on the block.
3. Prefer a named style, palette colour or spacing preset where provided. Group styles include **Light Card**, **Accent Card** and **Dark Card**. Core Buttons have **Outline Dark**. Icon Button has its own controls.
4. Check whether the section’s component CSS deliberately controls that property. If the chosen style has no effect, trace the existing rule instead of piling on overrides.
5. Save and check the actual frontend. A local appearance change to ordinary independent blocks affects that instance. Editing blocks inside a shared synced pattern can affect all linked instances.

### Make a section deliberately shared

1. Select the section’s outer Group and choose **Create pattern** from its options menu.
2. Give it a clear name and enable the **Synced** option if the same content should appear wherever it is used. WordPress may vary the exact menu wording by version.
3. Insert that saved pattern on the other pages. Editing the original updates its linked instances.
4. To change only one instance, use **Detach pattern** first. Detaching makes it independent.
5. Before editing an existing shared pattern, identify where it is used. Treat pattern overrides as a separate feature: only supported content fields can vary while the shared structure stays linked.

### Change the overall site design

1. With an appropriate role, open **Appearance → Editor → Styles**.
2. Review the available colour, typography, layout and block settings.
3. Preview the intended change across representative pages. Check local overrides, custom CSS, colour contrast and responsive layout.
4. Review what WordPress proposes to save before applying it. Global styles, template parts and templates can affect multiple pages.
5. For a reusable theme change, have a developer incorporate the approved default into the source and deploy it. Editor changes do not automatically become a Git commit or update other sites using the starter.

### Edit a course

1. Open the course record. Update its title, featured image, taxonomy selections and structured course fields as appropriate.
2. Edit the overview and other page-specific content blocks in that course’s editor.
3. The shared single-course template supplies the header, dynamic hero, Post Content and footer. Empty course editors receive the **Course profile — A2E** starter layout. Existing course content is not overwritten.
4. Update section-navigation links if you change section anchors.
5. Treat the booking card as interface design pending integration. Filter bands and exact display text are separate settings: changing a duration or price label does not automatically change its selected filter band.

## Developer reference for questions

All theme-relative paths below are under `/Users/christopher/Docker/wordpress/a2e/wp-content/themes/one-base-theme/`. Run the commands from `/Users/christopher/Docker/wordpress/a2e/`.

| Change | Source | What to remember |
| --- | --- | --- |
| Brand defaults and widths | `theme.json` | Keep existing token slugs stable. Saved global styles and local block styles can override defaults. |
| Arrange a page starter | `patterns/page/page001_homepage.php` or the relevant page pattern | After metadata and the access guard, use section-pattern references only. |
| Change a section’s starting markup | `patterns/ctas/ctas004_centred-panel.php`, for example | Existing inserted copies keep their saved content. A named variant has independent markup. |
| Change section presentation | `src/styles/patterns/ctas/ctas004_centred-panel.css` | Preserve the marker `one-202x-pattern-ctas004_centred-panel`. Rebuild pattern CSS. |
| Change or create a custom block | `blocks/<slug>/block.json`, renderer and matching script sources | `App/Blocks.php` discovers metadata. Reuse existing blocks before adding one. |
| Style a custom block | `src/styles/blocks/<slug>/` | Rebuild block CSS. Do not edit generated output alone. |
| Shared page shell | `templates/` and `parts/` | Retain Post Content where editorial content belongs. Check database overrides first. |
| Course fields or rules | `/Users/christopher/Docker/wordpress/a2e/wp-content/mu-plugins/one-courses/` | Domain definitions belong with the content module. The theme owns their presentation. |

For a theme source change, choose the matching build command:

```sh
npm run build:css:patterns   # Section styles
npm run build:css:blocks     # Custom block styles
npm run build:css:core       # Core block styles
npm run build:css:global     # Global styles
npm run build:js            # Script changes
npm run check
git diff --check
```

Run the relevant build command, not every command automatically. Static checks do not replace editor insertion/save/reload or frontend testing.

An actual page-composition reference looks like this:

```html
<!-- wp:pattern {"slug":"one-202x/ctas004_centred-panel_training"} /-->
```

The corresponding section keeps its marker class. Shared CSS can use the theme’s values:

```css
.one-202x-pattern-ctas004_centred-panel {
    padding-block: var(--wp--preset--spacing--xl);
}
```

This is an illustrative replacement for the existing responsive padding rule, not a change made to the theme. The point is to reference a named value when appropriate, rather than inventing an unrelated number.

### Theme customisation is not automatic inheritance

The loader supports matching child-theme block metadata and assets, but this A2E project is currently the active One Base theme itself. Do not demonstrate an existing A2E child theme that has not been set up. A client project derived from the starter does not automatically receive future starter updates. Plan and test those changes explicitly.

## Questions you are likely to get

**“Can clients break the layout?”** They can change what their role and the exposed controls allow. Patterns provide a designed starting point, not a universal lock. Use suitable controls and selective locking, then check actual permissions. Do not promise that every section is content-only or locked.

**“Are we getting rid of ACF?”** No. ACF still supports structured content and can support a field-driven custom block where that is the better editing experience. The decision is which tool fits the content, rather than making every layout a new ACF block.

**“Will updating a pattern fix every page?”** Source markup changes do not rewrite independent saved copies. Synced records update linked instances. Shared CSS and dynamic renderers have their own update behaviour.

**“Is it faster?”** The frontend has a mechanism for loading section assets when their markers render. That can reduce unused assets. A before-and-after speed improvement needs measurement; we do not have a comparable benchmark for this talk.

**“Is it automatically accessible?”** No. Core blocks and shared components help us reuse established behaviour, but we still test headings, focus, keyboard controls, contrast, media alternatives and the finished page.

**“Does changing the theme lose the courses?”** The course definitions and fields live in MU-plugins, and the records live in the database. Their appearance and any theme-owned blocks still need compatibility work when a different theme takes over.

**“Why did a template file change not appear?”** A saved Site Editor template can override its file. Check the saved record before assuming the file or deployment failed. Do not reset that record without reviewing its customisations.

**“Can we migrate old sites by switching themes?”** Treat that as a migration project. The old ACF blocks, fields, templates and saved content have their own contracts. A theme switch alone does not convert them to the new patterns.

## Evidence and preparation status

The comparison uses current local source inspection from A2E and the older RVT/MWB theme. A2E’s public homepage was checked in the browser on 13 October 2026. WordPress CLI confirmed WordPress 7.1, the active One Base theme, the CTA/homepage/course patterns, Icon Button and Media Cover. The database currently has no published synced patterns, so synced patterns are an explained option, not an existing A2E rollout.

The browser reached the admin login screen. The editor demonstration has not been rehearsed in a signed-in browser during this preparation. Complete the short rehearsal above before presenting. No saved pages, template settings or theme source were changed to prepare this material. The local services were started for inspection.

Key project sources:

- [Pattern behaviour and course ownership](/Users/christopher/Docker/wordpress/a2e/wp-content/themes/one-base-theme/patterns/README.md)
- [Theme settings](/Users/christopher/Docker/wordpress/a2e/wp-content/themes/one-base-theme/theme.json)
- [Block styles](/Users/christopher/Docker/wordpress/a2e/wp-content/themes/one-base-theme/App/BlockStyles.php)
- [Pattern asset loading](/Users/christopher/Docker/wordpress/a2e/wp-content/themes/one-base-theme/App/PatternAssets.php)
- [New-course starter configuration](/Users/christopher/Docker/wordpress/a2e/wp-content/themes/one-base-theme/App/Setup.php)
- [Older ACF block implementation](</Users/christopher/Local Sites/rvt/app/public/wp-content/themes/rvt/includes/Block/HERO/HERO001.php>)
- [Older theme brand controls](</Users/christopher/Local Sites/rvt/app/public/wp-content/themes/rvt/includes/Theme.php>)
- [Older theme-owned post-type registration](</Users/christopher/Local Sites/rvt/app/public/wp-content/themes/rvt/includes/CPTs.php>)

WordPress references:

- Blocks and independent versus shared patterns: [Work with blocks](https://wordpress.org/documentation/article/work-with-blocks/).
- Pattern management and template parts: [Site Editor Patterns](https://wordpress.org/documentation/article/site-editor-patterns/).
- Creating a pattern: [Using Block Patterns](https://learn.wordpress.org/tutorial/using-block-patterns/).
- Shared pattern instances and detaching: [Synced Patterns](https://wordpress.org/documentation/article/reusable-blocks/).
- Settings, styles and database customisations: [Global Settings and Styles](https://developer.wordpress.org/themes/core-concepts/global-settings-and-styles/).
