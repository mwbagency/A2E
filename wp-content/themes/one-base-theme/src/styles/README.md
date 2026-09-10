# CSS conventions

Use native nested CSS throughout the project's stylesheets, including block, pattern, editor and shared styles. Keep related descendants, states and responsive rules inside their component selector. Use `&` for the current element and write complete BEM class names; native nesting does not support Sass-style `&__element` concatenation.

Keep declarations on separate lines with four-space indentation. Preserve selector specificity and cascade order when reorganising existing rules; keep shared rules separate where combining parents would change specificity.

Edit the theme's CSS in this directory and run `npm run prod:css` from the project root. Generated CSS in `assets/` and `blocks/` also retains nesting and readable formatting. The theme's root `style.css` contains WordPress metadata, and `config/custom-media.css` defines the shared breakpoints.
