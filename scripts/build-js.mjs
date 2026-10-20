import { readdir } from 'node:fs/promises';
import { join } from 'node:path';
import { build } from 'esbuild';

const theme = 'wp-content/themes/one-base-theme';
const source = `${theme}/src/scripts`;
const production = process.argv.includes('--production');

async function entries(directory) {
	const files = await readdir(directory, { withFileTypes: true });
	const results = await Promise.all(files.map(async (file) => {
		const path = join(directory, file.name);
		if (file.isDirectory()) {
			return entries(path);
		}
		return file.name.endsWith('.js') ? [path] : [];
	}));
	return results.flat();
}

const entryPoints = (await entries(source)).filter((file) => (
	file === `${source}/global.js` || file.startsWith(`${source}/patterns/`) || file.startsWith(`${source}/editor/`)
));

// Bundle shared imports into each entry so asset versioning covers their changes.
await build({
	entryPoints,
	outbase: source,
	outdir: `${theme}/assets/js`,
	bundle: true,
	format: 'esm',
	external: ['@wordpress/interactivity'],
	target: 'es2020',
	minify: production,
	legalComments: 'none',
	logLevel: 'info',
});

// Custom block entry points keep their metadata and built assets together.
const blockEntries = (await entries(source)).filter((file) => file.startsWith(`${source}/blocks/`));
if (blockEntries.length) {
	await build({
		entryPoints: blockEntries,
		outbase: `${source}/blocks`,
		outdir: `${theme}/blocks`,
		bundle: true,
		format: 'iife',
		target: 'es2020',
		minify: production,
		legalComments: 'none',
		logLevel: 'info',
	});
}
