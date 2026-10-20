(() => {
  // wp-content/themes/one-base-theme/src/scripts/blocks/numbered-cards/index.js
  var { registerBlockType } = window.wp.blocks;
  var { InnerBlocks, InspectorControls, useBlockProps, useInnerBlocksProps } = window.wp.blockEditor;
  var { PanelBody, TextControl } = window.wp.components;
  var { createElement: el, Fragment } = window.wp.element;
  var { __ } = window.wp.i18n;
  registerBlockType("a2e/numbered-cards", {
    edit({ attributes, setAttributes }) {
      const props = useBlockProps();
      const innerProps = useInnerBlocksProps({ className: "a2e-numbered-cards-block__track" }, {
        allowedBlocks: ["a2e/numbered-card"],
        template: [1, 2, 3, 4].map((number) => ["a2e/numbered-card", { number: String(number).padStart(2, "0") }]),
        orientation: "horizontal",
        renderAppender: InnerBlocks.ButtonBlockAppender
      });
      return el(
        Fragment,
        null,
        el(InspectorControls, null, el(
          PanelBody,
          { title: __("Numbered cards settings", "one-base-theme") },
          el(TextControl, {
            label: __("Accessible section label", "one-base-theme"),
            value: attributes.label,
            onChange: (label) => setAttributes({ label })
          })
        )),
        el("section", props, el("div", innerProps))
      );
    },
    save() {
      return el(InnerBlocks.Content);
    }
  });
})();
