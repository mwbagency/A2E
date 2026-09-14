// Make the native scrolling list reachable by keyboard, including in Safari.
document.querySelectorAll('.one-202x-pattern-show013_testimonials').forEach((section) => {
    const list = section.querySelector('.wp-block-post-template');
    if (!list) return;

    list.tabIndex = 0;
    const label = section.getAttribute('aria-label');
    if (label) list.setAttribute('aria-label', label);
});
