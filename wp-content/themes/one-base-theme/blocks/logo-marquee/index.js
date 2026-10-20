(function (blocks, blockEditor, components, element, i18n, data) {
	'use strict';
	const { createElement: el, Fragment } = element;
	const { InnerBlocks, InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps, useInnerBlocksProps } = blockEditor;
	const { Button, PanelBody, SelectControl, RangeControl } = components;
	const { useSelect, useDispatch, useRegistry } = data;
	const { __ } = i18n;
	blocks.registerBlockType('one-202x/logo-marquee', {
		edit: function Edit({ attributes, setAttributes, clientId }) {
			const registry = useRegistry();
			const children = useSelect((store) => store(blockEditor.store).getBlocks(clientId), [clientId]);
			const { insertBlocks, replaceInnerBlocks } = useDispatch(blockEditor.store);
			const blockProps = useBlockProps({ className: 'one-202x-logo-marquee' });
			const innerBlocksProps = useInnerBlocksProps({ className: 'one-202x-logo-marquee__editor-track' }, {
				allowedBlocks: ['core/image'],
				orientation: 'horizontal',
				templateLock: false,
				renderAppender: false,
			});
			const addImages = (selection) => {
				const images = (Array.isArray(selection) ? selection : [selection])
					.filter((image) => image?.url && (!image.type || image.type === 'image'))
					.map((image) => blocks.createBlock('core/image', {
						id: image.id,
						url: image.url,
						alt: image.alt || '',
						sizeSlug: 'full',
						linkDestination: 'none',
					}));
				if (images.length) {
					insertBlocks(images, registry.select(blockEditor.store).getBlockCount(clientId), clientId);
				}
			};
			// Old saved galleries remain supported. Ungroup only on an editor action,
			// and retain galleries with captions/anchors or non-image content intact.
			const canUngroup = (block) => block.name === 'core/gallery'
				&& !String(block.attributes.caption || '') && !block.attributes.anchor
				&& !block.attributes.dynamicContent && !block.attributes.images?.length
				&& block.innerBlocks.every((child) => child.name === 'core/image');
			const ungroupImages = () => replaceInnerBlocks(clientId,
				registry.select(blockEditor.store).getBlocks(clientId).flatMap((block) => canUngroup(block) ? block.innerBlocks : [block]), false);
			return el(Fragment, null,
				el(InspectorControls, null, el(PanelBody, { title: __('Logo movement', 'one-base-theme') },
					el(SelectControl, {
						label: __('Direction', 'one-base-theme'), value: attributes.direction,
						options: [{ label: __('Right to left', 'one-base-theme'), value: 'left' }, { label: __('Left to right', 'one-base-theme'), value: 'right' }],
						onChange: (direction) => setAttributes({ direction }),
					}),
					el(RangeControl, { label: __('Seconds per loop', 'one-base-theme'), help: __('Higher values move more slowly. The editor stays still; preview the page to see movement.', 'one-base-theme'), value: attributes.duration, min: 10, max: 120, onChange: (duration) => setAttributes({ duration: duration ?? 30 }) })
				)),
				el('div', blockProps,
					el('div', innerBlocksProps),
					el('div', { className: 'one-202x-logo-marquee__editor-actions' },
						el(MediaUploadCheck, null, el(MediaUpload, {
							allowedTypes: ['image'],
							multiple: true,
							onSelect: addImages,
							title: __('Add logos', 'one-base-theme'),
							render: ({ open }) => el(Button, { variant: 'secondary', onClick: open }, __('Add logos', 'one-base-theme')),
						})),
						children.some(canUngroup) && el(Button, { variant: 'tertiary', onClick: ungroupImages }, __('Ungroup existing logos', 'one-base-theme'))
					)
				)
			);
		},
		save: () => el(InnerBlocks.Content),
	});
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n, window.wp.data);
