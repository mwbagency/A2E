// wp-content/themes/one-base-theme/src/scripts/patterns/show/show018_numbered-cards.js
document.querySelectorAll(".one-202x-pattern-show018_numbered-cards").forEach((section) => {
  const track = section.querySelector(".a2e-numbered-cards__track");
  if (!track) return;
  track.tabIndex = 0;
  track.setAttribute("role", "group");
  const label = section.getAttribute("aria-label");
  if (label) track.setAttribute("aria-label", label);
  track.querySelectorAll(".a2e-numbered-card--reveal").forEach((card) => {
    if (!card.querySelector("a[href], button")) card.tabIndex = 0;
  });
});
