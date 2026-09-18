import { getContext, getElement, store, withSyncEvent } from '@wordpress/interactivity';

// Reuse Core's reactive submenu context so its aria-expanded binding and CSS
// stay in sync. Only the A2E linked-dropdown style opts into these controls.
const closeTimers = new WeakMap();
const itemFor = (ref) => ref.closest('.is-style-a2e-linked-dropdown');
const isOpen = (context) => Object.values(context.submenuOpenedBy).some(Boolean);
const cancelClose = (item) => clearTimeout(closeTimers.get(item));

function close(context, item, restoreFocus = false) {
    cancelClose(item);
    context.submenuOpenedBy.click = false;
    context.submenuOpenedBy.hover = false;
    context.submenuOpenedBy.focus = false;
    context.modal = null;
    context.previousFocus = null;
    if (restoreFocus) {
        item.querySelector(':scope > button').focus({ preventScroll: true });
    }
}

store('one-202x/navigation', {
    actions: {
        enter(event) {
            const { ref } = getElement();
            const item = itemFor(ref);
            cancelClose(item);
            // The drawer is always click-operated, even on a narrow desktop window.
            if (event.pointerType !== 'mouse' || item.closest('.one-202x-mobile-nav__menu')
                || !window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;
            getContext('core/navigation').submenuOpenedBy.hover = true;
        },
        leave(event) {
            if (event.pointerType !== 'mouse') return;
            const { ref } = getElement();
            const item = itemFor(ref);
            const context = getContext('core/navigation');
            cancelClose(item);
            // Keep the panel reachable while crossing a small gap or slipping off its edge.
            closeTimers.set(item, setTimeout(() => {
                context.submenuOpenedBy.hover = false;
            }, 200));
        },
        toggle() {
            const { ref } = getElement();
            const item = itemFor(ref);
            const context = getContext('core/navigation');
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
            const context = getContext('core/navigation');
            if (event.key !== 'Escape' || !isOpen(context)) return;
            event.preventDefault();
            event.stopPropagation();
            close(context, itemFor(getElement().ref), true);
        }),
        outside(event) {
            const item = itemFor(getElement().ref);
            const context = getContext('core/navigation');
            if (!item.contains(event.target) && isOpen(context)) close(context, item);
        },
    },
});
