(function (wp) {
	'use strict';
	const { createElement: el, Fragment } = wp.element;
	const { InspectorControls, useBlockProps } = wp.blockEditor;
	const { Disabled, PanelBody, Placeholder, SelectControl } = wp.components;
	const { __ } = wp.i18n;
	const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;
	wp.blocks.registerBlockType('one-202x/contact-details', {
		edit({ attributes, setAttributes }) {
			return el(Fragment, null,
				el(InspectorControls, null, el(PanelBody, { title: __('Shared contact details', 'one-base-theme') },
					el(SelectControl, {
						label: __('Show', 'one-base-theme'), value: attributes.display,
						options: [
							{ label: __('All contact details', 'one-base-theme'), value: 'all' },
							{ label: __('Locations', 'one-base-theme'), value: 'locations' },
							{ label: __('Telephone numbers', 'one-base-theme'), value: 'phones' },
							{ label: __('Email addresses', 'one-base-theme'), value: 'emails' },
							{ label: __('Primary telephone link', 'one-base-theme'), value: 'primary-phone' },
						], onChange: (display) => setAttributes({ display }),
					}),
					el('p', null, __('Ask a site administrator to update Site contacts in the WordPress dashboard. Changes appear everywhere this block is used.', 'one-base-theme'))
				)),
				el('div', useBlockProps(), el(Disabled, null, el(ServerSideRender, {
					block: 'one-202x/contact-details', attributes,
					EmptyResponsePlaceholder: () => el(Placeholder, { icon: 'location', label: __('Shared Contact Details', 'one-base-theme') }, __('Add business details in Dashboard → Site contacts. Empty details are hidden on the website.', 'one-base-theme')),
				})))
			);
		},
		save() { return null; },
	});
})(window.wp);
