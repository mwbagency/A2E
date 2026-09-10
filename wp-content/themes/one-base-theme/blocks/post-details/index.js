(function (wp) {
	'use strict';
	const { createElement: el } = wp.element;
	const { __ } = wp.i18n;
	const { Disabled, Placeholder } = wp.components;
	const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;
	const empty = () => el(Placeholder, { icon: 'id-alt', label: __('Post Details', 'one-base-theme') }, __('Fill in the current post’s details. This block follows the current team member, case study or event and hides empty fields.', 'one-base-theme'));
	wp.blocks.registerBlockType('one-202x/post-details', {
		edit({ attributes, context }) {
			const postId = Number(context?.postId || 0);
			return el('div', wp.blockEditor.useBlockProps(), postId > 0
				? el(Disabled, null, el(ServerSideRender, {
					block: 'one-202x/post-details', attributes: { ...attributes, previewPostId: postId },
					EmptyResponsePlaceholder: empty,
				})) : empty());
		},
		save() { return null; },
	});
})(window.wp);
