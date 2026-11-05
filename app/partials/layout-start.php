<?php
/** @var string $path */
/** @var string $title */
/** @var string $description */
/** @var array $services */
$cssVersion = @filemtime(dirname(APP_ROOT) . '/public/assets/css/site.css') ?: 1;
?><!doctype html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#0B2D5C" />
    <meta name="color-scheme" content="light" />
    <meta name="description" content="<?= e($description) ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/site.css?v=<?= $cssVersion ?>" />
    <title><?= e($title) ?></title>
  </head>
  <body>
    <a class="skip-link" href="<?= $path === '/' ? '#home' : '#page-content' ?>">Skip to content</a>
    <div class="reading-progress-track" aria-hidden="true">
      <div class="reading-progress-bar" style="transform: scaleX(0)"></div>
    </div>

<?php partial('header', compact('path', 'services')); ?>
