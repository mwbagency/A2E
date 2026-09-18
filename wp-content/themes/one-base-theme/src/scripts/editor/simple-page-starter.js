/* Give each new Simple page its own editable copy of the starter pattern.
 * This runs only in the page editor: nothing is seeded on theme activation or
 * frontend requests, and saved pages are never changed by selecting a template.
 */
wp.domReady(() => {
    const content = window.one202xSimplePageStarter;
    const initialisedPages = new Set();

    if (!content) {
        return;
    }

    const insertStarter = () => {
        const editor = wp.data.select('core/editor');
        const post = editor.getCurrentPost();
        const template = editor.getEditedPostAttribute('template');

        if (
            editor.getCurrentPostType() !== 'page' ||
            !post?.id ||
            post.status !== 'auto-draft' ||
            initialisedPages.has(post.id) ||
            !['simple-page', 'privacy-policy-page'].includes(template)
        ) {
            return;
        }

        // A new page may already contain a chosen pattern or a user's writing.
        // Only an empty document (including Core's empty paragraph) may be filled.
        const blocks = wp.blocks.parse(editor.getEditedPostContent());
        const isEmpty = blocks.every((block) => (
            block.name === 'core/paragraph' &&
            !block.attributes.content?.trim() &&
            block.innerBlocks.length === 0
        ));

        // Decide once for this new page, including when it already has writing.
        // Removing that writing later must not unexpectedly fill the page again.
        initialisedPages.add(post.id);
        if (!isEmpty) {
            return;
        }

        // Mark before dispatch: store subscriptions run again during insertion.
        // Deleting the text or undoing must not trigger another automatic insert.
        wp.data.dispatch('core').editEntityRecord('postType', 'page', post.id, {
            blocks: wp.blocks.parse(content),
            content: ({ blocks: pageBlocks = [] }) => wp.blocks.serialize(pageBlocks),
        });
    };

    wp.data.subscribe(insertStarter);
    insertStarter();
});
