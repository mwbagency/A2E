(function () {
	'use strict';

	const BLOCK_SELECTOR = '[data-one-202x-media-cover="true"]';
	const VIDEO_SELECTOR = 'video';
	const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	const initializedBlocks = new WeakSet();

	// Capture play events from every native video, including dynamically added ones.
	function pauseOtherVideos(event) {
		if (!(event.target instanceof HTMLVideoElement) || event.target.paused) return;
		document.querySelectorAll(VIDEO_SELECTOR).forEach(function (video) {
			if (video !== event.target && !video.paused) video.pause();
		});
	}

	function initializeBlock(block) {
		if (initializedBlocks.has(block)) {
			return;
		}

		const video = block.querySelector('[data-one-202x-video="true"]');
		const control = block.querySelector(
			'[data-one-202x-video-control="true"]'
		);

		if (!video || !control) {
			initializedBlocks.add(block);
			return;
		}

		// Keep native captions, volume and fullscreen controls for manual playback.
		if (video.dataset.playbackMode !== 'autoplay') {
			const isVideoCard = block.classList.contains('is-style-video-card');
			function updateManualPlayback() {
				const playing = !video.paused && !video.ended;
				block.classList.toggle('is-one-202x-media-playing', playing);
				if (isVideoCard) {
					control.hidden = playing;
				}
			}
			if (isVideoCard) {
				control.addEventListener('click', function () {
					video.controls = true;
					video.tabIndex = 0;
					video.play().then(function () {
						video.focus();
					}).catch(function () {
						updateManualPlayback();
					});
				});
				video.addEventListener('error', function () {
					control.hidden = true;
					video.controls = true;
				});
				video.tabIndex = -1;
			}

			video.controls = !isVideoCard;
			video.addEventListener('play', updateManualPlayback);
			video.addEventListener('pause', updateManualPlayback);
			video.addEventListener('ended', updateManualPlayback);
			updateManualPlayback();
			initializedBlocks.add(block);
			return;
		}
		const playIcon = control.querySelector('[data-control-icon="play"]');
		const pauseIcon = control.querySelector('[data-control-icon="pause"]');
		const playLabel = control.dataset.playLabel;
		const pauseLabel = control.dataset.pauseLabel;
		let userPaused = false;
		let pausedForReducedMotion = false;
		let enforcingMute = false;

		function ensureSource() {
			const source = video.dataset.src || '';

			if (!video.getAttribute('src') && source) {
				video.src = source;
				video.load();
			}
		}

		function enforceMutedAutoplay() {
			if (enforcingMute) {
				return;
			}

			enforcingMute = true;
			video.defaultMuted = true;
			video.muted = true;
			video.volume = 0;
			enforcingMute = false;
		}

		function updateControl() {
			const isPlaying = !video.paused && !video.ended;

			control.setAttribute('aria-label', isPlaying ? pauseLabel : playLabel);
			control.setAttribute('title', isPlaying ? pauseLabel : playLabel);
			control.dataset.state = isPlaying ? 'playing' : 'paused';

			playIcon?.toggleAttribute('hidden', isPlaying);
			pauseIcon?.toggleAttribute('hidden', !isPlaying);
		}

		function playVideo() {
			ensureSource();

			const playPromise = video.play();

			if (playPromise && typeof playPromise.catch === 'function') {
				playPromise.catch(updateControl);
			}
		}

		control.addEventListener('click', function () {
			if (video.paused || video.ended) {
				userPaused = false;
				pausedForReducedMotion = false;
				playVideo();
				return;
			}

			userPaused = true;
			video.pause();
		});

		video.addEventListener('play', function () {
			enforceMutedAutoplay();
			updateControl();
		});
		video.addEventListener('pause', updateControl);
		video.addEventListener('ended', updateControl);
		video.addEventListener('volumechange', enforceMutedAutoplay);

		function handleReducedMotionChange(event) {
			if (event.matches) {
				if (!video.paused) {
					pausedForReducedMotion = true;
					video.pause();
				}
				return;
			}

			if (pausedForReducedMotion && !userPaused) {
				pausedForReducedMotion = false;
				playVideo();
			}
		}

		if (typeof reducedMotion.addEventListener === 'function') {
			reducedMotion.addEventListener('change', handleReducedMotionChange);
		} else if (typeof reducedMotion.addListener === 'function') {
			reducedMotion.addListener(handleReducedMotionChange);
		}

		video.controls = false;
		control.hidden = false;
		block.classList.add('is-one-202x-media-ready');
		enforceMutedAutoplay();

		if (!reducedMotion.matches) {
			playVideo();
		} else {
			pausedForReducedMotion = true;
		}

		updateControl();
		initializedBlocks.add(block);
	}

	function scan(root) {
		if (root.nodeType !== Node.ELEMENT_NODE && root !== document) {
			return;
		}

		if (root !== document && root.matches(BLOCK_SELECTOR)) {
			initializeBlock(root);
		}

		root.querySelectorAll(BLOCK_SELECTOR).forEach(initializeBlock);
	}

	function initialize() {
		document.addEventListener('play', pauseOtherVideos, true);
		scan(document);

		const observer = new MutationObserver(function (mutations) {
			mutations.forEach(function (mutation) {
				mutation.addedNodes.forEach(scan);
			});
		});

		observer.observe(document.body, {
			childList: true,
			subtree: true,
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initialize, { once: true });
	} else {
		initialize();
	}
})();
