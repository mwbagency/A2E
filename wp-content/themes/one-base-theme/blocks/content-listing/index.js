(function (wp) {
	'use strict';

	const { InspectorControls, useBlockProps } = wp.blockEditor;
	const { getBlockType, registerBlockType } = wp.blocks;
	const { Disabled, PanelBody, RangeControl, SelectControl, ToggleControl } = wp.components;
	const { createElement: el, Fragment } = wp.element;
	const { __ } = wp.i18n;
	const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;
	const BLOCK_NAME = 'one-202x/content-listing';
	const POST_TYPE_LABELS = {
		case_study: __('Case studies', 'one-base-theme'),
		event: __('Events', 'one-base-theme'),
		service: __('Services', 'one-base-theme'),
		team_member: __('Team members', 'one-base-theme'),
		testimonial: __('Testimonials', 'one-base-theme'),
	};

	function postTypeOptions() {
		const blockType = getBlockType(BLOCK_NAME);
		const allowed = blockType?.attributes?.postType?.enum || [];

		return allowed.map(function (postType) {
			return {
				label: POST_TYPE_LABELS[postType] || postType,
				value: postType,
			};
		});
	}

	registerBlockType(BLOCK_NAME, {
		edit: function Edit({ attributes, setAttributes }) {
			const blockProps = useBlockProps({
				className: 'one-202x-content-listing__editor',
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
							title: __('Listing settings', 'one-base-theme'),
							initialOpen: true,
						},
						el(SelectControl, {
							label: __('Content type', 'one-base-theme'),
							value: attributes.postType || 'case_study',
							options: postTypeOptions(),
							onChange: (value) => setAttributes({ postType: value }),
						}),
						el(RangeControl, {
							label: __('Items per page', 'one-base-theme'),
							value: Number(attributes.limit || 6),
							min: 1,
							max: 12,
							onChange: (value) => setAttributes({ limit: Number(value) || 6 }),
						}),
						el(SelectControl, {
							label: __('Columns', 'one-base-theme'),
							value: String(attributes.columns || 3),
							options: [1, 2, 3, 4].map(function (columns) {
								return {
									label: String(columns),
									value: String(columns),
								};
							}),
							onChange: (value) => setAttributes({ columns: Number(value) }),
						}),
						el(ToggleControl, {
							label: __('Show category filters', 'one-base-theme'),
							checked: attributes.showFilters !== false,
							onChange: (value) => setAttributes({ showFilters: value }),
						}),
						el(SelectControl, {
							label: __('Card heading level', 'one-base-theme'),
							help: __('Choose the level that follows the heading above this listing.', 'one-base-theme'),
							value: String(attributes.headingLevel || 3),
							options: [2, 3, 4, 5, 6].map(function (level) {
								return { label: 'H' + level, value: String(level) };
							}),
							onChange: (value) => setAttributes({ headingLevel: Number(value) }),
						}),
						el(ToggleControl, {
							label: __('Show pagination', 'one-base-theme'),
							checked: attributes.showPagination !== false,
							onChange: (value) => setAttributes({ showPagination: value }),
						})
					)
				),
				el(
					'div',
					blockProps,
					el(Disabled, null,
						el(ServerSideRender, {
							block: BLOCK_NAME,
							attributes,
						})
					)
				)
			);
		},

		save: function Save() {
			return null;
		},
	});
})(window.wp);
