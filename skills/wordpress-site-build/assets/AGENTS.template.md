# Project guidance

Use `$wordpress-site-build` for WordPress theme, block, pattern and template work.
Fill the project facts below from the repository and the client brief before using
this template. Keep workflow rules in the skill and project-specific facts here.

## Project facts

- Theme path: {{theme_path}}
- Content plugin paths and responsibilities: {{content_plugins}}
- PHP/JS dependency manifests: {{dependency_manifests}}
- CSS and JavaScript source/output paths: {{asset_paths}}
- Block namespace and existing discovery conventions: {{block_conventions}}
- Category for this site's newly created patterns/blocks: {{site_category}}
- Design source and agreed brand assets: {{design_source}}
- Required routes, post types and taxonomies: {{content_contract}}
- Existing forms, sharing and other integrations: {{integrations}}
- Missing assets or deferred integrations: {{known_gaps}}
- Local environment and WordPress CLI command: {{local_runtime}}

## Build and verification

- Relevant asset build commands: {{build_commands}}
- Repository checks: {{check_commands}}
- Page composition check: {{composition_check_command}}
- Browser preview URL and representative pages: {{preview_targets}}

Page patterns contain only section-pattern references after registration metadata
and an optional access guard. Preserve inherited namespaces/categories; apply the
site category to newly created components. Use the theme's design tokens, readable
nested CSS, established icon/media controls and content widths.

Preserve saved records and template customisations. Do not add automatic database
seeding. Resolve missing recipients, external URLs and integration details from
project requirements rather than fabricating values.
