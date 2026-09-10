(function (blocks, blockEditor, components, coreData, data, element, i18n) {
	'use strict';

	const { registerBlockType } = blocks;
	const {
		BlockControls,
		InnerBlocks,
		InspectorControls,
		LinkControl,
		RichText,
		useBlockProps,
	} = blockEditor;
	const {
		Button,
		ButtonGroup,
		Modal,
		PanelBody,
		Popover,
		SearchControl,
		SelectControl,
		Spinner,
		TextControl,
		ToolbarButton,
		ToggleControl,
	} = components;
	const { useDispatch, useSelect } = data;
	const { createElement: el, Fragment, useEffect, useMemo, useState } = element;
	const { __, sprintf } = i18n;

	const ALLOWED_BLOCKS = ['core/icon'];
	const ICON_TEMPLATE = [
		[
			'core/icon',
			{
				icon: 'core/arrow-up-right',
				lock: { move: true, remove: true },
			},
		],
	];

	function IconLibrary({ onChange, onClose, value }) {
		const [search, setSearch] = useState('');
		const [collection, setCollection] = useState(
			value ? value.split('/')[0] : ''
		);

		const collections = useSelect(function (select) {
			return (
				select(coreData.store).getEntityRecords('root', 'iconCollection') || []
			);
		}, []);

		const query = collection ? { collection } : {};
		const iconData = useSelect(
			function (select) {
				const store = select(coreData.store);

				return {
					icons: store.getEntityRecords('root', 'icon', query) || [],
					isResolved: store.hasFinishedResolution('getEntityRecords', [
						'root',
						'icon',
						query,
					]),
				};
			},
			[collection]
		);

		const filteredIcons = useMemo(
			function () {
				const normalizedSearch = search.trim().toLowerCase();

				if (!normalizedSearch) {
					return iconData.icons;
				}

				return iconData.icons.filter(function (icon) {
					return (
						icon.name.toLowerCase().includes(normalizedSearch) ||
						icon.label.toLowerCase().includes(normalizedSearch)
					);
				});
			},
			[iconData.icons, search]
		);

		const collectionOptions = [
			{ label: __('All icons', 'one-base-theme'), value: '' },
		].concat(
			collections.map(function (iconCollection) {
				return {
					label: iconCollection.label,
					value: iconCollection.slug,
				};
			})
		);

		return el(
			Modal,
			{
				title: __('Choose an icon', 'one-base-theme'),
				className: 'one-202x-icon-button__icon-modal',
				isFullScreen: true,
				onRequestClose: onClose,
			},
			el(
				'div',
				{ className: 'one-202x-icon-button__icon-library' },
				el(
					'div',
					{ className: 'one-202x-icon-button__icon-library-sidebar' },
					el(SearchControl, {
						label: __('Search icons', 'one-base-theme'),
						value: search,
						onChange: setSearch,
					}),
					el(SelectControl, {
						label: __('Icon collection', 'one-base-theme'),
						value: collection,
						options: collectionOptions,
						onChange: setCollection,
					})
				),
				el(
					'div',
					{ className: 'one-202x-icon-button__icon-library-results' },
					!iconData.isResolved &&
						el(
							'div',
							{
								className: 'one-202x-icon-button__icon-library-loading',
								role: 'status',
								'aria-label': __('Loading icons…', 'one-base-theme'),
							},
							el(Spinner)
						),
					iconData.isResolved && filteredIcons.length === 0 &&
						el('p', null, __('No icons found.', 'one-base-theme')),
					iconData.isResolved && filteredIcons.length > 0 &&
						el(
							'div',
							{
								className: 'one-202x-icon-button__icon-library-grid',
								'aria-label': __('Icon library', 'one-base-theme'),
							},
							filteredIcons.map(function (icon) {
								return el(
									Button,
									{
										key: icon.name,
										className: 'one-202x-icon-button__icon-library-item',
										variant: icon.name === value ? 'primary' : 'secondary',
										'aria-pressed': icon.name === value,
										/* translators: 1: icon label, 2: icon collection label. */
										'aria-label': sprintf(__('%1$s (%2$s)', 'one-base-theme'), icon.label,
											collections.find(function (item) { return item.slug === icon.collection; })?.label || icon.collection),
										onClick: function () {
											onChange(icon.name);
										},
									},
									el('span', {
										className: 'one-202x-icon-button__icon-library-preview',
										'aria-hidden': true,
										dangerouslySetInnerHTML: { __html: icon.content },
									}),
									el(
										'span',
										{ className: 'one-202x-icon-button__icon-library-label' },
										icon.label
									)
								);
							})
						)
				)
			)
		);
	}

	// Attribute defaults are not among block.json's automatically translated fields.
	window.wp.hooks.addFilter(
		'blocks.registerBlockType',
		'one-202x/icon-button-defaults',
		function (settings, name) {
			if (name !== 'one-202x/icon-button') {
				return settings;
			}

			return {
				...settings,
				attributes: {
					...settings.attributes,
					text: { ...settings.attributes.text, default: __('Learn more', 'one-base-theme') },
				},
			};
		}
	);

	registerBlockType('one-202x/icon-button', {
		edit: function Edit({ attributes, clientId, isSelected, setAttributes }) {
			const {
				iconPosition = 'left',
				linkTarget = '',
				rel = '',
				showIcon = true,
				text = '',
				url = '',
			} = attributes;
			const [isIconLibraryOpen, setIconLibraryOpen] = useState(false);
			const [isEditingURL, setIsEditingURL] = useState(false);
			const [popoverAnchor, setPopoverAnchor] = useState(null);
			const iconBlock = useSelect(
				function (select) {
					return select(blockEditor.store)
						.getBlocks(clientId)
						.find(function (innerBlock) {
							return innerBlock.name === 'core/icon';
						});
				},
				[clientId]
			);
			const { updateBlockAttributes } = useDispatch(blockEditor.store);
			const selectedIcon = iconBlock ? iconBlock.attributes.icon : '';
			const linkValue = useMemo(
				function () {
					return {
						url,
						opensInNewTab: linkTarget === '_blank',
					};
				},
				[linkTarget, url]
			);

			useEffect(
				function () {
					if (!isSelected) {
						setIsEditingURL(false);
					}
				},
				[isSelected]
			);

			const blockProps = useBlockProps({
				className: showIcon ? 'has-icon-' + iconPosition : 'has-no-icon',
				ref: setPopoverAnchor,
			});

			return el(
				Fragment,
				null,
				el(
					BlockControls,
					{ group: 'block' },
					el(ToolbarButton, {
						icon: 'admin-links',
						label: url
							? __('Edit link', 'one-base-theme')
							: __('Add link', 'one-base-theme'),
						isPressed: isEditingURL,
						onClick: function () {
							setIsEditingURL(!isEditingURL);
						},
					})
				),
				isSelected &&
					isEditingURL &&
					el(
						Popover,
						{
							anchor: popoverAnchor,
							placement: 'bottom',
							focusOnMount: 'firstElement',
							shift: true,
							__unstableSlotName: '__unstable-block-tools-after',
							onClose: function () {
								setIsEditingURL(false);
							},
						},
						el(LinkControl, {
							value: linkValue,
							forceIsEditingLink: true,
							settings: LinkControl.DEFAULT_LINK_SETTINGS,
							onChange: function (newLink) {
								setAttributes({
									url: newLink.url || '',
									linkTarget: newLink.opensInNewTab ? '_blank' : '',
								});
							},
							onRemove: function () {
								setAttributes({
									url: '',
									linkTarget: '',
									rel: '',
								});
								setIsEditingURL(false);
							},
						})
					),
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{
							title: __('Link settings', 'one-base-theme'),
							initialOpen: true,
						},
						el(TextControl, {
							label: __('URL', 'one-base-theme'),
							help: __('Enter a relative path or a full URL.', 'one-base-theme'),
							value: url,
							onChange: (value) => setAttributes({ url: value }),
						}),
						el(ToggleControl, {
							label: __('Open in a new tab', 'one-base-theme'),
							checked: linkTarget === '_blank',
							onChange: function (opensInNewTab) {
								setAttributes({
									linkTarget: opensInNewTab ? '_blank' : '',
								});
							},
						}),
						el(TextControl, {
							label: __('Link relationship', 'one-base-theme'),
							help: __('For example: nofollow or sponsored.', 'one-base-theme'),
							value: rel,
							onChange: (value) => setAttributes({ rel: value }),
						})
					),
					el(
						PanelBody,
						{
							title: __('Icon settings', 'one-base-theme'),
							initialOpen: true,
						},
						el(ToggleControl, {
							label: __('Show icon', 'one-base-theme'),
							checked: showIcon,
							onChange: (value) => setAttributes({ showIcon: value }),
						}),
						showIcon && el(
							Button,
							{
								variant: 'secondary',
								disabled: !iconBlock,
								'aria-haspopup': 'dialog',
								onClick: function () {
									setIconLibraryOpen(true);
								},
							},
							selectedIcon
								? __('Change icon', 'one-base-theme')
								: __('Choose icon', 'one-base-theme')
						),
						showIcon && selectedIcon &&
							el(
								'p',
								{ className: 'components-base-control__help' },
								__('Current icon:', 'one-base-theme') + ' ' + selectedIcon
							),
						showIcon && el(
							'div',
							{ className: 'one-202x-icon-button__position-control' },
							el(
								'p',
								{ className: 'components-base-control__label' },
								__('Icon position', 'one-base-theme')
							),
							el(
								ButtonGroup,
								{
									'aria-label': __('Icon position', 'one-base-theme'),
								},
								[
									{ value: 'left', label: __('Before text', 'one-base-theme') },
									{ value: 'right', label: __('After text', 'one-base-theme') },
								].map(({ value, label }) => el(Button, {
									key: value,
									variant: iconPosition === value ? 'primary' : 'secondary',
									'aria-pressed': iconPosition === value,
									onClick: () => setAttributes({ iconPosition: value }),
								}, label))
							)
						)
					)
				),
				el(
					'div',
					blockProps,
					showIcon &&
						el(InnerBlocks, {
							allowedBlocks: ALLOWED_BLOCKS,
							renderAppender: false,
							template: ICON_TEMPLATE,
							templateLock: 'all',
						}),
					el(RichText, {
						tagName: 'span',
						className: 'one-202x-icon-button__label',
						allowedFormats: [],
						value: text,
						placeholder: __('Button text…', 'one-base-theme'),
						onChange: (value) => setAttributes({ text: value }),
					})
				),
				showIcon && isIconLibraryOpen &&
					el(IconLibrary, {
						value: selectedIcon,
						onClose: function () {
							setIconLibraryOpen(false);
						},
						onChange: function (icon) {
							if (iconBlock) {
								updateBlockAttributes(iconBlock.clientId, { icon });
							}
							setIconLibraryOpen(false);
						},
					})
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
	window.wp.coreData,
	window.wp.data,
	window.wp.element,
	window.wp.i18n
);
