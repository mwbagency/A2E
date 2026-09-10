(function (blocks, blockEditor, components, element, i18n) {
	'use strict';
	const { createElement: el, Fragment } = element;
	const { InnerBlocks, InspectorControls, useBlockProps } = blockEditor;
	const { PanelBody, SelectControl, RangeControl } = components;
	const { __ } = i18n;
	blocks.registerBlockType('one-202x/logo-marquee', {
		edit: function Edit({ attributes, setAttributes }) {
			return el(Fragment, null,
				el(InspectorControls, null, el(PanelBody, { title: __('Logo movement', 'one-base-theme') },
					el(SelectControl, {
						label: __('Direction', 'one-base-theme'), value: attributes.direction,
						options: [{ label: __('Right to left', 'one-base-theme'), value: 'left' }, { label: __('Left to right', 'one-base-theme'), value: 'right' }],
						onChange: (direction) => setAttributes({ direction }),
					}),
					el(RangeControl, { label: __('Seconds per loop', 'one-base-theme'), help: __('Higher values move more slowly. The editor stays still; preview the page to see movement.', 'one-base-theme'), value: attributes.duration, min: 10, max: 120, onChange: (duration) => setAttributes({ duration: duration ?? 30 }) })
				)),
				el('div', useBlockProps({ className: 'one-202x-logo-marquee' }),
					el(InnerBlocks, { allowedBlocks: ['core/gallery'], template: [['core/gallery', { imageCrop: false, linkTo: 'none' }]], templateLock: 'all' })
				)
			);
		},
		save: () => el(InnerBlocks.Content),
	});
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n);
