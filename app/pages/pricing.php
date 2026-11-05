<?php /** @var array $rates @var array $insurers */ ?>
<?php partial('hero', [
    'eyebrow' => 'INSURANCE & PRICING', 'title' => 'Clear from', 'accent' => 'the beginning.',
    'description' => 'Fees vary by provider level. Insurance participation varies by clinician and plan. Let’s make the financial side of care easier to understand.',
    'compact' => true, 'actions' => button('Talk through your options'),
]); ?>
<section class="page-section page-section--sage" id="insurance">
  <div class="page-section-heading"><div><p class="eyebrow">INSURANCE PARTICIPATION</p><h2>Understand<br /><em>your coverage.</em></h2></div><p>Verify network status, eligibility, copays, deductibles, and coinsurance with your insurance company before beginning services.</p></div>
  <div class="page-two-grid">
    <article class="insurance-page-card">
      <h3>Licensed Professional Counselor</h3>
      <ul class="insurer-list"><?php foreach ($insurers as $insurer): ?><li><?= e($insurer) ?></li><?php endforeach; ?></ul>
      <a class="page-text-link" href="/stacy/">Meet your provider ↗</a>
    </article>
    <article class="insurance-page-card">
      <h3>LPC Associate</h3>
      <ul class="insurer-list"><li>Aetna</li><li>Blue Cross Blue Shield of Texas</li><li>Cigna</li></ul>
      <p>A listed company does not guarantee that every provider is in network with every plan. Coverage depends on your individual provider and plan.</p>
      <a class="page-text-link" href="/martha-sharpe/">Meet your provider ↗</a>
      <div class="estimate-note"><p class="eyebrow">PLANNING AHEAD</p><h4>Good Faith Estimates</h4><p>Uninsured or choosing to self-pay? You may request an estimate of expected charges before scheduling services.</p><a href="/good-faith-estimate/">Read about your estimate ↗</a></div>
    </article>
  </div>
</section>
<section class="page-section">
  <div class="page-section-heading"><div><p class="eyebrow">STANDARD PRIVATE PAY</p><h2>A path to care<br /><em>that fits your needs.</em></h2></div><p>Choose the provider level that fits your needs. Fees below are per counseling session.</p></div>
  <div class="pricing-grid">
<?php foreach ($rates as $rate): ?>
    <article class="pricing-page-card">
      <p class="eyebrow"><?= e($rate['label']) ?></p>
      <h3><?= e($rate['title']) ?></h3>
      <p><?= e($rate['subtitle']) ?></p>
      <div class="rate-row"><span>Individual counseling</span><strong>$<?= $rate['individual'] ?><small> / session</small></strong></div>
      <div class="rate-row"><span>Couples counseling</span><strong>$<?= $rate['couples'] ?><small> / session</small></strong></div>
      <a class="page-text-link" href="<?= e($rate['path']) ?>">Meet <?= e($rate['name']) ?> ↗</a>
<?php if ($rate['individual'] === 70): ?>
      <small class="rate-note">Intern sessions are self-pay only and are not billable to insurance.</small>
<?php endif; ?>
    </article>
<?php endforeach; ?>
  </div>
</section>
<?php partial('closing'); ?>
