// wp-content/themes/one-base-theme/src/scripts/global.js
var tracks = [
  ".a2e-numbered-cards__track",
  ".one-202x-pattern-show013_testimonials .wp-block-post-template",
  ".one-202x-pattern-show009_timeline > .wp-block-tab-list",
  ".is-style-a2e-category-tabs .one-202x-query-filters__options"
].join(", ");
var controls = 'input, textarea, select, video[controls], audio[controls], [contenteditable]:not([contenteditable="false"])';
var gesture = null;
var suppressedClick = null;
function finish(cancelled = false) {
  if (!gesture) return;
  const { track, pointerId, dragging } = gesture;
  gesture = null;
  track.classList.remove("is-dragging");
  if (track.hasPointerCapture(pointerId)) track.releasePointerCapture(pointerId);
  if (dragging && !cancelled) {
    const click = { track, pointerId };
    suppressedClick = click;
    window.setTimeout(() => {
      if (suppressedClick === click) suppressedClick = null;
    }, 0);
  }
}
document.addEventListener("pointerdown", (event) => {
  suppressedClick = null;
  finish(true);
  if (event.pointerType !== "mouse" || event.button !== 0 || !event.isPrimary || event.ctrlKey || event.metaKey || event.altKey || event.shiftKey) return;
  if (!(event.target instanceof Element) || event.target.closest(controls)) return;
  const track = event.target.closest(tracks);
  if (!track || track.scrollWidth <= track.clientWidth + 1) return;
  gesture = {
    track,
    pointerId: event.pointerId,
    x: event.clientX,
    y: event.clientY,
    scrollLeft: track.scrollLeft,
    dragging: false
  };
});
document.addEventListener("pointermove", (event) => {
  if (!gesture || event.pointerId !== gesture.pointerId) return;
  if (!(event.buttons & 1) || !gesture.track.isConnected) {
    finish(true);
    return;
  }
  const dx = event.clientX - gesture.x;
  const dy = event.clientY - gesture.y;
  if (!gesture.dragging) {
    if (Math.max(Math.abs(dx), Math.abs(dy)) < 6) return;
    if (Math.abs(dy) > Math.abs(dx)) {
      finish(true);
      return;
    }
    gesture.dragging = true;
    gesture.track.classList.add("is-dragging");
    gesture.track.setPointerCapture(event.pointerId);
    const selection = window.getSelection();
    if (selection?.anchorNode && gesture.track.contains(selection.anchorNode)) {
      selection.removeAllRanges();
    }
  }
  event.preventDefault();
  gesture.track.scrollLeft = gesture.scrollLeft - dx;
}, { passive: false });
document.addEventListener("pointerup", (event) => {
  if (event.pointerId === gesture?.pointerId) finish();
});
for (const type of ["pointercancel", "lostpointercapture"]) {
  document.addEventListener(type, (event) => {
    if (event.pointerId === gesture?.pointerId) finish(true);
  });
}
window.addEventListener("blur", () => finish(true));
document.addEventListener("dragstart", (event) => {
  if (gesture?.track.contains(event.target)) event.preventDefault();
});
document.addEventListener("click", (event) => {
  if (!suppressedClick || event.detail === 0) return;
  if (suppressedClick.track.contains(event.target) && (event.pointerId === void 0 || event.pointerId === suppressedClick.pointerId)) {
    event.preventDefault();
    event.stopImmediatePropagation();
    suppressedClick = null;
  }
}, true);
