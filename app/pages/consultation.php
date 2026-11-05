<?php
/** @var array $media */
$steps = [
    ['01', 'Tell us a little', 'Share what brings you here and what you’re hoping to find in counseling.'],
    ['02', 'Ask your questions', 'Talk about provider approaches, availability, fees, and insurance options.'],
    ['03', 'Explore the next step', 'Get help choosing a provider and understanding how to begin.'],
];
partial('hero', [
    'eyebrow' => 'COMPLIMENTARY CONSULTATION', 'title' => 'Start with', 'accent' => 'a conversation.',
    'description' => 'A little time to ask questions, share what you’re looking for, and explore the support that may fit your life.',
    'image' => $media['hero-consultation']['src'], 'imageAlt' => $media['hero-consultation']['alt'],
    'actions' => button('Book a free 15-minute consultation', BOOKING_URL, external: true) . '<span class="consultation-note">15 minutes · Complimentary · With Stacy Hixon</span>',
]);
?>
<section class="page-section">
  <div class="page-section-heading"><div><p class="eyebrow">A FIRST STEP, AT YOUR PACE</p><h2>You don’t need to have<br /><em>it all figured out.</em></h2></div><p>Our Clinical Director helps match you with the LifeWise provider who may be the best fit.</p></div>
  <div class="consultation-steps">
<?php foreach ($steps as [$stepNum, $stepTitle, $stepText]): ?>
    <article><span><?= e($stepNum) ?></span><h3><?= e($stepTitle) ?></h3><p><?= e($stepText) ?></p></article>
<?php endforeach; ?>
  </div>
  <div class="consultation-detail">
    <div><h3>Before we connect</h3><p>A consultation is not a therapy session and does not establish a therapeutic relationship. Please provide 24 hours’ notice for cancellation or rescheduling.</p><a class="page-text-link" href="/pricing/">Review insurance &amp; pricing ↗</a></div>
    <div class="consultation-contact"><p class="eyebrow">PREFER TO REACH OUT?</p><a href="mailto:lifewise@lifewisetx.com">lifewise@lifewisetx.com</a><a href="tel:+18176028520">817.602.8520</a><p>Please keep initial messages to contact and scheduling information.</p><?= button('Open the booking calendar', BOOKING_URL, external: true) ?></div>
  </div>
</section>
