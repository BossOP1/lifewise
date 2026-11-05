<?php
/** @var array $page */
// Split the imported FAQ HTML into question/answer pairs.
$questions = [];
$current = null;
foreach (html_elements($page['html']) as $element) {
    $isHeading = (bool) preg_match('/^h[234]$/', tag($element));
    if ($isHeading || (tag($element) === 'p' && str_ends_with(trim($element->textContent), '?'))) {
        $questions[] = ['title' => $element->textContent, 'answer' => ''];
        $current = array_key_last($questions);
    } elseif ($current !== null) {
        $questions[$current]['answer'] .= outer_html($element);
    }
}
partial('hero', [
    'eyebrow' => 'FREQUENTLY ASKED QUESTIONS', 'title' => 'Good questions.', 'accent' => 'Clear answers.',
    'description' => 'A few things you may be wondering before you begin. If your question isn’t here, there’s room for it in a conversation.',
    'compact' => true,
]);
?>
<section class="page-editorial-layout">
  <aside class="page-sidebar"><p class="eyebrow">HERE TO HELP</p><p>You don’t have to choose a counselor on your own.</p><?= button() ?><a href="/pricing/">Insurance &amp; pricing ↗</a></aside>
  <div class="page-faq-list">
<?php foreach ($questions as $i => $q): ?>
    <details<?= $i === 0 ? ' open' : '' ?>><summary><?= e($q['title']) ?></summary><div class="page-prose"><?= $q['answer'] ?></div></details>
<?php endforeach; ?>
  </div>
</section>
<?php partial('closing'); ?>
