# A2E project guidance

## Workflow

Use `$wordpress-site-build` for WordPress theme, block, pattern and template work.
The versioned portable source is [skills/wordpress-site-build/SKILL.md](skills/wordpress-site-build/SKILL.md);
read it here if the installed skill is unavailable. Keep universal workflow changes
in that skill; keep A2E facts in this file. Do not assume unrelated existing edits
belong to the current task.

## Project map

- Theme: `wp-content/themes/one-base-theme`.
- Root `composer.json` owns PHP dependencies and autoloading; root `package.json`
  owns asset builds. Use the installed versions and lockfiles.
- Theme `blocks/` contains block metadata, controls and renderers; `patterns/`
  contains reusable sections and page compositions; `templates/` and `parts/`
  contain WordPress templates and shared structural areas.
- CSS source: theme `src/styles/`; JavaScript source: theme `src/scripts/`.
  Rebuild the corresponding output; avoid editing generated assets alone.
- The `one-202x-pattern-<slug>` classes drive `App/PatternAssets.php` discovery.
  Preserve required markers and existing asset conventions.
- Domain data lives in the relevant `wp-content/mu-plugins/one-*` module. Service
  menu generation belongs with `one-services`; theme CSS owns its presentation.

## A2E conventions

- Every `patterns/page/*.php` file contains only section-pattern references after
  its metadata header and access guard. Keep page-specific copy in named section
  variants; reuse existing variants first. Variants do not inherit base markup.
- Use category `a2e` for A2E-created blocks/patterns. Inherited starter components
  retain their original categories and `one-202x` identifiers.
- Use `theme.json` tokens and layout widths. CSS is readable and nested, with one
  declaration per line. Scope overrides to the relevant component.
- Reuse `one-202x/icon-button` for editable optional icons and the established
  media component for replaceable image/video content. Verify editor controls.
- Figma file: `FpzN44QqMEgWz9ql0QjRhw` (A to E). Use the node supplied for the task.
  Preserve desktop design intent while providing usable mobile layouts.
- Galano Grotesque Regular, Medium, SemiBold and Bold are available. Light and
  Italic are planned references; do not fabricate or download replacement assets.
- Contact links use `/contact-us/`; News / Knowledge Hub links use `/news/`.
- Forms use Gravity Forms; post sharing uses AddToAny. Discover saved IDs rather
  than assuming a default. Social profile URLs remain unset until supplied.
- The contact enquiry form's Subject choices and notification recipient await
  user input. Inspect its current configuration before making changes.
- Booking UI is editable design for a later integration unless the task changes
  that scope. Do not imply that its booking/payment backend is connected.
- The database will be transferred. Do not add automatic defaults/seeding or
  overwrite saved pages/templates. Only perform task-authorized one-off setup.

## Commands and verification

Run commands from the repository root:

- `npm run build:css:patterns` for pattern CSS; use the matching `build:css:*`
  command for other CSS areas. `npm run build:js` builds scripts.
- `npm run check` checks JS/JSON/PHP and reference-only page composition.
- `docker compose run --rm --no-deps wpcli …` runs WordPress CLI commands.
- `git diff --check` checks whitespace in the diff.

For visual changes, check desktop/mobile rendering and content width. For block
markup, verify Gutenberg validity; for fields, prove save/reload/render behaviour.
Do not submit live enquiries or notifications just to test styling. Remove temporary
preview/setup files and close agent-created preview tabs when finished.
