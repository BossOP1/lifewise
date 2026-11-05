<?php
/** Closing call to action. Vars: professional (bool), or eyebrow/title/text/href/label overrides. */
$professional ??= false;
$eyebrow ??= $professional ? 'GROW WITH LIFEWISE' : 'WHENEVER YOU’RE READY';
$title ??= $professional ? 'Let’s build something meaningful.' : 'A conversation is a place to begin.';
$text ??= $professional ? 'Reach out about supervision, counselor development, or professional collaboration.' : 'You don’t need the perfect words. We’ll help you find your next step.';
$href ??= $professional ? PROFESSIONAL_MAIL : '/consultation/';
$label ??= $professional ? 'Contact LifeWise' : 'Book a free 15-minute consultation';
?>
<section class="page-closing"><p class="eyebrow"><?= e($eyebrow) ?></p><h2><?= e($title) ?></h2><p><?= e($text) ?></p><?= button($label, $href) ?></section>
