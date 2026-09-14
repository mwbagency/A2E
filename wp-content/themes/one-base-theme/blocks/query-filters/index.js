(function (wp) {
    'use strict';

    const { InspectorControls, useBlockProps } = wp.blockEditor;
    const { registerBlockType } = wp.blocks;
    const { Disabled, Notice, PanelBody, SelectControl, TextControl, TextareaControl } = wp.components;
    const { createElement: el, Fragment } = wp.element;
    const { __ } = wp.i18n;
    const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;

    wp.hooks.addFilter('editor.BlockEdit', 'one-202x/query-filter-relation', (BlockEdit) => (props) => {
        if (props.name !== 'core/query' || props.attributes.query?.inherit !== false) {
            return el(BlockEdit, props);
        }
        const query = props.attributes.query;
        return el(Fragment, null, el(BlockEdit, props), el(InspectorControls, null,
            el(PanelBody, { title: __('Visitor filters', 'one-base-theme'), initialOpen: false },
                el(SelectControl, {
                    label: __('Combine active filters', 'one-base-theme'),
                    value: query.filterRelation || 'AND',
                    options: [
                        { label: __('Match all filters (AND)', 'one-base-theme'), value: 'AND' },
                        { label: __('Match any filter (OR)', 'one-base-theme'), value: 'OR' },
                    ],
                    onChange: (filterRelation) => props.setAttributes({ query: { ...query, filterRelation } }),
                    help: __('All content inside this Query Loop shares its filters. Multiple options within one filter match any selected option.', 'one-base-theme'),
                })
            )
        ));
    });

    registerBlockType('one-202x/query-filters', {
        edit({ attributes, context, setAttributes }) {
            const query = context?.query;
            const sources = window.one202xFilterSources?.[query?.postType || 'post'] || {};
            let preview;
            if (!query || query.inherit !== false) {
                preview = el(Notice, { status: 'info', isDismissible: false }, __('Place Query Filters inside a Query Loop with a custom query source.', 'one-base-theme'));
            } else {
                preview = el(Disabled, null, el(ServerSideRender, {
                    block: 'one-202x/query-filters',
                    attributes: { ...attributes, previewPostType: query.postType || 'post', previewQueryId: Number(context?.queryId ?? 0) },
                }));
            }
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: __('Filter settings', 'one-base-theme'), initialOpen: true },
                        el(TextControl, { label: __('Heading', 'one-base-theme'), value: attributes.heading || '', onChange: (heading) => setAttributes({ heading }) }),
                        el(SelectControl, {
                            label: __('Filter source', 'one-base-theme'), value: attributes.source || '',
                            options: [
                                { label: __('Content categories (automatic)', 'one-base-theme'), value: '' },
                                ...Object.entries(sources).map(([value, label]) => ({ value, label: `${label} (${value.startsWith('field:') ? __('custom field', 'one-base-theme') : __('taxonomy', 'one-base-theme')})` })),
                                { label: __('Sort order', 'one-base-theme'), value: 'sort' },
                            ],
                            onChange: (source) => setAttributes({ source }),
                        }),
                        attributes.source?.startsWith('field:') && el(TextareaControl, {
                            label: __('Options: stored value | label, one per line', 'one-base-theme'),
                            value: (attributes.options || []).map((option) => `${option.value}|${option.label}`).join('\n'),
                            onChange: (text) => setAttributes({ options: text.split('\n').map((line) => {
                                const [value, ...label] = line.split('|');
                                return { value: value.trim(), label: label.join('|').trim() || value.trim() };
                            }) }),
                            help: __('Use exact stored values. Only public scalar fields are available; ranges belong in taxonomies.', 'one-base-theme'),
                        }),
                        el(SelectControl, {
                            label: __('Layout', 'one-base-theme'), value: attributes.orientation || 'horizontal',
                            options: [{ label: __('Horizontal', 'one-base-theme'), value: 'horizontal' }, { label: __('Vertical', 'one-base-theme'), value: 'vertical' }],
                            onChange: (orientation) => setAttributes({ orientation }),
                        }),
                        el('p', null, __('Keep the banner, filters and results inside the same Query Loop so they update together.', 'one-base-theme'))
                    )
                ),
                el('div', useBlockProps(), preview)
            );
        },
        save() { return null; },
    });
})(window.wp);
