(function (blocks, blockEditor, components, element, i18n) {
	'use strict';
	const { createElement: el } = element;
	const { RichText, MediaUpload, MediaUploadCheck, useBlockProps } = blockEditor;
	const { Button } = components;
	const { __ } = i18n;

	blocks.registerBlockType('one-202x/quote', {
		edit: function Edit({ attributes, setAttributes }) {
			const { quote, personName, jobDescription, imageId, imageUrl } = attributes;
			return el('figure', useBlockProps({ className: 'one-202x-quote' }),
				el('div', { className: 'one-202x-quote__body' },
					el('div', null,
						imageUrl && el('img', { className: 'one-202x-quote__image', src: imageUrl, alt: '', width: 101, height: 41 }),
						el(MediaUploadCheck, null, el(MediaUpload, {
							allowedTypes: ['image'], value: imageId,
							onSelect: (media) => setAttributes({ imageId: media.id, imageUrl: media.sizes?.medium?.url || media.url }),
							render: ({ open }) => el(Button, { variant: 'secondary', onClick: open }, imageUrl ? __('Replace image', 'one-base-theme') : __('Add image', 'one-base-theme')),
						})),
						imageUrl && el(Button, { variant: 'tertiary', onClick: () => setAttributes({ imageId: 0, imageUrl: '' }) }, __('Remove image', 'one-base-theme'))
					),
					el('blockquote', { className: 'one-202x-quote__text' },
						el(RichText, {
							tagName: 'p', value: quote, allowedFormats: ['core/bold', 'core/italic'],
							placeholder: __('Write the quotation…', 'one-base-theme'),
							onChange: (value) => setAttributes({ quote: value }),
						})
					)
				),
				el('figcaption', { className: 'one-202x-quote__attribution' },
					el('div', null,
						el(RichText, { tagName: 'p', className: 'one-202x-quote__name', value: personName, allowedFormats: [], placeholder: __('Name…', 'one-base-theme'), onChange: (value) => setAttributes({ personName: value }) }),
						el(RichText, { tagName: 'p', className: 'one-202x-quote__job', value: jobDescription, allowedFormats: [], placeholder: __('Job description or organisation…', 'one-base-theme'), onChange: (value) => setAttributes({ jobDescription: value }) })
					)
				)
			);
		},
		save: () => null,
	});
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n);
