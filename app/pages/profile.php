<?php
/** @var array $provider @var array $page */
$person = $provider;
$intro = '<div class="profile-intro"><p>' . e($person['credentials']) . ' <span>· ' . e($person['pronouns']) . '</span></p><p>' . e($person['role']) . '</p>'
    . (!empty($person['supervised']) ? '<p>Supervised by Stacy Hixon, LPC-S</p>' : '')
    . '<p>' . e($person['format']) . '</p></div>';
$cta = in_array($person['path'], ['/lynn/', '/hazel-dettmer/'], true) ? 'Connect with LifeWise' : 'Find your next step';
partial('hero', [
    'eyebrow' => 'MEET THE TEAM', 'title' => $person['name'], 'description' => $person['note'],
    'image' => $person['image'], 'imageAlt' => $person['name'],
    'actions' => $intro . button($cta) . text_link('/careteam/', '← Our care team'),
]);
?>
<section class="page-editorial-layout">
  <aside class="page-sidebar">
    <p class="eyebrow">GET TO KNOW <?= e(explode(' ', $person['name'])[0]) ?></p>
<?php foreach (content_headings($page['html']) as [$id, $label]): ?>
    <a href="#<?= e($id) ?>"><?= e($label) ?></a>
<?php endforeach; ?>
    <?php partial('editorial-sidebar-note', ['eyebrow' => 'YOUR FIRST STEP', 'text' => 'A complimentary consultation can help you explore the right fit.', 'href' => '/consultation/', 'label' => 'Start a conversation']); ?>
  </aside>
  <div class="page-prose"><?= $page['html'] ?></div>
</section>
<?php partial('closing'); ?>
