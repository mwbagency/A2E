<?php
/** Standalone PHP syntax check; no WordPress bootstrap or database needed. */

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$root = dirname(__DIR__);
$count = 0;
foreach (['wp-content/themes/one-base-theme', 'wp-content/mu-plugins', 'wp-content/plugins/pattern-refresh', 'scripts'] as $directory) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/' . $directory, FilesystemIterator::SKIP_DOTS));
    foreach ($files as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }
        $output = [];
        exec(escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($file->getPathname()) . ' 2>&1', $output, $status);
        if ($status !== 0) {
            fwrite(STDERR, implode("\n", $output) . "\n");
            exit(1);
        }
        ++$count;
    }
}
echo "PHP syntax passed for {$count} site-owned files.\n";
