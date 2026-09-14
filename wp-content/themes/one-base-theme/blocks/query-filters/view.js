import { getElement, store, withSyncEvent } from '@wordpress/interactivity';

let latestNavigation = 0;

store('one-202x/query-filters', {
    actions: {
        navigate: withSyncEvent(function* (event) {
            const { ref } = getElement();

            if (
                event.defaultPrevented ||
                !ref.closest('.wp-block-query[data-wp-router-region]')
            ) {
                return;
            }

            let url;
            let selectedHref = null;
            let selectedValue;
            const isForm = event.type === 'submit' || event.type === 'change';
            const controlId = event.target.id;
            const region = ref.closest('.wp-block-query[data-wp-router-region]');

            if (isForm) {
                const form = event.type === 'change' ? event.target.closest('form') : event.target;

                if (!(form instanceof HTMLFormElement)) {
                    return;
                }

                const parameter = form.dataset.filterParameter;
                const parameters = new URLSearchParams(new FormData(form));

                if (parameter && parameters.has(`${parameter}[]`)) {
                    const selected = parameters.getAll(`${parameter}[]`);

                    parameters.delete(`${parameter}[]`);
                    parameters.delete(parameter);

                    if (selected.length > 0) {
                        parameters.set(parameter, selected.join(','));
                    }
                }

                url = new URL(form.action, window.location.href);
                url.search = parameters.toString();
            } else {
                const link = event.target instanceof Element
                    ? event.target.closest('a[href]')
                    : null;

                if (
                    !link ||
                    !ref.contains(link) ||
                    event.button !== 0 ||
                    event.metaKey ||
                    event.ctrlKey ||
                    event.altKey ||
                    event.shiftKey ||
                    link.hasAttribute('download') ||
                    (link.target && link.target !== '_self')
                ) {
                    return;
                }

                selectedHref = link.href;
                selectedValue = link.dataset.filterValue;
                url = new URL(selectedHref);
            }

            if (
                url.origin !== window.location.origin ||
                url.pathname !== window.location.pathname
            ) {
                return;
            }

            event.preventDefault();

            // Keep the viewport in place during dynamic filtering.
            url.hash = '';

            const navigation = ++latestNavigation;
            const filterId = ref.id;
            const previousFocus = document.activeElement;
            region.setAttribute('aria-busy', 'true');

            try {
                const { actions } = yield import('@wordpress/interactivity-router');

                if (navigation !== latestNavigation) {
                    return;
                }

                yield actions.navigate(url.href);

                if (
                    navigation !== latestNavigation ||
                    window.location.href !== url.href
                ) {
                    return;
                }

                // Do not steal focus if the visitor moved elsewhere while loading.
                if (
                    document.activeElement !== previousFocus &&
                    document.activeElement !== document.body
                ) {
                    return;
                }

                const filters = document.getElementById(filterId);

                if (!filters) {
                    return;
                }

                const focusTarget = isForm
                    ? (document.getElementById(controlId) || filters.querySelector('button[type="submit"]'))
                    : Array.from(filters.querySelectorAll('a[href]'))
                        .find((link) => selectedValue !== undefined ? link.dataset.filterValue === selectedValue : link.href === selectedHref) || filters.querySelector('[data-query-more]') || filters.querySelector('[role="status"]');

                focusTarget?.focus({ preventScroll: true });
            } catch {
                if (navigation === latestNavigation) {
                    window.location.assign(url.href);
                }
            } finally {
                if (navigation === latestNavigation) {
                    document.querySelectorAll('.wp-block-query[aria-busy="true"]').forEach((query) => query.removeAttribute('aria-busy'));
                }
            }
        }),
    },
});
