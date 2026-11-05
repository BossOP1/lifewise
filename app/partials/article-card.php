<?php /** @var array $article */ $hasImage = !empty($article['image']); ?>
<a class="journal-card<?= $hasImage ? '' : ' journal-card--text' ?>" href="<?= e($article['path']) ?>" data-categories="<?= e(json_encode($article['categories'] ?? [], JSON_UNESCAPED_UNICODE)) ?>" data-search="<?= e(mb_strtolower($article['title'] . ' ' . $article['excerpt'])) ?>">
<?php if ($hasImage): ?>
  <div class="journal-card-image"><img src="<?= e($article['image']) ?>" alt="" loading="lazy" /><span><?= e($article['category']) ?></span></div>
<?php endif; ?>
  <div class="journal-card-copy">
    <time datetime="<?= e($article['date']) ?>"><?= e(format_date($article['date'])) ?></time>
<?php if (!$hasImage): ?>
    <p class="journal-card-category"><?= e($article['category']) ?></p>
<?php endif; ?>
    <h2><?= e($article['title']) ?></h2>
    <p><?= e(excerpt($article['excerpt'])) ?></p>
    <span class="page-text-link">Read reflection ↗</span>
  </div>
</a>
