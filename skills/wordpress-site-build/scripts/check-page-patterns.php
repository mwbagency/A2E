<?php
/**
 * Read-only pattern reference check; runs without WordPress or database access.
 * Usage: php check-page-patterns.php THEME_DIR [external/pattern-slug ...]
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit;
}

$theme = isset($argv[1]) ? realpath($argv[1]) : false;
if (!$theme || !is_dir($theme . '/patterns/page')) {
    fwrite(STDERR, "Usage: php check-page-patterns.php THEME_DIR [external/slug ...]\nTheme must contain patterns/page/.\n");
    exit(1);
}

$external = array_fill_keys(array_slice($argv, 2), true);
$patterns = [];
$pages = [];
$errors = [];
$referenceCount = 0;
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme . '/patterns', FilesystemIterator::SKIP_DOTS));

foreach ($iterator as $file) {
    if (!$file->isFile() || $file->isLink() || $file->getExtension() !== 'php') {
        continue;
    }
    $path = $file->getPathname();
    $source = file_get_contents($path);
    $relative = substr($path, strlen($theme) + 1);
    $isPage = str_starts_with($relative, 'patterns/page/');
    if (!preg_match('/^[\t ]*\*?[\t ]*Slug:[\t ]*(\S+)[\t ]*$/m', $source, $match)) {
        if ($isPage) {
            $errors[] = "$relative: missing pattern Slug header.";
        }
        continue;
    }
    $slug = $match[1];
    if (isset($patterns[$slug])) {
        $errors[] = "$relative: duplicate slug $slug (also {$patterns[$slug]['file']}).";
        continue;
    }

    // Inspect literal references only. Never include/evaluate the theme's PHP.
    preg_match_all('/<!--\s*wp:pattern\b(.*?)-->/s', $source, $matches);
    $references = [];
    foreach ($matches[1] as $attributes) {
        if (!preg_match('/^\s*(\{.*\})\s*\/\s*$/s', $attributes, $json)) {
            $errors[] = "$relative: expected a self-closing pattern reference.";
            continue;
        }
        $attrs = json_decode($json[1], true);
        if (!is_array($attrs) || !is_string($attrs['slug'] ?? null) || $attrs['slug'] === '') {
            $errors[] = "$relative: pattern reference has invalid JSON or no slug.";
            continue;
        }
        if ($isPage && array_keys($attrs) !== ['slug']) {
            $errors[] = "$relative: page references accept only slug; edit page blocks or use a shared source partial for instance content.";
        }
        $references[] = $attrs['slug'];
    }
    $patterns[$slug] = ['file' => $relative, 'references' => $references];

    if (!$isPage) {
        continue;
    }
    $pages[] = $slug;
    $referenceCount += count($references);
    // Page starters may include ordinary blocks and shared PHP source partials.
    // Lint PHP separately; runtime verification must cover generated references.
}

if ($pages === []) {
    $errors[] = 'No registered page patterns found under patterns/page/.';
}
foreach ($patterns as $pattern) {
    foreach ($pattern['references'] as $reference) {
        if (!isset($patterns[$reference]) && !isset($external[$reference])) {
            $errors[] = "{$pattern['file']}: missing referenced pattern $reference.";
        }
    }
}

// Follow the static reference graph so indirect cycles fail as well as self-links.
$state = [];
$visit = function (string $slug, array $trail = []) use (&$visit, &$state, &$errors, $patterns): void {
    if (($state[$slug] ?? 0) === 1) {
        $errors[] = 'Pattern reference cycle: ' . implode(' -> ', [...$trail, $slug]);
        return;
    }
    if (($state[$slug] ?? 0) === 2 || !isset($patterns[$slug])) {
        return;
    }
    $state[$slug] = 1;
    foreach ($patterns[$slug]['references'] as $child) {
        $visit($child, [...$trail, $slug]);
    }
    $state[$slug] = 2;
};
foreach (array_keys($patterns) as $slug) {
    $visit($slug);
}

if ($errors !== []) {
    fwrite(STDERR, implode("\n", array_unique($errors)) . "\n");
    exit(1);
}
printf("Pattern references passed: %d page patterns, %d page references; no missing targets or cycles.\n", count($pages), $referenceCount);
