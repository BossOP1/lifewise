<?php
/** @var array $page @var array $articles @var string $path */
$currentIndex = (int) array_search($path, array_column($articles, 'path'), true);
$total = count($articles);
$related = [];
for ($i = 1; $i <= min(3, $total - 1); $i++) $related[] = $articles[($currentIndex + $i) % $total];
partial('hero', [
    'eyebrow' => $page['category'] ?: 'REFLECTIONS', 'title' => $page['title'], 'compact' => true,
    'actions' => '<div class="article-meta"><time datetime="' . e($page['date']) . '">' . e(format_date($page['date'])) . '</time><span>LifeWise Reflections</span></div>',
]);
?>
<?php if (!empty($page['image'])): ?>
<div class="article-cover"><img src="<?= e($page['image']) ?>" alt="<?= e($page['title']) ?>" /></div>
<?php endif; ?>
<article class="page-article">
  <a class="page-text-link" href="/reflections/">← All reflections</a>
  <div class="page-prose"><?= $page['html'] ?></div>
  <div class="article-end"><span>LifeWise Counseling &amp; Wellness</span><a href="/reflections/">Keep exploring ↗</a></div>
</article>
<section class="page-section page-section--sage">
  <div class="page-section-heading"><div><p class="eyebrow">A LITTLE MORE PERSPECTIVE</p><h2>Continue <em>reflecting.</em></h2></div></div>
  <div class="journal-grid">
<?php foreach ($related as $article): ?>
    <?php partial('article-card', ['article' => $article]); ?>
<?php endforeach; ?>
  </div>
</section>
