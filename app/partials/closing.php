<?php
/**
 * Closing call to action, shown above the footer on most pages.
 * Vars: professional (bool), or eyebrow / title / accent / text / href / label overrides.
 * `accent` is the italic teal end of the headline.
 */
$professional ??= false;
$eyebrow ??= $professional ? 'Grow with LifeWise' : 'Whenever you’re ready';
$title ??= $professional ? 'Let’s build something' : 'A conversation is';
$accent ??= $professional ? 'meaningful.' : 'a place to begin.';
$text ??= $professional ? 'Reach out about supervision, counselor development, or professional collaboration.' : 'You don’t need the perfect words. We’ll help you find your next step.';
$href ??= $professional ? PROFESSIONAL_MAIL : CONSULTATION;
$label ??= $professional ? 'Contact LifeWise' : 'Book a free 15-minute consultation';
?>
<section class="lw-cta" aria-labelledby="cta-title">
  <div class="mx-auto max-w-[1280px] px-5 py-14 sm:px-10 lg:py-16 xl:px-16">
    <div class="lw-cta-card grid items-stretch overflow-hidden lg:grid-cols-[1fr_auto]">
      <div class="px-7 pt-10 pb-2 sm:px-10 lg:py-10 lg:pr-8 lg:pl-14">
        <p class="m-0 inline-flex items-center gap-2.5 text-[12px] font-semibold tracking-[0.18em] text-lw-teal uppercase">
          <span class="lw-pulse size-2 rounded-full bg-lw-teal" aria-hidden="true"></span><?= e($eyebrow) ?>
        </p>
        <h2 id="cta-title" class="m-0 mt-3 font-royal text-[clamp(30px,3.2vw,44px)] leading-[1.1] font-medium tracking-[-0.015em] text-lw-navy">
          <?= e($title) ?> <em class="font-normal text-lw-teal italic"><?= e($accent) ?></em>
        </h2>
        <p class="m-0 mt-3 max-w-[34rem] text-[16px] leading-[1.65] text-lw-slate"><?= e($text) ?></p>
      </div>

      <div class="flex flex-col items-stretch justify-center gap-3 px-7 pt-6 pb-10 sm:items-start sm:px-10 lg:items-stretch lg:border-l lg:border-lw-teal/10 lg:py-10 lg:pr-12 lg:pl-10">
        <a class="lw-hero-cta group inline-flex items-center justify-between gap-3 rounded-full bg-lw-navy py-2 pr-2 pl-6 text-[15px] font-semibold text-white no-underline shadow-[0_14px_30px_-12px_rgba(0,30,75,0.55)] transition hover:bg-lw-teal" href="<?= e($href) ?>">
<?php if ($professional): ?>
          <?= e($label) ?>
<?php else: ?>
          <span class="sm:hidden">Book a free consultation</span><span class="hidden sm:inline"><?= e($label) ?></span>
<?php endif; ?>
          <span class="grid size-10 place-items-center rounded-full bg-lw-aqua text-lw-navy transition group-hover:translate-x-0.5" aria-hidden="true">↗</span>
        </a>
        <a class="inline-flex items-center justify-center gap-2.5 rounded-full border border-lw-navy/20 px-5 py-3 text-[15px] font-semibold text-lw-navy no-underline transition hover:border-lw-teal hover:text-lw-teal" href="tel:+18176028520">
          <svg class="size-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
          Call 817.602.8520
        </a>
<?php if (!$professional): ?>
        <p class="m-0 text-center text-[13px] text-lw-slate/80 sm:text-left lg:text-center">Complimentary &bull; 15 minutes</p>
<?php endif; ?>
      </div>
    </div>
  </div>
</section>
