const globalData = require('@csstools/postcss-global-data');
const customMedia = require('postcss-custom-media');
const cssnano = require('cssnano');

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

	if (context.env === 'production') {
		plugins.push(cssnano({ preset: 'default' }));
	}

	return {
		map: context.options.map,
		plugins,
	};
};
