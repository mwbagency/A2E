import { readdir, readFile } from 'node:fs/promises';
import { spawnSync } from 'node:child_process';
import assert from 'node:assert/strict';

async function files(directory) {
	return (await Promise.all((await readdir(directory, { withFileTypes: true })).map((entry) => {
		const path = `${directory}/${entry.name}`;
		return entry.isDirectory() ? files(path) : [path];
	}))).flat();
}
const paths = [
	'package.json', 'composer.json', 'postcss.config.cjs',
	...(await Promise.all([
		'scripts', 'wp-content/themes/one-base-theme', 'wp-content/mu-plugins',
		'wp-content/plugins/pattern-refresh',
	].map(files))).flat(),
];
let count = 0;
for (const path of paths) {
	if (/\.(?:mjs|cjs|js)$/.test(path)) {
		const result = spawnSync(process.execPath, ['--check', path], { encoding: 'utf8' });
		assert.equal(result.status, 0, result.stderr);
		count++;
	} else if (path.endsWith('.json')) {
		JSON.parse(await readFile(path, 'utf8'));
		count++;
	}
}
console.log(`JavaScript syntax and JSON parsing passed for ${count} files.`);

// Use local PHP when available; otherwise use the project's existing Docker PHP.
const php = spawnSync('php', ['--version'], { encoding: 'utf8' });
for (const args of [
	['scripts/check-php.php'],
	['skills/wordpress-site-build/scripts/check-page-patterns.php', 'wp-content/themes/one-base-theme'],
]) {
	const result = php.status === 0
		? spawnSync('php', args, { stdio: 'inherit' })
		: spawnSync('docker', ['compose', 'run', '--rm', '--no-deps', '--entrypoint', 'php', 'wpcli', ...args], { stdio: 'inherit' });
	if (result.error || result.status !== 0) throw result.error || new Error(`PHP check failed: ${args[0]}`);
}
