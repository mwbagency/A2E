# CSS conventions

Use native nested CSS throughout the project's stylesheets, including block, pattern, editor and shared styles. Keep related descendants, states and responsive rules inside their component selector. Use `&` for the current element and write complete BEM class names; native nesting does not support Sass-style `&__element` concatenation.

Keep declarations on separate lines with four-space indentation. Preserve selector specificity and cascade order when reorganising existing rules; keep shared rules separate where combining parents would change specificity.

Edit the theme's CSS in this directory and run `npm run prod:css` from the project root. Generated CSS in `assets/` and `blocks/` also retains nesting and readable formatting. The theme's root `style.css` contains WordPress metadata, and `config/custom-media.css` defines the shared breakpoints.

## A2E visual system

The shared styling follows the [updated Figma homepage](https://www.figma.com/design/FpzN44QqMEgWz9ql0QjRhw/A-to-E?node-id=9021-9762).
`theme.json` owns the 1296px wide layout, 25px card/media/panel corners,
12px field corners and 100px pill controls. Reuse these tokens across sections.

| Component | Shared styling |
| --- | --- |
| Course/programme cards | Rounded image panels, category pills, titles at the top, facts and translucent price pills at the bottom. Category colours follow the category slug, including in reordered queries. |
| Article, team and page cards | Shared card and media corners; circular team portraits retain their shape. |
| Numbered cards | The section pattern and custom block use the same corner tokens. |
| Media sections and timelines | Rounded media, including Media Cover and ordinary Image blocks. Hero masks and logos retain their existing geometry. |
| Testimonials | Rounded outlined quotes, green attribution, and exported puzzle details on the scrolling section. |
| Forms, booking and FAQs | Shared field, card and control tokens, including native Details blocks and the course overview panel. |
| Listing controls | Red primary submits, outlined load-more links, and 44px pill pagination in Query Loop blocks. Category selection controls retain their blue selected state. |
| Navigation | Rounded dropdown panels, 1px dividers, and shared search-field corners; existing nested-menu behaviour stays in place. |
| Native media and service categories | Featured Image, Video, Media & Text and inset Cover blocks use the media corners. Full-width covers and masked heroes keep their intended edges; term cards use card corners. |
| Inner-page headings | Article, simple-page and service-step headings use the available SemiBold weight, matching the shared heading system. |
| Call to action | Full-width clinical-team photograph, gradient, left heading and lower-right copy/actions; stacked mobile layout. The Group background-image control can replace the photograph. |
| Footer | White brand panel and exported puzzle edge against the blue link/contact area; stacked panels on smaller screens. |

The exported decorative artwork is in `assets/images/design/`. Photos and copy
already saved on pages remain instance content. Styling changes do not require
new patterns or automatic content migrations. Bump a custom block's metadata
version when its registered CSS changes so browsers request the rebuilt file.
