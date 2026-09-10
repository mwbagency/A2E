(function (wp) {
	'use strict';
	const { createElement: el, Fragment, useEffect, useState } = wp.element;
	const { Button, ComboboxControl, Notice, PanelBody, RangeControl, Spinner } = wp.components;
	const { __, sprintf } = wp.i18n;
	const { addQueryArgs } = wp.url;
	const namespace = 'one-202x/selected-content';
	const title = (value) => wp.htmlEntities.decodeEntities(String(value || '').replace(/<[^>]*>/g, ' ')).trim();

	wp.blocks.registerBlockVariation('core/query', {
		name: namespace,
		title: __('Selected or latest content', 'one-base-theme'),
		description: __('Choose content in order, or leave the selection empty to show recent items.', 'one-base-theme'),
		attributes: { namespace },
		isActive: ['namespace'],
		allowedControls: [],
		scope: [], // Insert the complete section through Patterns.
	});

	function Selection({ query, setAttributes }) {
		const ids = Array.isArray(query.include) ? query.include : [];
		const [input, setInput] = useState('');
		const [search, setSearch] = useState('');
		const [type, setType] = useState(null);
		const [records, setRecords] = useState([]);
		const [selected, setSelected] = useState([]);
		const [loading, setLoading] = useState(true);
		const [error, setError] = useState(false);
		const selectedKey = ids.join(',');

		useEffect(() => {
			const timer = window.setTimeout(() => setSearch(input.trim()), 250);
			return () => window.clearTimeout(timer);
		}, [input]);
		useEffect(() => {
			const controller = new AbortController();
			setType(null);
			setError(false);
			wp.apiFetch({ path: '/wp/v2/types/' + encodeURIComponent(query.postType), signal: controller.signal })
				.then(setType).catch(() => { if (!controller.signal.aborted) { setError(true); setLoading(false); } });
			return () => controller.abort();
		}, [query.postType]);
		useEffect(() => {
			if (!type) { return; }
			const controller = new AbortController();
			const endpoint = '/' + (type.rest_namespace || 'wp/v2') + '/' + type.rest_base;
			const fetch = (params) => wp.apiFetch({
				path: addQueryArgs(endpoint, { context: 'view', status: 'publish', _fields: 'id,title', ...params }),
				signal: controller.signal,
			});
			setLoading(true);
			setError(false);
			Promise.all([
				fetch({ per_page: 20, search, orderby: 'date', order: 'desc' }),
				ids.length ? fetch({ include: ids, per_page: 100, orderby: 'include' }) : Promise.resolve([]),
			]).then(([found, chosen]) => {
				if (!controller.signal.aborted) { setRecords(found); setSelected(chosen); }
			}).catch(() => { if (!controller.signal.aborted) { setError(true); } })
				.finally(() => { if (!controller.signal.aborted) { setLoading(false); } });
			return () => controller.abort();
		}, [type, search, selectedKey]);

		function update(next) {
			const updated = {
				...query, orderBy: next.length ? 'include' : 'date', order: 'desc',
				perPage: next.length || query.one202xLatestCount || 3, offset: 0, inherit: false,
			};
			// Core data treats even an undefined include key as an empty result set.
			delete updated.include;
			if (next.length) { updated.include = next; }
			setAttributes({ query: updated });
		}
		function move(index, offset) {
			const next = [...ids];
			[next[index], next[index + offset]] = [next[index + offset], next[index]];
			update(next);
		}
		return el(PanelBody, { title: __('Content selection', 'one-base-theme'), initialOpen: true },
			el('p', null, __('Leave the selection empty to show the most recent items. Selected items display in the order below.', 'one-base-theme')),
			error && el(Notice, { status: 'error', isDismissible: false }, __('Content could not be loaded. Check the connection and try searching again.', 'one-base-theme')),
			el(ComboboxControl, {
				label: type?.name || __('Choose content', 'one-base-theme'),
				value: null,
				/* translators: %d: the content item ID when its title is empty. */
				options: records.filter((record) => !ids.includes(record.id)).map((record) => ({ value: String(record.id), label: title(record.title?.rendered) || sprintf(__('Untitled item (%d)', 'one-base-theme'), record.id) })),
				onFilterValueChange: setInput,
				onChange: (value) => { const id = Number(value); if (id > 0 && ids.length < 100 && !ids.includes(id)) { update([...ids, id]); setInput(''); } },
				help: __('Search by name to add an item.', 'one-base-theme'),
				__next40pxDefaultSize: true,
				__nextHasNoMarginBottom: true,
			}),
			loading && el(Spinner),
			el('ol', null, ids.map((id, index) => {
				const record = selected.find((item) => item.id === id);
				/* translators: %d: the ID of a selected item that is no longer available. */
				const name = record ? title(record.title?.rendered) : sprintf(__('Unavailable item (%d)', 'one-base-theme'), id);
				return el('li', { key: id }, el('span', null, name),
					el('div', { style: { display: 'flex', flexWrap: 'wrap' } },
						/* translators: %s: the selected content item's title. */
						el(Button, { icon: 'arrow-up-alt2', label: sprintf(__('Move %s up', 'one-base-theme'), name), disabled: index === 0, onClick: () => move(index, -1) }),
						/* translators: %s: the selected content item's title. */
						el(Button, { icon: 'arrow-down-alt2', label: sprintf(__('Move %s down', 'one-base-theme'), name), disabled: index === ids.length - 1, onClick: () => move(index, 1) }),
						/* translators: %s: the selected content item's title. */
						el(Button, { icon: 'no-alt', label: sprintf(__('Remove %s', 'one-base-theme'), name), onClick: () => update(ids.filter((item) => item !== id)) })
					));
			})),
			ids.length > 0 && el(Button, { variant: 'secondary', onClick: () => update([]) }, __('Use latest items', 'one-base-theme')),
			ids.length === 0 && el(RangeControl, {
				label: __('Number of recent items', 'one-base-theme'), value: query.one202xLatestCount || 3, min: 1, max: 12,
				onChange: (count) => setAttributes({ query: { ...query, one202xLatestCount: count, perPage: count } }),
				__next40pxDefaultSize: true, __nextHasNoMarginBottom: true,
			})
		);
	}

	wp.hooks.addFilter('editor.BlockEdit', 'one-202x/query-selection', (BlockEdit) => function QueryEdit(props) {
		const applies = props.name === 'core/query' && props.attributes.namespace === namespace && props.attributes.query?.one202xSelection === true;
		return el(Fragment, null, el(BlockEdit, props), applies && props.isSelected &&
			el(wp.blockEditor.InspectorControls, null, el(Selection, { query: props.attributes.query, setAttributes: props.setAttributes })));
	});
})(window.wp);
