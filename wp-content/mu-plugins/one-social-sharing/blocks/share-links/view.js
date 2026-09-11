(function () {
    'use strict';
    document.querySelectorAll('[data-share-copy]').forEach((button) => {
        button.hidden = false;
        button.addEventListener('click', async () => {
            const root = button.closest('.one-social-sharing');
            const status = root.querySelector('[role="status"]');
            const fallback = root.querySelector('.one-social-sharing__fallback');
            try {
                await navigator.clipboard.writeText(button.dataset.shareCopy);
                fallback.hidden = true;
                status.textContent = button.dataset.success;
            } catch {
                status.textContent = button.dataset.error;
                fallback.hidden = false;
                fallback.focus();
                fallback.select();
            }
        });
    });
})();
