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
	const LEGACY_BLOCK_NAME = 'one-faqs/accordion-item';
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
						disabled: faqIds.length > 0,
						help: faqIds.length > 0
							? __('Manual selection replaces the latest FAQ limit.', 'one-base-theme')
							: __('Used when no FAQs are manually selected.', 'one-base-theme'),
						onChange(value) {
							setAttributes({ limit: Number(value) || MAX_FAQS });
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

	/* Hidden editor support for Query Loop content saved before FAQ List. */
	registerBlockType(LEGACY_BLOCK_NAME, {
		edit({ context }) {
			const postId = Number(context?.postId || 0);
			const postType = context?.postType;
			const record = useSelect(function (select) {
				if (postType !== 'faq' || postId < 1) {
					return null;
				}

				return select(coreDataStore).getEditedEntityRecord(
					'postType',
					'faq',
					postId
				);
			}, [postId, postType]);
			const title = plainText(record?.title?.rendered || record?.title?.raw)
				|| __('Untitled FAQ', 'one-base-theme');
			const answer = plainText(record?.acf?.answer)
				|| __('The FAQ answer will appear here.', 'one-base-theme');
			const blockProps = useBlockProps();

			return el(
				'details',
				{ ...blockProps, open: true },
				el('summary', null, title),
				el(
					'div',
					{ className: 'one-faqs-faqs__answer' },
					answer
				)
			);
		},
		save() {
			return null;
		},
	});
})(window.wp);
