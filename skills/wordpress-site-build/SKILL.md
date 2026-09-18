---
name: wordpress-site-build
description: Build and extend Gutenberg WordPress sites using an existing starter theme, Figma designs, reusable blocks, reference-based page patterns and plugin-owned content models. Use for theme architecture, page layouts, blocks, design tokens, listings and editor behaviour in this workflow.
---

# WordPress site build

Use the project's existing WordPress foundation to implement the requested design
and editing experience. This skill defines a portable workflow; the project's
`AGENTS.md` supplies its paths, namespace, branding, integrations and commands.
Apply it within the requested scope, without imposing a new theme architecture on
an unrelated legacy site or migrating saved content as a side effect.

## Establish the project contract

- For a new site, adapt [the project guidance template](assets/AGENTS.template.md)
  into its root `AGENTS.md`. Fill values from evidence, record unresolved facts and
  preserve any existing guidance. The template's variables are inputs, not defaults.
- Read applicable `AGENTS.md` files, the active theme, root dependency manifests
  and build scripts. Inspect the relevant rendered page and saved blocks when
  diagnosing an existing site. File contents alone do not prove what WordPress uses.
- Locate the current block, pattern, template, asset-discovery and content-plugin
  conventions. Reuse those extension points before adding a class or registry.
- Identify the requested deliverable: editable page content, an insertable page
  layout, a selectable template, a default single-post template, or a shared
  section. These are different outcomes; resolve ambiguity before making content
  shared or replacing an existing template.
- Keep the site's Figma file, colours, fonts, logo, category prefix, post types,
  taxonomy names, URLs, form IDs and environment details in project guidance.
  Never carry another client's values into a new site.

## Implement from the design

1. Inspect the relevant Figma node and surrounding variants using the available
   Figma workflow. Read its design-to-code skill when supplied by the environment.
   Use actual design context and screenshots; do not infer an entire screen from
   a node title. If access is unavailable, report the missing evidence.
2. Inventory suitable existing blocks, section patterns and plugins. Choose the
   smallest extension that preserves their editor controls and behaviour.
3. Establish design tokens in `theme.json`: font faces and weights, palette,
   typography, spacing, content width and wide width. Use exported SVG logos and
   icons or the established icon library. Keep missing licensed font assets
   explicit; retain planned references only when requested.
4. Build reusable sections, then compose page-pattern files entirely from
   `core/pattern` references. Keep registration metadata and a direct-access guard
   in PHP page files; keep section markup, queries and data in section patterns.
   Read [architecture and patterns](references/architecture-patterns.md) before
   choosing blocks, variants, templates or synchronisation.
5. Use readable nested CSS, one declaration per line, existing tokens and scoped
   classes. Edit sources and rebuild the corresponding assets. Respect max width,
   intentional full-bleed areas and mobile stacking. Trace unwanted spacing to
   block attributes, layout rules or saved global styles before overriding it.
6. Keep content and media editable with existing components. For queries, forms,
   metadata, navigation or interactions, read
   [editor, data and interactions](references/editor-data-interactions.md).

## Verify the requested outcome

- Run the repository's relevant build and checks. Validate serialized blocks in
  WordPress, including editor insertion/reload when markup or controls change.
- For visual work, compare the actual frontend at desktop and mobile sizes against
  the design. Check max width, overflow, spacing, typography, assets and empty
  states. Test keyboard and pointer interaction where affected.
- For data changes, prove save/reload/render behaviour. For refactors, compare
  expanded blocks, content, query settings and representative rendered layouts.
- Run the portable composition check when page patterns change:

  ```sh
  php /path/to/wordpress-site-build/scripts/check-page-patterns.php /path/to/theme
  ```

  It checks PHP files under `patterns/page`, static slug references, missing
  targets, duplicate slugs and reference cycles without loading WordPress or
  writing data. Additional positional arguments explicitly allow slugs registered
  outside the theme. Runtime-generated references and editor behaviour still need
  WordPress verification. A missing page-pattern directory is reported as a setup
  error, not a pass.
- State what was changed, where the user edits it, what was verified, and any
  remaining configuration. Distinguish syntax, server-render, editor and browser
  proof. Report blocked checks without claiming they passed.

## Preserve the data and editing model

Never add theme-startup seeding for pages, navigation, options, taxonomy terms,
forms or default records. If the task authorizes a one-off local setup, perform
only that setup and keep it out of production startup code. Preserve existing
saved content and database template customisations unless migration is requested.
Do not invent notification recipients, social profiles, booking integrations or
consent text. Use the project's configured plugins and data sources.
