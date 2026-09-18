# Editor, data and interactions

## Editable content and media

- Reuse the site's icon-button block so label, URL, icon, optional visibility and
  icon position remain editable. A frontend SVG alone is not an editor control.
- Use the established media component where a design may accept images or video.
  Verify selection, replacement, poster, alt text and editor reload. Use exported
  masks where supplied, scoped to the media rather than the entire section.
- Keep missing optional fields from producing empty wrappers or broken images.
  Apply the precise display condition requested: for example, a card that requires
  both text and a logo should require both, not either.
- Keep reusable cards consistent across query listings, sliders and details views.
  Trace the actual renderer before creating another copy of the same card.

## Content records and queries

- Register content types, taxonomies and fields through the existing content plugin.
  Choose taxonomy for reusable categorical filtering and typed fields for record
  values; do not turn every numerical value into a taxonomy without a requirement.
- Trace field registration, storage key, save handler and frontend retrieval as one
  path. Check capabilities, nonce/REST permission, sanitisation and absent/empty
  values. Test persistence after saving and reopening an actual record or isolated
  fixture. Do not invent lost field values.
- Build listings with WordPress queries and the existing editor query controls.
  Where requested, default to recent records and support manual selection with
  deliberate ordering. Preserve exclusions, pagination and post-type switching.
- Tie filters to their intended query region. Define taxonomy/field mapping,
  AND/OR semantics, selected state and clear/reset behaviour. Multiple queries
  must not accidentally share state or parameter names.
- For dynamic filtering, preserve the URL, back/forward navigation, pagination,
  loading/error/empty states and focus. Use the existing WordPress interactivity
  or query integration before adding a separate framework.
- Friendly parameters must round-trip to valid values and escape output. A shorter
  URL alone must not break query isolation, permalink routes or browser history.

## Navigation and interactive components

- Extend existing navigation markup, controls and responsive behaviour. Keep
  service/category menu generation with its data dependency where appropriate.
- Hover interactions also need focus and touch/click behaviour. Use real buttons
  for toggles, clear expanded state, Escape handling where applicable and logical
  keyboard focus. Check the installed WordPress APIs rather than assuming support
  from a version mentioned in an older task.
- Drag-to-scroll must preserve ordinary links, buttons and media controls. Detect
  intentional dragging with a threshold; suppress only the click caused by that
  drag. Respect touch scrolling, keyboard operation and reduced-motion preferences.
- Where required, only one video may play at a time. Coordinate the actual players
  in use, including supported embeds, and reinitialise safely after dynamic renders.
  Avoid duplicate listeners or a global handler that hijacks unrelated controls.
- In iframe-based editors, use a node's `ownerDocument` and `defaultView`. Do not
  assume the outer admin document owns the edited blocks or their styles.

## Integrations and data setup

Inspect existing forms and plugin configuration before choosing IDs or adding
records. Form fields, validation, confirmations and notifications should remain
editable through the form plugin. Styling belongs in the theme and must cover
validation and confirmation states as well as the initial inputs.

Distinguish building an editable booking/form design from connecting it to a live
service. Follow the requested integration scope. A database that will be migrated
does not need theme-startup recreation of its records. A task-authorized one-off
local creation is different from automatic seeding; verify it once and remove any
temporary setup script.

Use an established sharing plugin when requested rather than implementing a second
sharing system in a custom MU-plugin. Keep social profile links separately editable
from per-post share links. Preserve centrally edited header/footer/social content
through the site's chosen shared mechanism.

For a regression involving these features, identify the real runtime path and
reproduce the failure before changing adjacent layers. A successful asset build
does not prove editor saving, filtering, dragging or form submission works.
