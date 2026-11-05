<?php
declare(strict_types=1);

// PHP's built-in dev server: let it serve real files (images, CSS, JS) directly.
if (PHP_SAPI === 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($file !== __DIR__ . '/' && is_file($file)) return false;
}

require dirname(__DIR__) . '/app/bootstrap.php';

$requestPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

// Missing static files (favicon.ico, images, ...) get a plain 404 rather than a page.
if (preg_match('/\.(?!html$)[a-z0-9]{2,5}$/i', $requestPath)) {
    http_response_code(404);
    exit;
}

$path = normalize_path($requestPath);
$query = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_QUERY);

// Legacy and non-canonical URLs redirect to their trailing-slash route.
if ($path === '/featured-in-the-dallas-voyager/') $path = '/2026/04/09/featured-in-the-dallas-voyager/';
if ($path !== '/' && $path !== $requestPath) {
    header('Location: ' . $path . ($query !== '' ? "?$query" : ''), true, 301);
    exit;
}

$page = $content[$path] ?? null;
$provider = find_by($providers, 'path', $path);
$serviceItem = find_by($services, 'path', $path);

$template = match (true) {
    $path === '/' => 'home',
    $path === '/our-approach/' => 'approach',
    $path === '/sanctuary/' => 'sanctuary',
    $path === '/services/' => 'services',
    $path === '/careteam/' => 'team',
    $path === '/pricing/' => 'pricing',
    $path === '/consultation/' => 'consultation',
    $path === '/frequently-asked-questions/' && $page !== null => 'faq',
    $path === '/reflections/' || str_starts_with($path, '/category/') => 'reflections',
    $provider !== null && $page !== null => 'profile',
    !empty($page['article']) => 'article',
    $serviceItem !== null && $page !== null => 'service-detail',
    $page !== null => 'editorial',
    default => 'not-found',
};

if ($template === 'not-found') http_response_code(404);

$meta = $page ?? $navigationPages[$path] ?? null;
$title = match (true) {
    $path === '/' => 'LifeWise Counseling | Texas & North Fort Worth',
    $template === 'reflections' => 'LifeWise Reflections | LifeWise Counseling',
    $template === 'not-found' => 'Page not found | LifeWise Counseling',
    default => ($meta['title'] ?? 'LifeWise') . ' | LifeWise Counseling',
};
$description = $path === '/'
    ? 'LifeWise offers virtual counseling throughout Texas and in-person counseling in North Fort Worth for anxiety, trauma, neurodivergence, relationships, and more.'
    : (($meta['excerpt'] ?? '') !== '' ? mb_substr($meta['excerpt'], 0, 180) : 'Thoughtful counseling and wellness in North Fort Worth and throughout Texas.');

partial('layout-start', compact('path', 'title', 'description', 'services'));
if ($path === '/') {
    require APP_ROOT . '/pages/home.php';
} else {
    echo '<main id="page-content" class="interior-page" tabindex="-1">';
    require APP_ROOT . "/pages/$template.php";
    echo '</main>';
}
partial('layout-end');
