(function () {
	'use strict';

	function makeSingleOpen(items) {
		items.forEach(function (item) {
			if (item.dataset.oneFaqsReady === 'true') {
				return;
			}

			item.dataset.oneFaqsReady = 'true';
			item.addEventListener('toggle', function () {
				if (!item.open) {
					return;
				}

				items.forEach(function (otherItem) {
					if (otherItem !== item) {
						otherItem.open = false;
					}
				});
			});
		});
	}

	document
		.querySelectorAll(
			'.wp-block-one-faqs-faqs[data-one-faqs-single-open="true"]'
		)
		.forEach(function (block) {
			makeSingleOpen(block.querySelectorAll('.one-faqs-faqs__item'));
		});

})();
