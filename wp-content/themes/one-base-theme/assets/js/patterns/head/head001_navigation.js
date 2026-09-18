// wp-content/themes/one-base-theme/src/scripts/patterns/head/head001_navigation.js
import { getContext, getElement, store, withSyncEvent } from "@wordpress/interactivity";
var closeTimers = /* @__PURE__ */ new WeakMap();
var itemFor = (ref) => ref.closest(".is-style-a2e-linked-dropdown");
var isOpen = (context) => Object.values(context.submenuOpenedBy).some(Boolean);
var cancelClose = (item) => clearTimeout(closeTimers.get(item));
function close(context, item, restoreFocus = false) {
  cancelClose(item);
  context.submenuOpenedBy.click = false;
  context.submenuOpenedBy.hover = false;
  context.submenuOpenedBy.focus = false;
  context.modal = null;
  context.previousFocus = null;
  if (restoreFocus) {
    item.querySelector(":scope > button").focus({ preventScroll: true });
  }
}
store("one-202x/navigation", {
  actions: {
    enter(event) {
      const { ref } = getElement();
      const item = itemFor(ref);
      cancelClose(item);
      if (event.pointerType !== "mouse" || item.closest(".one-202x-mobile-nav__menu") || !window.matchMedia("(hover: hover) and (pointer: fine)").matches) return;
      getContext("core/navigation").submenuOpenedBy.hover = true;
    },
    leave(event) {
      if (event.pointerType !== "mouse") return;
      const { ref } = getElement();
      const item = itemFor(ref);
      const context = getContext("core/navigation");
      cancelClose(item);
      closeTimers.set(item, setTimeout(() => {
        context.submenuOpenedBy.hover = false;
      }, 200));
    },
    toggle() {
      const { ref } = getElement();
      const item = itemFor(ref);
      const context = getContext("core/navigation");
      cancelClose(item);
      if (context.submenuOpenedBy.click || context.submenuOpenedBy.focus) {
        close(context, item, true);
      } else {
        ref.focus({ preventScroll: true });
        context.previousFocus = ref;
        context.submenuOpenedBy.click = true;
      }
    },
    escape: withSyncEvent((event) => {
      const context = getContext("core/navigation");
      if (event.key !== "Escape" || !isOpen(context)) return;
      event.preventDefault();
      event.stopPropagation();
      close(context, itemFor(getElement().ref), true);
    }),
    outside(event) {
      const item = itemFor(getElement().ref);
      const context = getContext("core/navigation");
      if (!item.contains(event.target) && isOpen(context)) close(context, item);
    }
  }
});
