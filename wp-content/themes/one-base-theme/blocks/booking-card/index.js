(function (blocks, blockEditor, components, element, i18n) {
    'use strict';
    const { createElement: el, Fragment } = element;
    const { InspectorControls, RichText, useBlockProps } = blockEditor;
    const { PanelBody, TextControl } = components;
    const { __ } = i18n;

    blocks.registerBlockType('one-202x/booking-card', {
        edit: function Edit({ attributes, setAttributes, clientId }) {
            const editable = (key, className, placeholder) => el(RichText, {
                tagName: 'span', className, value: attributes[key], allowedFormats: [], placeholder,
                onChange: (value) => setAttributes({ [key]: value }),
            });
            return el(Fragment, null,
                el(InspectorControls, null, el(PanelBody, { title: __('Booking card', 'one-base-theme') },
                    el('p', null, __('This is an editable design. Location, date and checkout controls stay inactive until a booking integration is connected.', 'one-base-theme')),
                    ...[
                        ['badge', __('Price badge', 'one-base-theme')],
                        ['locationLabel', __('Location label', 'one-base-theme')],
                        ['locationPlaceholder', __('Location placeholder', 'one-base-theme')],
                        ['dateLabel', __('Date label', 'one-base-theme')],
                        ['datePlaceholder', __('Date placeholder', 'one-base-theme')],
                        ['buttonText', __('Button text', 'one-base-theme')],
                    ].map(([key, label]) => el(TextControl, { key, label, value: attributes[key], onChange: (value) => setAttributes({ [key]: value }) }))
                )),
                el('div', useBlockProps({ className: 'one-202x-booking-card' }),
                    el('div', { className: 'one-202x-booking-card__header' },
                        el('div', null,
                            el('p', { className: 'one-202x-booking-card__rate' }, editable('rateLabel', '', __('Rate label…', 'one-base-theme'))),
                            el('p', { className: 'one-202x-booking-card__pricing' },
                                editable('price', 'one-202x-booking-card__price', __('Price…', 'one-base-theme')),
                                editable('priceNote', '', __('Price note…', 'one-base-theme'))
                            )
                        ),
                        attributes.badge && el('span', { className: 'one-202x-booking-card__badge' }, attributes.badge)
                    ),
                    ...['location', 'date'].map((field) => el('div', { key: field, className: 'one-202x-booking-card__field' },
                        el('label', { htmlFor: `${clientId}-${field}` }, attributes[`${field}Label`]),
                        el('select', { id: `${clientId}-${field}`, disabled: true }, el('option', null, attributes[`${field}Placeholder`]))
                    )),
                    el('button', { className: 'one-202x-booking-card__button', type: 'button', disabled: true }, attributes.buttonText),
                    el('p', { className: 'one-202x-booking-card__note' }, editable('note', '', __('Booking note…', 'one-base-theme')))
                )
            );
        },
        save: () => null,
    });
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n);
