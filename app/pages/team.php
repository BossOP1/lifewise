<?php /** @var array $providers */ ?>
<?php partial('hero', [
    'eyebrow' => 'OUR CARE TEAM', 'title' => 'Real people.', 'accent' => 'Room for your story.',
    'description' => 'Different backgrounds, personalities, and approaches. One shared commitment to thoughtful, human care.',
    'compact' => true, 'actions' => button('Help me find a provider'),
]); ?>
<section class="page-section team-page-section">
  <div class="provider-grid">
<?php foreach ($providers as $person): ?>
    <a class="provider-card" href="<?= e($person['path']) ?>">
      <div class="provider-portrait"><img src="<?= e($person['image']) ?>" alt="<?= e($person['name']) ?>" loading="lazy" /><span><?= e($person['pronouns']) ?></span></div>
      <div class="provider-copy">
        <p class="eyebrow"><?= e($person['role']) ?></p>
        <h2><?= e($person['name']) ?><span aria-hidden="true">↗</span></h2>
        <p class="provider-credentials"><?= e($person['credentials']) ?></p>
<?php if (!empty($person['supervised'])): ?>
        <p class="provider-supervision">Supervised by Stacy Hixon, LPC-S</p>
<?php endif; ?>
        <p><?= e($person['note']) ?></p>
        <div class="page-tags"><?php foreach ($person['tags'] as $tagLabel): ?><span><?= e($tagLabel) ?></span><?php endforeach; ?></div>
        <small><?= e($person['format']) ?></small>
      </div>
    </a>
<?php endforeach; ?>
  </div>
</section>
<?php partial('closing'); ?>
