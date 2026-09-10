(function (wp) {
	'use strict';

	const { InspectorControls, useBlockProps } = wp.blockEditor;
	const { registerBlockType } = wp.blocks;
	const { Disabled, Notice, PanelBody, SelectControl, TextControl } = wp.components;
	const { createElement: el, Fragment } = wp.element;
	const { __ } = wp.i18n;
	const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;

	registerBlockType('one-202x/query-filters', {
		edit({ attributes, context, setAttributes }) {
			const query = context?.query;
			const blockProps = useBlockProps();
			let preview;

			if (!query) {
				preview = el(Notice, { status: 'info', isDismissible: false }, __('Place Query Filters inside a Query Loop.', 'one-base-theme'));
			} else if (query.inherit !== false) {
				preview = el(Notice, { status: 'info', isDismissible: false }, __('Choose a custom query source to enable visitor filters. Queries that inherit the archive or search results cannot use these filters.', 'one-base-theme'));
			} else {
				preview = el(Disabled, null, el(ServerSideRender, {
					block: 'one-202x/query-filters',
					attributes: {
						...attributes,
						previewPostType: query.postType || 'post',
						previewQueryId: Number(context?.queryId ?? 0),
					},
				}));
			}

			return el(Fragment, null,
				el(InspectorControls, null,
					el(PanelBody, { title: __('Filter settings', 'one-base-theme'), initialOpen: true },
						el(TextControl, {
							label: __('Heading', 'one-base-theme'),
							value: attributes.heading || '',
							placeholder: __('Categories', 'one-base-theme'),
							onChange: function (heading) { setAttributes({ heading }); },
						}),
						el(SelectControl, {
							label: __('Layout', 'one-base-theme'),
							value: attributes.orientation || 'horizontal',
							options: [
								{ label: __('Horizontal', 'one-base-theme'), value: 'horizontal' },
								{ label: __('Vertical', 'one-base-theme'), value: 'vertical' },
							],
							onChange: function (orientation) { setAttributes({ orientation }); },
						}),
						el('p', null, __('Categories follow the Query Loop content type automatically. Visitors can select several categories and apply them together.', 'one-base-theme'))
					)
				),
				el('div', blockProps, preview)
			);
		},
		save() { return null; },
	});
})(window.wp);
