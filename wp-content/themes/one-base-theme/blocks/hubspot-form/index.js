(function (blocks, blockEditor, components, element, i18n) {
	'use strict';
	const { createElement: el, useState } = element;
	const { Placeholder, TextareaControl, Button, Notice } = components;
	const { __, sprintf } = i18n;

	// Parse inert markup. Pasted scripts are never inserted into the page or evaluated.
	function parseEmbed(code) {
		const template = document.createElement('template');
		template.innerHTML = code;
		const frame = template.content.querySelector('.hs-form-frame');
		let settings;
		if (frame) {
			settings = { portalId: frame.dataset.portalId || '', formId: frame.dataset.formId || '', region: frame.dataset.region || 'na1', embedType: 'current', locale: '' };
		} else {
			const config = code.match(/hbspt\.forms\.create\s*\(\s*\{([\s\S]*?)\}\s*\)/)?.[1];
			if (!config) return null;
			const value = (key) => config.match(new RegExp('(?:^|[,\\s])(?:["\x27]?' + key + '["\x27]?)\\s*:\\s*["\x27]([^"\x27]+)["\x27]'))?.[1] || '';
			settings = { portalId: value('portalId'), formId: value('formId'), region: value('region') || 'na1', embedType: 'legacy', locale: value('locale') };
		}
		return /^\d{1,20}$/.test(settings.portalId)
			&& /^[a-f\d]{8}(?:-[a-f\d]{4}){3}-[a-f\d]{12}$/i.test(settings.formId)
			&& /^[a-z]{2}\d{1,2}$/.test(settings.region)
			&& (!settings.locale || /^[a-z]{2,3}(?:[-_][a-z\d]{2,8})*$/i.test(settings.locale)) ? settings : null;
	}

	blocks.registerBlockType('one-202x/hubspot-form', {
		edit: function Edit({ attributes, setAttributes }) {
			const [code, setCode] = useState('');
			const [error, setError] = useState(false);
			return el('div', blockEditor.useBlockProps(),
				el(Placeholder, { icon: 'feedback', label: __('HubSpot form', 'one-base-theme') },
					attributes.formId && el('p', null, sprintf(
						/* translators: 1: HubSpot account ID, 2: HubSpot form ID. */
						__('Connected to account %1$s, form %2$s. Preview the page to see the form.', 'one-base-theme'), attributes.portalId, attributes.formId
					)),
					el(TextareaControl, { label: __('HubSpot embed code', 'one-base-theme'), help: __('Paste the standard embed code from HubSpot. Current and legacy forms are supported. Custom JavaScript callbacks are not imported.', 'one-base-theme'), value: code, onChange: setCode, rows: 6 }),
					error && el(Notice, { status: 'error', isDismissible: false }, __('This code does not contain a supported HubSpot form. Copy the complete standard embed code from HubSpot and try again.', 'one-base-theme')),
					el(Button, { variant: 'primary', disabled: !code.trim(), onClick: () => {
						const settings = parseEmbed(code);
						setError(!settings);
						if (settings) { setAttributes(settings); setCode(''); }
					} }, attributes.formId ? __('Replace form', 'one-base-theme') : __('Use this form', 'one-base-theme')),
					attributes.formId && el(Button, { variant: 'tertiary', onClick: () => { setAttributes({ portalId: '', formId: '', region: 'na1', embedType: 'current', locale: '' }); setError(false); } }, __('Remove form', 'one-base-theme'))
				)
			);
		},
		save: () => null,
	});
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n);
