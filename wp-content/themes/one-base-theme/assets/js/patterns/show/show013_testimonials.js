// wp-content/themes/one-base-theme/src/scripts/patterns/show/show013_testimonials.js
document.querySelectorAll(".one-202x-pattern-show013_testimonials").forEach((section) => {
  const list = section.querySelector(".wp-block-post-template");
  if (!list) return;
  list.tabIndex = 0;
  const label = section.getAttribute("aria-label");
  if (label) list.setAttribute("aria-label", label);
});
