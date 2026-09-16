(function (wp) {
	'use strict';

	const { InspectorControls, useBlockProps } = wp.blockEditor;
	const { registerBlockType } = wp.blocks;
	const {
		FormTokenField,
		Notice,
		PanelBody,
		RangeControl,
		SelectControl,
		Spinner,
		ToggleControl,
	} = wp.components;
	const { store: coreDataStore } = wp.coreData;
	const { useSelect } = wp.data;
	const { createElement: el, Fragment, useEffect, useState } = wp.element;
	const { decodeEntities } = wp.htmlEntities;
	const { __, sprintf } = wp.i18n;
	const ServerSideRender = wp.serverSideRender.ServerSideRender
		|| wp.serverSideRender;

	const BLOCK_NAME = 'one-faqs/faqs';
	const MAX_FAQS = 8;
	const FAQ_QUERY_ARGS = {
		context: 'edit',
		order: 'desc',
		orderby: 'date',
		per_page: 20,
		status: 'publish',
		_fields: 'id,title',
	};

	function normaliseIds(value) {
		if (!Array.isArray(value)) {
			return [];
		}

		return value
			.map(Number)
			.filter(function (id, index, ids) {
				return Number.isInteger(id) && id > 0 && ids.indexOf(id) === index;
			})
			.slice(0, MAX_FAQS);
	}

	function plainText(value) {
		return decodeEntities(String(value || '').replace(/<[^>]*>/g, ' '))
			.replace(/\s+/g, ' ')
			.trim();
	}

	function faqLabel(faq) {
		const title = plainText(faq?.title?.rendered)
			|| __('Untitled FAQ', 'one-base-theme');

		/* translators: 1: post title, 2: post ID. */
		return sprintf(__('%1$s (#%2$d)', 'one-base-theme'), title, faq.id);
	}

	function FaqsEdit({ attributes, setAttributes }) {
		const faqIds = normaliseIds(attributes.faqIds);
		const selectionKey = faqIds.join(',');
		const [searchInput, setSearchInput] = useState('');
		const [search, setSearch] = useState('');
		const categories = useSelect(function (select) {
			return select(coreDataStore).getEntityRecords('taxonomy', 'faq_category', {
				per_page: -1,
				hide_empty: false,
			}) || [];
		}, []);
		const categoryOptions = [
			{ label: __('All categories', 'one-base-theme'), value: '' },
			...categories.map(function (category) {
				return { label: decodeEntities(category.name), value: category.slug };
			}),
		];
		if (attributes.categorySlug && !categories.some(category => category.slug === attributes.categorySlug)) {
			categoryOptions.push({ label: attributes.categorySlug, value: attributes.categorySlug });
		}

		useEffect(function () {
			const timer = window.setTimeout(function () {
				setSearch(searchInput.trim());
			}, 250);

			return function () {
				window.clearTimeout(timer);
			};
		}, [searchInput]);

		const queryState = useSelect(function (select) {
			const store = select(coreDataStore);
			const query = { ...FAQ_QUERY_ARGS, search };
			const resolution = ['postType', 'faq', query];
			const selectedFaqs = faqIds.length > 0
				? store.getEntityRecords('postType', 'faq', {
					...FAQ_QUERY_ARGS,
					include: faqIds,
					per_page: MAX_FAQS,
				}) || []
				: [];

			return {
				faqs: store.getEntityRecords(...resolution) || [],
				selectedFaqs,
				error: store.getResolutionError('getEntityRecords', resolution),
				isResolved: store.hasFinishedResolution(
					'getEntityRecords',
					resolution
				),
			};
		}, [search, selectionKey]);
		const labelsById = new Map();
		const idsByLabel = new Map();
		[...queryState.faqs, ...queryState.selectedFaqs].forEach(function (faq) {
			const label = faqLabel(faq);
			labelsById.set(faq.id, label);
			idsByLabel.set(label, faq.id);
		});
		const selectedLabels = faqIds.map(function (id) {
			/* translators: %d: FAQ post ID. */
			return labelsById.get(id) || sprintf(__('FAQ (#%d)', 'one-base-theme'), id);
		});
		selectedLabels.forEach(function (label, index) {
			idsByLabel.set(label, faqIds[index]);
		});
		const suggestions = queryState.faqs
			.filter(function (faq) {
				return !faqIds.includes(faq.id);
			})
			.map(faqLabel);

		function updateSelection(tokens) {
			const nextIds = [];

			tokens.forEach(function (token) {
				const id = idsByLabel.get(String(token)) || 0;

				if (
					id > 0
					&& !nextIds.includes(id)
					&& nextIds.length < MAX_FAQS
				) {
					nextIds.push(id);
				}
			});

			setAttributes({ faqIds: nextIds });
		}

		const blockProps = useBlockProps({
			className: 'one-faqs-faqs__editor',
		});

		return el(
			Fragment,
			null,
			el(
				InspectorControls,
				null,
				el(
					PanelBody,
					{
						title: __('FAQ settings', 'one-base-theme'),
						initialOpen: true,
					},
					el(SelectControl, {
						label: __('Columns', 'one-base-theme'),
						value: Number(attributes.columns || 1),
						options: [
							{ label: __('One column', 'one-base-theme'), value: 1 },
							{ label: __('Two columns', 'one-base-theme'), value: 2 },
						],
						onChange(value) {
							setAttributes({ columns: Number(value) === 2 ? 2 : 1 });
						},
					}),
					el(ToggleControl, {
						label: __('Only keep one answer open', 'one-base-theme'),
						checked: attributes.singleOpen !== false,
						onChange(value) {
							setAttributes({ singleOpen: Boolean(value) });
						},
					}),
					el(RangeControl, {
						label: __('Latest FAQs to show', 'one-base-theme'),
						value: Number(attributes.limit || MAX_FAQS),
						min: 1,
						max: MAX_FAQS,
						disabled: faqIds.length > 0 || attributes.showAll,
						help: faqIds.length > 0
							? __('Manual selection replaces the latest FAQ limit.', 'one-base-theme')
							: __('Used when no FAQs are manually selected.', 'one-base-theme'),
						onChange(value) {
							setAttributes({ limit: Number(value) || MAX_FAQS });
						},
					}),
					el(SelectControl, {
						label: __('FAQ category', 'one-base-theme'),
						value: attributes.categorySlug || '',
						options: categoryOptions,
						disabled: faqIds.length > 0,
						help: __('Manage categories under FAQs. Manual selection overrides this filter.', 'one-base-theme'),
						onChange(categorySlug) {
							setAttributes({ categorySlug });
						},
					}),
					el(ToggleControl, {
						label: __('Show all matching FAQs', 'one-base-theme'),
						checked: Boolean(attributes.showAll),
						disabled: faqIds.length > 0,
						help: __('Include every answer in this category, without the latest FAQ limit.', 'one-base-theme'),
						onChange(showAll) {
							setAttributes({ showAll });
						},
					}),
					!queryState.isResolved && !queryState.error && el(Spinner),
					queryState.error && el(Notice, {
						status: 'error',
						isDismissible: false,
					}, __('FAQs could not be loaded. Check your access and try again.', 'one-base-theme')),
					el(FormTokenField, {
						label: __('Selected FAQs', 'one-base-theme'),
						value: selectedLabels,
						suggestions,
						onChange: updateSelection,
						onInputChange: setSearchInput,
						help: __(
							'Type to search all FAQs. Leave empty for the latest FAQs. Selected FAQs display in this order.',
							'one-base-theme'
						),
					}),
					faqIds.length === MAX_FAQS && el(
						Notice,
						{
							status: 'info',
							isDismissible: false,
						},
						__('The maximum of eight FAQs is selected.', 'one-base-theme')
					)
				)
			),
			el(
				'div',
				blockProps,
				el(ServerSideRender, {
					block: BLOCK_NAME,
					attributes,
				})
			)
		);
	}

	registerBlockType(BLOCK_NAME, {
		edit: FaqsEdit,
		save() {
			return null;
		},
	});

})(window.wp);
