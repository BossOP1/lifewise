<?php
declare(strict_types=1);

/*
 * Static site build for Netlify (or any static host).
 *
 *   php build.php            Render every route into dist/ and copy public assets.
 *
 * Netlify cannot execute PHP at request time, so each page is rendered once here
 * through public/index.php and saved as dist/<route>/index.html.
 * Each route renders in its own PHP process because index.php defines functions
 * and constants that cannot be declared twice in one process.
 */

$root = __DIR__;
$public = "$root/public";
$dist = "$root/dist";

// Child mode: render a single route to stdout.
if (($argv[1] ?? '') === '--render') {
    $_SERVER['REQUEST_URI'] = $argv[2] ?? '/';
    $_SERVER['REQUEST_METHOD'] = 'GET';
    chdir($public);
    require "$public/index.php";
    exit;
}

$started = microtime(true);

/** Remove a directory tree. */
function remove_tree(string $dir): void
{
    if (!is_dir($dir)) return;
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($items as $item) $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
    rmdir($dir);
}

/** Copy public/ into dist/, skipping the PHP front controller and Apache config. */
function copy_assets(string $from, string $to): int
{
    $skip = ['index.php', '.htaccess'];
    $count = 0;
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($from, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($items as $item) {
        $relative = substr($item->getPathname(), strlen($from) + 1);
        if (in_array($relative, $skip, true) || basename($relative) === '.DS_Store') continue;
        $target = "$to/$relative";
        if ($item->isDir()) {
            if (!is_dir($target)) mkdir($target, 0755, true);
        } else {
            copy($item->getPathname(), $target);
            $count++;
        }
    }
    return $count;
}

/** Render one route by running this script in --render mode. */
function render(string $route): string
{
    $command = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(__FILE__) . ' --render ' . escapeshellarg($route);
    $output = [];
    exec($command . ' 2>&1', $output, $status);
    $html = implode("\n", $output);
    if ($status !== 0 || preg_match('/<b>(Warning|Fatal error|Deprecated|Notice)<\/b>|PHP (Warning|Fatal error|Deprecated)/', $html)) {
        fwrite(STDERR, "Failed to render $route:\n" . substr($html, 0, 2000) . "\n");
        exit(1);
    }
    return $html;
}

// Collect routes from the same data the PHP site routes on.
$content = json_decode((string) file_get_contents("$root/app/data/content.json"), true, 512, JSON_THROW_ON_ERROR);
$navigation = json_decode((string) file_get_contents("$root/app/data/navigation-pages.json"), true, 512, JSON_THROW_ON_ERROR);
$routes = array_values(array_unique(['/', '/reflections/', ...array_keys($navigation), ...array_keys($content)]));

remove_tree($dist);
mkdir($dist, 0755, true);
$assets = copy_assets($public, $dist);

foreach ($routes as $route) {
    $directory = rtrim($dist . $route, '/');
    if (!is_dir($directory)) mkdir($directory, 0755, true);
    file_put_contents("$directory/index.html", render($route));
}

// Netlify serves dist/404.html, with a 404 status, for unknown URLs.
file_put_contents("$dist/404.html", render('/__not-found__/'));

printf("Built %d pages and a 404 page, copied %d assets into dist/ in %.1fs.\n", count($routes), $assets, microtime(true) - $started);
