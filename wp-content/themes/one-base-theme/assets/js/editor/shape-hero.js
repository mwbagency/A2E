// wp-content/themes/one-base-theme/src/scripts/editor/shape-hero.js
(function(wp) {
  "use strict";
  const { createElement: el, Fragment } = wp.element;
  const { PanelBody, SelectControl } = wp.components;
  const { __, sprintf } = wp.i18n;
  const marker = "one-202x-pattern-hero003_shapebanner";
  const shapeClass = /^a2e-hero003--shape-[1-5]$/;
  const leftClass = "a2e-hero003--media-left";
  wp.hooks.addFilter("editor.BlockEdit", "one-202x/shape-hero", (BlockEdit) => function ShapeHeroEdit(props) {
    const classes = (props.attributes.className || "").split(/\s+/).filter(Boolean);
    const applies = props.name === "core/group" && classes.includes(marker) && !classes.includes("one-202x-pattern-hero007_service-header");
    const shape = classes.find((name) => shapeClass.test(name))?.slice(-1) || "1";
    function updateClasses(remove, next) {
      props.setAttributes({ className: [...classes.filter((name) => !remove(name)), ...next ? [next] : []].join(" ") });
    }
    return el(Fragment, null, el(BlockEdit, props), applies && props.isSelected && el(
      wp.blockEditor.InspectorControls,
      null,
      el(
        PanelBody,
        { title: __("Hero appearance", "one-base-theme"), initialOpen: true },
        el(SelectControl, {
          label: __("Shape", "one-base-theme"),
          value: shape,
          options: [1, 2, 3, 4, 5].map((number) => ({
            value: String(number),
            /* translators: %d: the image mask number. */
            label: sprintf(__("Shape %d", "one-base-theme"), number)
          })),
          onChange: (value) => updateClasses((name) => shapeClass.test(name), value === "1" ? "" : "a2e-hero003--shape-" + value),
          __next40pxDefaultSize: true,
          __nextHasNoMarginBottom: true
        }),
        el(SelectControl, {
          label: __("Image side", "one-base-theme"),
          value: classes.includes(leftClass) ? "left" : "right",
          options: [
            { label: __("Right", "one-base-theme"), value: "right" },
            { label: __("Left", "one-base-theme"), value: "left" }
          ],
          onChange: (value) => updateClasses((name) => name === leftClass, value === "left" ? leftClass : ""),
          help: __("On mobile, the image appears below the text.", "one-base-theme"),
          __next40pxDefaultSize: true,
          __nextHasNoMarginBottom: true
        })
      )
    ));
  });
})(window.wp);
