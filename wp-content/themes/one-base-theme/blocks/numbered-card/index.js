(() => {
  // wp-content/themes/one-base-theme/src/scripts/blocks/numbered-card/index.js
  var { registerBlockType } = window.wp.blocks;
  var { InnerBlocks, InspectorControls, RichText, useBlockProps } = window.wp.blockEditor;
  var { PanelBody, SelectControl } = window.wp.components;
  var { createElement: el, Fragment } = window.wp.element;
  var { __ } = window.wp.i18n;
  var template = [
    ["one-202x/media-cover", { overlayOpacity: 0, lock: { move: true, remove: true } }],
    ["one-202x/icon-button", {
      text: __("Learn more", "one-base-theme"),
      showIcon: false,
      backgroundColor: "base",
      textColor: "contrast",
      lock: { move: true, remove: true }
    }, [["core/icon", { icon: "core/arrow-right", lock: { move: true, remove: true } }]]]
  ];
  registerBlockType("a2e/numbered-card", {
    edit({ attributes, setAttributes }) {
      const { number, title, description, titleLevel } = attributes;
      return el(
        Fragment,
        null,
        el(InspectorControls, null, el(
          PanelBody,
          { title: __("Card settings", "one-base-theme") },
          el(SelectControl, {
            label: __("Heading level", "one-base-theme"),
            value: String(titleLevel),
            options: [2, 3, 4, 5, 6].map((level) => ({ label: "H" + level, value: String(level) })),
            onChange: (value) => setAttributes({ titleLevel: Number(value) })
          })
        )),
        el(
          "article",
          useBlockProps(),
          el(
            "header",
            { className: "a2e-numbered-card-block__heading" },
            el(RichText, {
              tagName: "p",
              className: "a2e-numbered-card-block__number",
              value: number,
              allowedFormats: [],
              placeholder: __("Number\u2026", "one-base-theme"),
              onChange: (value) => setAttributes({ number: value })
            }),
            el(RichText, {
              tagName: "h" + titleLevel,
              className: "a2e-numbered-card-block__title",
              value: title,
              allowedFormats: [],
              placeholder: __("Title\u2026", "one-base-theme"),
              onChange: (value) => setAttributes({ title: value })
            })
          ),
          el(RichText, {
            tagName: "p",
            className: "a2e-numbered-card-block__description",
            value: description,
            allowedFormats: ["core/bold", "core/italic"],
            placeholder: __("Description\u2026", "one-base-theme"),
            onChange: (value) => setAttributes({ description: value })
          }),
          el(InnerBlocks, { template, templateLock: "all", renderAppender: false })
        )
      );
    },
    save() {
      return el(InnerBlocks.Content);
    }
  });
})();
