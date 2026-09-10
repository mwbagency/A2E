(function (blocks, blockEditor, components, element, i18n) {
	'use strict';

	const { registerBlockType } = blocks;
	const {
		InnerBlocks,
		InspectorControls,
		RichText,
		useBlockProps,
	} = blockEditor;
	const { PanelBody, SelectControl, ToggleControl } = components;
	const { createElement: el, Fragment } = element;
	const { __ } = i18n;

	const BUTTON_TEMPLATE = [
		[
			'one-202x/icon-button',
			{
				iconPosition: 'right',
				text: __('Learn more', 'one-base-theme'),
			},
			[
				[
					'core/icon',
					{
						icon: 'core/arrow-up-right',
						lock: { move: true, remove: true },
					},
				],
			],
		],
	];

	// Attribute defaults are not among block.json's automatically translated fields.
	window.wp.hooks.addFilter(
		'blocks.registerBlockType',
		'one-202x/section-intro-defaults',
		function (settings, name) {
			if (name !== 'one-202x/section-intro') {
				return settings;
			}

			return {
				...settings,
				attributes: {
					...settings.attributes,
					title: { ...settings.attributes.title, default: __('Section title', 'one-base-theme') },
				},
			};
		}
	);

	registerBlockType('one-202x/section-intro', {
		edit: function Edit({ attributes, setAttributes }) {
			const {
				alignment = 'left',
				description = '',
				showButton = true,
				showDescription = true,
				showSubtitle = true,
				subtitle = '',
				title = '',
				titleLevel = 2,
			} = attributes;
			const blockProps = useBlockProps({
				className: 'one-202x-section-intro has-text-align-' + alignment,
			});

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{
							title: __('Section intro settings', 'one-base-theme'),
							initialOpen: true,
						},
						el(SelectControl, {
							label: __('Alignment', 'one-base-theme'),
							value: alignment,
							options: [
								{ label: __('Start', 'one-base-theme'), value: 'left' },
								{ label: __('Centre', 'one-base-theme'), value: 'center' },
							],
							onChange: (value) => setAttributes({ alignment: value }),
						}),
						el(SelectControl, {
							label: __('Heading level', 'one-base-theme'),
							value: String(titleLevel),
							options: [2, 3, 4, 5, 6].map(function (level) {
								return { label: 'H' + level, value: String(level) };
							}),
							onChange: (value) => setAttributes({ titleLevel: Number(value) }),
						}),
						el(ToggleControl, {
							label: __('Show subtitle', 'one-base-theme'),
							checked: showSubtitle,
							onChange: (value) => setAttributes({ showSubtitle: value }),
						}),
						el(ToggleControl, {
							label: __('Show description', 'one-base-theme'),
							checked: showDescription,
							onChange: (value) => setAttributes({ showDescription: value }),
						}),
						el(ToggleControl, {
							label: __('Show button', 'one-base-theme'),
							checked: showButton,
							onChange: (value) => setAttributes({ showButton: value }),
						})
					)
				),
				el(
					'div',
					blockProps,
					showSubtitle &&
						el(RichText, {
							tagName: 'p',
							className: 'one-202x-section-intro__subtitle is-style-eyebrow',
							allowedFormats: [],
							value: subtitle,
							placeholder: __('Optional subtitle…', 'one-base-theme'),
							onChange: (value) => setAttributes({ subtitle: value }),
						}),
					el(RichText, {
						tagName: 'h' + titleLevel,
						className: 'one-202x-section-intro__title',
						allowedFormats: [],
						value: title,
						placeholder: __('Section title…', 'one-base-theme'),
						onChange: (value) => setAttributes({ title: value }),
					}),
					showDescription &&
						el(RichText, {
							tagName: 'p',
							className: 'one-202x-section-intro__description',
							value: description,
							placeholder: __('Optional description…', 'one-base-theme'),
							onChange: (value) => setAttributes({ description: value }),
						}),
					showButton &&
						el(
							'div',
							{ className: 'one-202x-section-intro__actions' },
							el(InnerBlocks, {
								allowedBlocks: ['one-202x/icon-button'],
								renderAppender: false,
								template: BUTTON_TEMPLATE,
								templateLock: 'all',
							})
						)
				)
			);
		},

		save: function Save() {
			return el(InnerBlocks.Content);
		},
	});
})(
	window.wp.blocks,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.element,
	window.wp.i18n
);
