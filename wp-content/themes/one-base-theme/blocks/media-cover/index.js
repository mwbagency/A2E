(function (blocks, blockEditor, components, element, i18n) {
	'use strict';

	const { registerBlockType } = blocks;
	const {
		BlockControls,
		ColorPalette,
		InnerBlocks,
		InspectorControls,
		MediaPlaceholder,
		MediaUpload,
		MediaUploadCheck,
		useBlockProps,
	} = blockEditor;
	const {
		Button,
		FocalPointPicker,
		PanelBody,
		RangeControl,
		SelectControl,
		TextControl,
		ToolbarButton,
		ToolbarGroup,
	} = components;
	const { createElement: el, Fragment } = element;
	const { __ } = i18n;

	const ALLOWED_MEDIA_TYPES = ['image', 'video'];

	function getMediaType(media) {
		const mime = media.mime || media.mime_type || '';

		return media.type === 'video' || mime.startsWith('video/')
			? 'video'
			: 'image';
	}

	// Attribute defaults are not among block.json's automatically translated fields.
	window.wp.hooks.addFilter(
		'blocks.registerBlockType',
		'one-202x/media-cover-defaults',
		function (settings, name) {
			if (name !== 'one-202x/media-cover') {
				return settings;
			}

			return {
				...settings,
				attributes: {
					...settings.attributes,
					videoLabel: { ...settings.attributes.videoLabel, default: __('Background video', 'one-base-theme') },
					captionsLabel: { ...settings.attributes.captionsLabel, default: __('Captions', 'one-base-theme') },
					captionsLanguage: { ...settings.attributes.captionsLanguage, default: document.documentElement.lang || 'en' },
				},
			};
		}
	);

	registerBlockType('one-202x/media-cover', {
		edit: function Edit({ attributes, setAttributes }) {
			const {
				alt = '',
				captionsLabel = __('Captions', 'one-base-theme'),
				captionsLanguage = document.documentElement.lang || 'en',
				captionsUrl = '',
				focalPoint = { x: 0.5, y: 0.5 },
				mediaId,
				mediaType = 'image',
				mediaUrl = '',
				overlayColor = '#ffffff',
				overlayOpacity = 60,
				playbackMode = 'manual',
				posterUrl = '',
				videoLabel = __('Background video', 'one-base-theme'),
			} = attributes;

			function selectMedia(media) {
				const nextType = getMediaType(media);
				const nextAttributes = {
					mediaId: media.id,
					mediaType: nextType,
					mediaUrl: media.url || '',
				};

				if (nextType === 'image') {
					nextAttributes.alt = media.alt || '';
				}

				if (
					nextType === 'video' &&
					!posterUrl &&
					mediaType === 'image' &&
					mediaUrl
				) {
					nextAttributes.posterId = mediaId;
					nextAttributes.posterUrl = mediaUrl;
				}

				setAttributes(nextAttributes);
			}

			function removeMedia() {
				setAttributes({
					alt: '',
					mediaId: undefined,
					mediaUrl: '',
					posterId: undefined,
					posterUrl: '',
				});
			}

			function selectPoster(media) {
				setAttributes({
					posterId: media.id,
					posterUrl: media.url || '',
				});
			}

			const isVideoCard = (attributes.className || '').split(' ').includes('is-style-video-card');
			const effectivePlaybackMode = isVideoCard ? 'manual' : playbackMode;
			const blockProps = useBlockProps({
				className: [
					'one-202x-media-cover-editor',
					mediaUrl ? 'has-media' : 'has-no-media',
					'has-' + mediaType,
				].join(' '),
				style: {
					'--one-202x-media-cover-focal-x':
						Math.round((focalPoint.x || 0) * 10000) / 100 + '%',
					'--one-202x-media-cover-focal-y':
						Math.round((focalPoint.y || 0) * 10000) / 100 + '%',
					'--one-202x-media-cover-overlay-color': overlayColor,
					'--one-202x-media-cover-overlay-opacity': overlayOpacity / 100,
				},
			});

			const toolbar = mediaUrl
				? el(
						BlockControls,
						{ group: 'other' },
						el(
							ToolbarGroup,
							null,
							el(MediaUploadCheck, null,
								el(MediaUpload, {
									allowedTypes: ALLOWED_MEDIA_TYPES,
									multiple: false,
									onSelect: selectMedia,
									render: function ({ open }) {
										return el(ToolbarButton, {
											icon: 'format-image',
											label: __('Replace media', 'one-base-theme'),
											onClick: open,
										});
									},
								})
							),
							el(ToolbarButton, {
								icon: 'trash',
								label: __('Remove media', 'one-base-theme'),
								onClick: removeMedia,
							})
						)
					)
				: null;

			const mediaSettings = el(
				InspectorControls,
				null,
				el(
					PanelBody,
					{
						title: __('Media settings', 'one-base-theme'),
						initialOpen: true,
					},
					mediaType === 'image' &&
						el(TextControl, {
							label: __('Alternative text', 'one-base-theme'),
							help: __(
								'Leave empty when the image is decorative or the surrounding text already describes it.',
								'one-base-theme'
							),
							value: alt,
							onChange: (value) => setAttributes({ alt: value }),
						}),
					mediaType === 'video' &&
						el(SelectControl, {
							label: __('Playback preset', 'one-base-theme'),
							value: effectivePlaybackMode,
							disabled: isVideoCard,
							options: [
								{
									label: __('Video manual play', 'one-base-theme'),
									value: 'manual',
								},
								{
									label: __('Video autoplay', 'one-base-theme'),
									value: 'autoplay',
								},
							],
							help:
								effectivePlaybackMode === 'manual'
									? __(
										'Starts stopped and plays with sound after the visitor presses Play.',
										'one-base-theme'
									)
									: __(
										'Loops without sound and includes a pause-motion control for accessibility.',
										'one-base-theme'
									),
							onChange: (value) => setAttributes({ playbackMode: value }),
						}),
					mediaType === 'video' &&
						el(TextControl, {
							label: __('Video accessible name', 'one-base-theme'),
							value: videoLabel,
							onChange: (value) => setAttributes({ videoLabel: value }),
						}),
					mediaType === 'video' &&
						el(
							MediaUploadCheck,
							null,
							el(MediaUpload, {
								allowedTypes: ['image'],
								multiple: false,
								onSelect: selectPoster,
								render: function ({ open }) {
									return el(
										'div',
										{ className: 'one-202x-media-cover__poster-control' },
										posterUrl &&
											el('img', {
												alt: '',
												src: posterUrl,
											}),
										el(
											Button,
											{
												onClick: open,
												variant: 'secondary',
											},
											posterUrl
												? __('Replace poster image', 'one-base-theme')
												: __('Choose poster image', 'one-base-theme')
										),
										posterUrl &&
											el(
												Button,
												{
													onClick: function () {
														setAttributes({
															posterId: undefined,
															posterUrl: '',
														});
													},
													variant: 'tertiary',
												},
												__('Remove poster', 'one-base-theme')
											)
									);
								},
							})
						),
					mediaUrl &&
						el(FocalPointPicker, {
							label: __('Focal point', 'one-base-theme'),
							url:
								mediaType === 'video' && posterUrl
									? posterUrl
									: mediaUrl,
							value: focalPoint,
							onChange: (value) => setAttributes({ focalPoint: value }),
						})
				),
				el(
					PanelBody,
					{
						title: __('Overlay', 'one-base-theme'),
						initialOpen: false,
					},
					el('p', null, __('Overlay colour', 'one-base-theme')),
					el(ColorPalette, {
						value: overlayColor,
						onChange: (value) => setAttributes({ overlayColor: value || '#ffffff' }),
					}),
					el(RangeControl, {
						label: __('Overlay opacity', 'one-base-theme'),
						min: 0,
						max: 100,
						step: 10,
						value: overlayOpacity,
						onChange: (value) => setAttributes({ overlayOpacity: value }),
					})
				),
				mediaType === 'video' && effectivePlaybackMode === 'manual' &&
					el(
						PanelBody,
						{
							title: __('Captions', 'one-base-theme'),
							initialOpen: false,
						},
						el(TextControl, {
							label: __('WebVTT captions URL', 'one-base-theme'),
							type: 'url',
							value: captionsUrl,
							help: __(
								'Add captions when the video contains speech or meaningful audio.',
								'one-base-theme'
							),
							onChange: (value) => setAttributes({ captionsUrl: value }),
						}),
						el(TextControl, {
							label: __('Captions label', 'one-base-theme'),
							value: captionsLabel,
							onChange: (value) => setAttributes({ captionsLabel: value }),
						}),
						el(TextControl, {
							label: __('Captions language', 'one-base-theme'),
							value: captionsLanguage,
							help: __('For example: en or en-GB.', 'one-base-theme'),
							onChange: (value) => setAttributes({ captionsLanguage: value }),
						})
					)
			);

			if (!mediaUrl) {
				return el(
					Fragment,
					null,
					mediaSettings,
					el(
						'div',
						blockProps,
						el(MediaPlaceholder, {
							allowedTypes: ALLOWED_MEDIA_TYPES,
							icon: 'cover-image',
							labels: {
								title: __('Media Cover', 'one-base-theme'),
								instructions: __(
									'Choose an image or a video, then place blocks over it.',
									'one-base-theme'
								),
							},
							multiple: false,
							onSelect: selectMedia,
						}),
						el('div', { className: 'one-202x-media-cover__inner-container' }, el(InnerBlocks))
					)
				);
			}

			return el(
				Fragment,
				null,
				toolbar,
				mediaSettings,
				el(
					'div',
					blockProps,
					el(
						'div',
						{ className: 'one-202x-media-cover__media' },
						mediaType === 'video'
							? el('video', {
								className: 'one-202x-media-cover__video',
								'aria-label': videoLabel,
								muted: true,
								playsInline: true,
								poster: posterUrl || undefined,
								preload: 'metadata',
								src: mediaUrl,
							})
							: el('img', {
								className: 'one-202x-media-cover__image',
								alt: alt,
								src: mediaUrl,
							})
					),
					el('span', {
						'aria-hidden': true,
						className: 'one-202x-media-cover__overlay',
					}),
					mediaType === 'video' &&
						el(
							'span',
							{ className: 'one-202x-media-cover__editor-badge' },
							effectivePlaybackMode === 'manual'
								? __('Manual play', 'one-base-theme')
								: __('Muted autoplay on frontend', 'one-base-theme')
						),
					el(
						'div',
						{ className: 'one-202x-media-cover__inner-container' },
						el(InnerBlocks)
					)
				)
			);
		},

		save: function Save() {
			return el(InnerBlocks.Content);
		},
	});
})(
	window.wp.blocks,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.element,
	window.wp.i18n
);
