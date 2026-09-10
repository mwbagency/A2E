(function (blocks, blockEditor, components, element, i18n) {
	'use strict';
	const { createElement: el } = element;
	const { InnerBlocks, useBlockProps } = blockEditor;
	const { __ } = i18n;
	blocks.registerBlockType('one-202x/contact-form', {
		edit: function Edit() {
			return el('div', useBlockProps(), blocks.getBlockType('gravityforms/form')
				? el(InnerBlocks, { allowedBlocks: ['gravityforms/form'], template: [['gravityforms/form', { formId: '1', title: false, description: false }]], templateLock: 'all' })
				: el(components.Placeholder, { icon: 'email', label: __('Contact form', 'one-base-theme') }, __('Activate Gravity Forms, then reopen this page to select a form. Form fields, confirmations and notifications are managed in Forms.', 'one-base-theme'))
			);
		},
		save: () => el(InnerBlocks.Content),
	});
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n);
