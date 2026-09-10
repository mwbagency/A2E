const globalData = require('@csstools/postcss-global-data');
const customMedia = require('postcss-custom-media');

module.exports = (context) => {
	const plugins = [
		globalData({
			files: [
				'./wp-content/themes/one-base-theme/config/custom-media.css',
			],
		}),
		customMedia({
			preserve: false,
		}),
	];

	return {
		map: context.options.map,
		plugins,
	};
};
