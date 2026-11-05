<?php
/**
 * Interior page hero. Vars: eyebrow, title, accent, description, image, imageAlt,
 * compact, imagePosition, caption (bool), actions (pre-rendered HTML),
 * alwaysActions (render the actions wrapper even when empty, for consistent spacing).
 */
$accent ??= null;
$description ??= null;
$image ??= null;
$imageAlt ??= '';
$compact ??= false;
$imagePosition ??= null;
$caption ??= true;
$actions ??= '';
$alwaysActions ??= false;
$classes = 'page-hero' . ($image ? ' page-hero--split' : '') . ($compact ? ' page-hero--compact' : '');
?>
<section class="<?= $classes ?>">
  <div class="page-hero-copy">
    <div class="page-breadcrumb"><a href="/">Home</a><span aria-hidden="true">/</span><span><?= e($eyebrow) ?></span></div>
    <p class="eyebrow"><?= e($eyebrow) ?></p>
    <h1><?= e($title) ?><?php if ($accent): ?> <em><?= e($accent) ?></em><?php endif; ?></h1>
<?php if ($description): ?>
    <p class="page-lead"><?= e($description) ?></p>
<?php endif; ?>
<?php if ($actions !== '' || $alwaysActions): ?>
    <div class="page-hero-actions"><?= $actions ?></div>
<?php endif; ?>
  </div>
<?php if ($image): ?>
  <figure class="page-hero-image"><img src="<?= e($image) ?>" alt="<?= e($imageAlt) ?>"<?= $imagePosition ? ' style="object-position: ' . e($imagePosition) . '"' : '' ?> /><?php if ($caption): ?><figcaption>LifeWise Counseling &amp; Wellness <span>Texas</span></figcaption><?php endif; ?></figure>
<?php endif; ?>
</section>
