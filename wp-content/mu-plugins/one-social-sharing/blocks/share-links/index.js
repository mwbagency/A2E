(function (wp) {
    'use strict';
    const { createElement: el } = wp.element;
    const { __ } = wp.i18n;
    const ServerSideRender = wp.serverSideRender.ServerSideRender || wp.serverSideRender;

    wp.blocks.registerBlockType('one-social-sharing/share-links', {
        edit({ context }) {
            const postId = Number(context.postId || 0);
            return el('div', wp.blockEditor.useBlockProps(), postId
                ? el(wp.components.Disabled, null, el(ServerSideRender, {
                    block: 'one-social-sharing/share-links',
                    attributes: { previewPostId: postId },
                }))
                : el(wp.components.Placeholder, {
                    icon: 'share', label: __('Social share links', 'one-social-sharing'),
                }, __('Links use the current article when viewed on the site.', 'one-social-sharing')));
        },
        save() { return null; },
    });
})(window.wp);
