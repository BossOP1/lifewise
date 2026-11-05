<?php
/** @var array $page @var string $path @var array $media @var array $legalPaths @var array $resourceLinks @var ?array $serviceItem */
$legal = in_array($path, $legalPaths, true);
$professional = in_array($path, ['/supervision/', '/lifewise-career-development-program-2/', '/referral-partners/'], true);
$professionalImage = [
    '/supervision/' => $media['hero-supervision'],
    '/lifewise-career-development-program-2/' => $media['hero-career'],
    '/referral-partners/' => $media['hero-referrals'],
][$path] ?? null;
$actions = '';
if (!$legal) $actions .= $professional ? button('Connect with LifeWise', PROFESSIONAL_MAIL) : button('Find support');
if ($serviceItem) $actions .= text_link('/services/', '← All services');
partial('hero', [
    'eyebrow' => $legal ? 'CLIENT INFORMATION' : ($professional ? 'PROFESSIONAL & COMMUNITY SUPPORT' : 'OUR SERVICES'),
    'title' => $serviceItem['title'] ?? $page['title'],
    'description' => $serviceItem['desc'] ?? ($professional ? $page['excerpt'] : null),
    'image' => $serviceItem['hero']['src'] ?? $professionalImage['src'] ?? null,
    'imageAlt' => $serviceItem['hero']['alt'] ?? $professionalImage['alt'] ?? '',
    'compact' => $legal, 'actions' => $actions, 'alwaysActions' => true,
]);
$links = $legal ? $resourceLinks : array_map(fn ($h) => ['#' . $h[0], $h[1]], content_headings($page['html']));
?>
<section class="page-editorial-layout">
  <aside class="page-sidebar">
    <p class="eyebrow"><?= $legal ? 'HELPFUL INFORMATION' : 'ON THIS PAGE' ?></p>
<?php foreach ($links as [$href, $label]): ?>
    <a<?= current_attr($href === $path) ?> href="<?= e($href) ?>"><?= e($label) ?></a>
<?php endforeach; ?>
<?php if (!$legal): ?>
    <?php partial('editorial-sidebar-note', $professional
        ? ['eyebrow' => 'A THOUGHTFUL NEXT STEP', 'text' => 'Explore our clinical supervision and counselor development program.', 'href' => '/lifewise-career-development-program-2/', 'label' => 'Career development program']
        : ['eyebrow' => 'A THOUGHTFUL NEXT STEP', 'text' => 'Not sure where to begin? We can help you find the right provider.', 'href' => '/careteam/', 'label' => 'Meet the care team']); ?>
<?php endif; ?>
  </aside>
  <div class="page-prose"><?= $page['html'] ?></div>
</section>
<?php if (!$legal) partial('closing', ['professional' => $professional]); ?>
