const { registerBlockType } = window.wp.blocks;
const { InnerBlocks, InspectorControls, RichText, useBlockProps } = window.wp.blockEditor;
const { PanelBody, SelectControl } = window.wp.components;
const { createElement: el, Fragment } = window.wp.element;
const { __ } = window.wp.i18n;

const template = [
    ['one-202x/media-cover', { overlayOpacity: 0, lock: { move: true, remove: true } }],
    ['one-202x/icon-button', {
        text: __('Learn more', 'one-base-theme'), showIcon: false,
        backgroundColor: 'base', textColor: 'contrast',
        lock: { move: true, remove: true },
    }, [['core/icon', { icon: 'core/arrow-right', lock: { move: true, remove: true } }]]],
];

registerBlockType('a2e/numbered-card', {
    edit({ attributes, setAttributes }) {
        const { number, title, description, titleLevel } = attributes;
        return el(Fragment, null,
            el(InspectorControls, null, el(PanelBody, { title: __('Card settings', 'one-base-theme') },
                el(SelectControl, {
                    label: __('Heading level', 'one-base-theme'), value: String(titleLevel),
                    options: [2, 3, 4, 5, 6].map((level) => ({ label: 'H' + level, value: String(level) })),
                    onChange: (value) => setAttributes({ titleLevel: Number(value) }),
                })
            )),
            el('article', useBlockProps(),
                el('header', { className: 'a2e-numbered-card-block__heading' },
                    el(RichText, {
                        tagName: 'p', className: 'a2e-numbered-card-block__number',
                        value: number, allowedFormats: [], placeholder: __('Number…', 'one-base-theme'),
                        onChange: (value) => setAttributes({ number: value }),
                    }),
                    el(RichText, {
                        tagName: 'h' + titleLevel, className: 'a2e-numbered-card-block__title',
                        value: title, allowedFormats: [], placeholder: __('Title…', 'one-base-theme'),
                        onChange: (value) => setAttributes({ title: value }),
                    })
                ),
                el(RichText, {
                    tagName: 'p', className: 'a2e-numbered-card-block__description',
                    value: description, allowedFormats: ['core/bold', 'core/italic'],
                    placeholder: __('Description…', 'one-base-theme'),
                    onChange: (value) => setAttributes({ description: value }),
                }),
                el(InnerBlocks, { template, templateLock: 'all', renderAppender: false })
            )
        );
    },
    save() {
        return el(InnerBlocks.Content);
    },
});
