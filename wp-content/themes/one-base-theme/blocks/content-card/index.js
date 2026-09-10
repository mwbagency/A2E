(function (wp) {
	'use strict';

	const { InspectorControls, useBlockProps } = wp.blockEditor;
	const { registerBlockType } = wp.blocks;
	const { Button, ComboboxControl, Disabled, Notice, PanelBody, Placeholder, SelectControl, Spinner } = wp.components;
	const { createElement: el, Fragment, useEffect, useState } = wp.element;
	const { decodeEntities } = wp.htmlEntities;
	const { __, sprintf } = wp.i18n;
	const { addQueryArgs } = wp.url;
	const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;
	const BLOCK_NAME = 'one-202x/content-card';

	function plainText(value) {
		return decodeEntities(String(value || '').replace(/<[^>]*>/g, ' '))
			.replace(/\s+/g, ' ').trim();
	}

	// Core search excludes nonpublic testimonials; query their endpoint separately.
	async function findContent(types, query, signal) {
		const requests = [wp.apiFetch({
			path: addQueryArgs('/wp/v2/search', {
				type: 'post', subtype: 'any', per_page: 20, ...query,
			}),
			signal,
		})];
		const testimonial = types.testimonial;

		if (testimonial) {
			requests.push(wp.apiFetch({
				path: addQueryArgs('/' + (testimonial.rest_namespace || 'wp/v2') + '/' + testimonial.rest_base, {
					status: 'publish', per_page: 20, _fields: 'id,title', ...query,
				}),
				signal,
			}).then(function (records) {
				return records.map(function (record) {
					return { id: record.id, title: record.title?.rendered, subtype: 'testimonial' };
				});
			}));
		}

		return (await Promise.all(requests)).flat();
	}

	function ContentPicker({ value, onChange }) {
		const [types, setTypes] = useState(null);
		const [searchInput, setSearchInput] = useState('');
		const [search, setSearch] = useState('');
		const [results, setResults] = useState([]);
		const [selected, setSelected] = useState(null);
		const [loading, setLoading] = useState(true);
		const [error, setError] = useState(false);

		useEffect(function () {
			const controller = new AbortController();
			wp.apiFetch({ path: '/wp/v2/types', signal: controller.signal })
				.then(setTypes)
				.catch(function () {
					if (!controller.signal.aborted) {
						setError(true);
						setLoading(false);
					}
				});
			return function () { controller.abort(); };
		}, []);

		useEffect(function () {
			const timer = window.setTimeout(function () { setSearch(searchInput.trim()); }, 250);
			return function () { window.clearTimeout(timer); };
		}, [searchInput]);

		useEffect(function () {
			if (!types) { return; }
			const controller = new AbortController();
			setLoading(true);
			setError(false);
			findContent(types, { search }, controller.signal)
				.then(function (records) {
					if (!controller.signal.aborted) { setResults(records); }
				})
				.catch(function () {
					if (!controller.signal.aborted) { setError(true); }
				})
				.finally(function () {
					if (!controller.signal.aborted) { setLoading(false); }
				});
			return function () { controller.abort(); };
		}, [search, types]);

		useEffect(function () {
			setSelected(null);
			if (!types || value < 1) { return; }
			const controller = new AbortController();
			findContent(types, { include: [value], per_page: 1 }, controller.signal)
				.then(function (records) {
					if (!controller.signal.aborted) { setSelected(records[0] || null); }
				})
				.catch(function () {
					if (!controller.signal.aborted) { setError(true); }
				});
			return function () { controller.abort(); };
		}, [types, value]);

		const records = new Map(results.map(function (record) { return [record.id, record]; }));
		if (selected) { records.set(selected.id, selected); }
		if (value > 0 && !records.has(value)) {
			/* translators: %d: selected post ID. */
			records.set(value, { id: value, title: sprintf(__('Post #%d', 'one-base-theme'), value) });
		}
		const options = Array.from(records.values()).map(function (record) {
			const title = plainText(record.title) || __('Untitled', 'one-base-theme');
			/* translators: 1: post title, 2: post ID. */
			return { value: String(record.id), label: sprintf(__('%1$s (#%2$d)', 'one-base-theme'), title, record.id) };
		});

		return el(Fragment, null,
			el(ComboboxControl, {
				label: __('Choose content', 'one-base-theme'),
				value: value > 0 ? String(value) : null,
				options,
				onFilterValueChange: setSearchInput,
				onChange: function (next) { onChange(Number(next) || 0); },
				help: __('Search published content and testimonials. Clear the selection to use the current post.', 'one-base-theme'),
			}),
			loading && el(Spinner),
			error && el(Notice, { status: 'error', isDismissible: false }, __('Content could not be loaded. Check your access and try again.', 'one-base-theme')),
			value > 0 && el(Button, { variant: 'secondary', onClick: function () { onChange(0); } }, __('Use current post', 'one-base-theme'))
		);
	}

	registerBlockType(BLOCK_NAME, {
		edit({ attributes, context, setAttributes, isSelected }) {
			const selectedPostId = Number(attributes.postId || 0);
			const postId = selectedPostId > 0 ? selectedPostId : Number(context?.postId || 0);
			const blockProps = useBlockProps();

			return el(Fragment, null,
				isSelected && el(InspectorControls, null,
					el(PanelBody, { title: __('Card settings', 'one-base-theme'), initialOpen: true },
						el('p', null, selectedPostId > 0
							? __('This card displays the chosen content, including inside a Query Loop.', 'one-base-theme')
							: __('This card follows the current post. In a Query Loop it changes for each result.', 'one-base-theme')),
						el(ContentPicker, { value: selectedPostId, onChange: function (value) { setAttributes({ postId: value }); } }),
						el(SelectControl, {
							label: __('Card heading level', 'one-base-theme'),
							value: String(attributes.headingLevel || 3),
							options: [2, 3, 4, 5, 6].map(function (level) { return { label: 'H' + level, value: String(level) }; }),
							onChange: function (value) { setAttributes({ headingLevel: Number(value) }); },
						}),
						el('p', null, __('The content type automatically selects the card design. Posts show their publication date; other content uses its matching card.', 'one-base-theme'))
					)
				),
				el('div', blockProps, postId > 0
					? el(Disabled, null, el(ServerSideRender, {
						block: BLOCK_NAME,
						// REST preview receives the resolved ID without saving Query Loop context.
						attributes: { ...attributes, postId },
						EmptyResponsePlaceholder: function () {
							return el('p', null, __('No published content is available for this card.', 'one-base-theme'));
						},
					}))
					: el(Placeholder, { icon: 'index-card', label: __('Content Card', 'one-base-theme') }, __('Choose content in the settings or place this card inside a Query Loop.', 'one-base-theme'))
				)
			);
		},
		save() { return null; },
	});
})(window.wp);
