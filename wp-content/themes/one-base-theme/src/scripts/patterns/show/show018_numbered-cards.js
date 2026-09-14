// Keep the native scrolling row reachable by keyboard, including in Safari.
document.querySelectorAll('.one-202x-pattern-show018_numbered-cards').forEach((section) => {
    const track = section.querySelector('.a2e-numbered-cards__track');
    if (!track) return;

    track.tabIndex = 0;
    track.setAttribute('role', 'group');
    const label = section.getAttribute('aria-label');
    if (label) track.setAttribute('aria-label', label);
});
