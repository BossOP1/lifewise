<?php /** @var array $media @var array $services */ ?>
<?php partial('hero', [
    'eyebrow' => 'OUR SERVICES', 'title' => 'Support for the life', 'accent' => 'you’re living.',
    'description' => 'You don’t have to know exactly what kind of support you need. We’ll help you find the care and the person that feel right for you.',
    'image' => $media['services-overview']['src'], 'imageAlt' => $media['services-overview']['alt'],
    'actions' => button() . text_link('/careteam/', 'Meet your care team ↗'),
]); ?>
<section class="page-section">
  <div class="page-section-heading"><div><p class="eyebrow">ROOM FOR YOUR STORY</p><h2>Different needs.<br /><em>Thoughtful care.</em></h2></div><p>Individual, couples, and family counseling for adults. Online throughout Texas, with in-person care in select locations.</p></div>
  <div class="service-page-grid">
<?php foreach ($services as $i => $item): ?>
    <a class="service-page-card" href="<?= e($item['path']) ?>"><div class="service-page-image"><img src="<?= e($item['image']) ?>" alt="<?= e($item['imageAlt']) ?>" loading="lazy" /><span><?= num($i + 1) ?></span></div><div class="service-page-copy"><p class="eyebrow"><?= e($item['label']) ?></p><h3><?= e($item['title']) ?><span aria-hidden="true">↗</span></h3><p><?= e($item['desc']) ?></p><span class="page-text-link">Learn more</span></div></a>
<?php endforeach; ?>
  </div>
</section>
<section class="page-section page-section--sage">
  <div class="page-section-heading"><div><p class="eyebrow">BEYOND THE COUNSELING ROOM</p><h2>Care for those<br /><em>who care for others.</em></h2></div></div>
  <div class="page-two-grid">
    <a class="page-feature" href="/supervision/"><span class="eyebrow">FOR DEVELOPING COUNSELORS</span><h3>Supervision &amp; career development</h3><p>Build clinical confidence, ethical judgment, and a sustainable counseling career.</p><span class="page-text-link">Explore the program ↗</span></a>
    <a class="page-feature" href="https://steelarmormindset.com/" target="_blank" rel="noopener noreferrer"><span class="eyebrow">FIRST RESPONDERS &amp; VETERANS</span><h3>Steel Armor Mindset</h3><p>Nonclinical resilience and mental readiness programming for service-oriented communities.</p><span class="page-text-link">Visit Steel Armor Mindset ↗</span></a>
  </div>
</section>
<?php partial('closing'); ?>
