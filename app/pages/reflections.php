<?php
/** @var array $articles */
$categories = array_values(array_unique(array_merge(...array_map(fn ($a) => $a['categories'], $articles))));
array_unshift($categories, 'All reflections');
$pageSize = 9;
partial('hero', [
    'eyebrow' => 'LIFEWISE REFLECTIONS', 'title' => 'A moment to pause.', 'accent' => 'A little perspective.',
    'description' => 'Thoughts on being human, from the people behind your care. Explore relationships, identity, emotional wellbeing, and the work of finding your way.',
    'compact' => true,
]);
?>
<section class="page-section journal-section" data-journal data-page-size="<?= $pageSize ?>">
  <div class="journal-toolbar">
    <div class="journal-filters" aria-label="Filter reflections">
<?php foreach ($categories as $i => $category): ?>
      <button type="button"<?= $i === 0 ? ' class="active"' : '' ?> aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>" data-category="<?= e($category) ?>"><?= e($category) ?></button>
<?php endforeach; ?>
    </div>
    <label class="journal-search"><span class="sr-only">Search reflections</span><input type="search" placeholder="Find a reflection…" data-journal-search /><span aria-hidden="true">⌕</span></label>
  </div>
  <p class="journal-results" role="status" data-journal-results><?= count($articles) ?> reflections to explore</p>
  <div class="journal-grid" data-journal-grid>
<?php foreach ($articles as $i => $article): ?>
    <?php partial('article-card', ['article' => $article]); ?>
<?php endforeach; ?>
  </div>
  <div class="journal-empty hidden" data-journal-empty><h2>No reflections found.</h2><p>Try a different word, or explore the full collection.</p><button type="button" class="page-button" data-journal-reset>Show all reflections</button></div>
  <div class="journal-more" data-journal-more><button type="button" class="page-button page-button--outline">Load more reflections <span>↓</span></button></div>
</section>
<?php partial('closing'); ?>
