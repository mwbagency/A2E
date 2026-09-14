(function (wp) {
    const { createElement: el, Fragment } = wp.element;
    const { __ } = wp.i18n;
    wp.blocks.registerBlockType('one-202x/query-results', {
        edit({ attributes, setAttributes }) {
            return el(Fragment, null,
                el(wp.blockEditor.InspectorControls, null, el(wp.components.PanelBody, { title: __('Result count', 'one-base-theme') },
                    el(wp.components.TextControl, { label: __('Content label', 'one-base-theme'), value: attributes.itemLabel, onChange: (itemLabel) => setAttributes({ itemLabel }) })
                )),
                el('div', wp.blockEditor.useBlockProps({ className: 'a2e-query-results' }),
                    el(wp.blockEditor.InnerBlocks, {
                        allowedBlocks: ['one-202x/icon-button'], templateLock: 'all',
                        template: [['one-202x/icon-button', { text: __('Load more', 'one-base-theme'), showIcon: false, iconPosition: 'right', className: 'a2e-query-results__more', backgroundColor: 'base', textColor: 'contrast' }, [['core/icon', { icon: 'core/arrow-right', lock: { move: true, remove: true } }]]]],
                    }),
                    el('p', null, __('The count is calculated from the filtered results.', 'one-base-theme'))
                )
            );
        },
        save() { return el(wp.blockEditor.InnerBlocks.Content); },
    });
})(window.wp);
