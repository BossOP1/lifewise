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

    <div class="lw-topbar">
      <div class="mx-auto flex h-10 max-w-[1440px] items-center justify-between gap-4 px-5 text-[13px] sm:px-8 xl:px-[clamp(22px,5vw,76px)]">
        <span class="inline-flex items-center gap-2.5 whitespace-nowrap text-white/90">
          <span class="lw-topbar-dot" aria-hidden="true"></span>
          <span>Accepting new clients<span class="hidden sm:inline"> across Texas</span></span>
        </span>
        <span class="hidden items-center gap-3 text-white/55 lg:inline-flex">
          In person in North Fort Worth <span class="size-1 rounded-full bg-lw-aqua/60" aria-hidden="true"></span> Online across Texas
        </span>
        <span class="inline-flex items-center gap-5 whitespace-nowrap">
          <a class="lw-topbar-link hidden md:inline-flex" href="tel:+18176028520">
            <svg class="size-[14px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
            817.602.8520
          </a>
          <span class="hidden h-4 w-px bg-white/15 md:block" aria-hidden="true"></span>
          <a class="lw-topbar-link lw-topbar-link--accent" href="<?= CONSULTATION ?>"><span class="sm:hidden">Free consultation</span><span class="hidden sm:inline">Free 15-minute consultation</span> <span aria-hidden="true">→</span></a>
        </span>
      </div>
    </div>

<?php partial('header', compact('path', 'services')); ?>
