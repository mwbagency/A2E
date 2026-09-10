# A2E service structure

Use two levels of **Service categories**, followed by a **Service** record:

`Resuscitation Training → Level 3 — Intermediate Life Support → Immediate Life Support (ILS) — RCUK`

The Figma brochure notes explicitly distinguish category hub templates (section 7.8) from individual course profiles (section 7.9). Levels 2, 3 and 4 are category hubs. Individual courses retain one service record and URL and can appear in more than one relevant category. Service areas without training levels can contain services directly.

Reference: [Figma Services dropdown](https://www.figma.com/design/FpzN44QqMEgWz9ql0QjRhw/A-to-E?node-id=8960-13522), with the template notes elsewhere on the Brochure page.

## Editing

- **Services → Service categories:** edit the seven service areas, choose a parent for a training level, and set Menu order. Lower numbers appear first in the dropdown.
- **Services:** edit each course, assign its most specific category, and use the Order field to sort courses within the menu. Only published, unprotected services appear. Assigning both a parent and its child does not duplicate a course in the same branch.
- **Appearance → Editor → Navigation:** the Services link uses the **A2E Services dropdown** style. Its children are generated from the catalogue when rendered. The link label and the rest of the saved navigation remain editable normally.
- The service archive and category archives use native Terms Query blocks plus the existing Content Card query loop. The new **Service categories** pattern is under **A2E**. Inherited patterns retain their original categories.

## Site content and migration

The categories, courses, menus, logo and site icon are managed in the existing WordPress database. Transfer the database and uploads with the site. There is no theme activation or admin setup routine to populate defaults, import assets, create courses or rewrite saved navigation.

The head and drawer reference the same native Primary navigation (`ref: 20`) and Utility navigation (`ref: 21`) records. These references travel with the same database and remain selectable in the Site Editor. The nine existing Level 3 course records still need their final editorial content; the remaining catalogue is added through Services.

The MU plugin owns the service data, category ordering and `ServicesMenu` integration. `ServicesMenu` maps the catalogue to native Navigation submenus, including WordPress's submenu icons, interactivity and focus handling. The theme owns the dropdown and drawer CSS and archive templates. No extra block or navigation script is registered.
