(() => {
	'use strict';
	const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
	document.querySelectorAll('.one-202x-logo-marquee').forEach((root) => {
		if (root.dataset.initialized) return;
		const viewport = root.querySelector('.one-202x-logo-marquee__viewport');
		const belt = root.querySelector('.one-202x-logo-marquee__belt');
		const track = root.querySelector('.one-202x-logo-marquee__track');
		const toggle = root.querySelector('.one-202x-logo-marquee__toggle');
		if (!viewport || !belt || !track || !toggle || !track.querySelector('img')) return;
		root.dataset.initialized = 'true';
		let paused = false;
		let lastSize = '';
		let frame = 0;
		const removeClones = () => belt.querySelectorAll('[data-marquee-clone]').forEach((clone) => clone.remove());
		const rebuild = () => {
			frame = 0;
			if (motion.matches) {
				root.classList.remove('is-moving');
				removeClones();
				toggle.hidden = true;
				lastSize = '';
				return;
			}
			if (viewport.contains(document.activeElement)) return;
			root.classList.add('is-moving');
			const width = track.getBoundingClientRect().width;
			const viewportWidth = viewport.getBoundingClientRect().width;
			if (!width || !viewportWidth) {
				root.classList.remove('is-moving');
				toggle.hidden = true;
				return;
			}
			const size = width + ':' + viewportWidth;
			if (size !== lastSize) {
				lastSize = size;
				removeClones();
				// Fill the viewport plus one complete cycle, even for a short logo list.
				for (let i = 0; i < Math.ceil(viewportWidth / width); i++) {
					const clone = track.cloneNode(true);
					clone.setAttribute('aria-hidden', 'true');
					clone.setAttribute('inert', '');
					clone.dataset.marqueeClone = 'true';
					[clone, ...clone.querySelectorAll('*')].forEach((node) => {
						// Visual copies must not repeat anchors, form names or Core event bindings.
						[...node.attributes].forEach(({ name }) => {
							if (name === 'id' || name === 'name' || name.startsWith('data-wp-')) node.removeAttribute(name);
						});
					});
					// Also support browser shells that do not implement inert yet.
					clone.querySelectorAll('a[href], button, input, select, textarea, [tabindex], [contenteditable]').forEach((node) => {
						node.setAttribute('tabindex', '-1');
						if (node.hasAttribute('contenteditable')) node.setAttribute('contenteditable', 'false');
					});
					belt.append(clone);
				}
				root.style.setProperty('--one-marquee-distance', '-' + width + 'px');
			}
			toggle.hidden = false;
		};
		const schedule = () => {
			if (!frame) frame = window.requestAnimationFrame(rebuild);
		};
		toggle.addEventListener('click', () => {
			paused = !paused;
			root.classList.toggle('is-paused', paused);
			toggle.textContent = paused ? toggle.dataset.resumeLabel : toggle.dataset.pauseLabel;
		});
		motion.addEventListener('change', schedule);
		viewport.addEventListener('focusout', schedule);
		const observer = new ResizeObserver(schedule);
		observer.observe(viewport);
		observer.observe(track);
		rebuild();
	});
})();
