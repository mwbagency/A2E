// wp-content/themes/one-base-theme/src/scripts/editor/simple-page-starter.js
wp.domReady(() => {
  const content = window.one202xSimplePageStarter;
  const initialisedPages = /* @__PURE__ */ new Set();
  if (!content) {
    return;
  }
  const insertStarter = () => {
    const editor = wp.data.select("core/editor");
    const post = editor.getCurrentPost();
    const template = editor.getEditedPostAttribute("template");
    if (editor.getCurrentPostType() !== "page" || !post?.id || post.status !== "auto-draft" || initialisedPages.has(post.id) || !["simple-page", "privacy-policy-page"].includes(template)) {
      return;
    }
    const blocks = wp.blocks.parse(editor.getEditedPostContent());
    const isEmpty = blocks.every((block) => block.name === "core/paragraph" && !block.attributes.content?.trim() && block.innerBlocks.length === 0);
    initialisedPages.add(post.id);
    if (!isEmpty) {
      return;
    }
    wp.data.dispatch("core").editEntityRecord("postType", "page", post.id, {
      blocks: wp.blocks.parse(content),
      content: ({ blocks: pageBlocks = [] }) => wp.blocks.serialize(pageBlocks)
    });
  };
  wp.data.subscribe(insertStarter);
  insertStarter();
});
