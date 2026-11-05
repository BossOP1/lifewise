<?php $jsVersion = @filemtime(dirname(APP_ROOT) . '/public/assets/js/site.js') ?: 1; ?>
    <aside class="concierge-dock hidden" aria-label="LifeWise concierge consultation access" data-concierge>
      <div class="concierge-inner">
        <div class="concierge-status">
          <span class="concierge-dot"></span>
          <div class="concierge-info">
            <strong>LifeWise Concierge</strong>
            <span>Complimentary 15-Minute Consultation</span>
          </div>
        </div>
        <a class="concierge-btn" href="<?= CONSULTATION ?>">Reserve Time ↗</a>
        <button class="concierge-close" type="button" aria-label="Close concierge banner" title="Close" data-concierge-close>✕</button>
      </div>
    </aside>

<?php
$footerGroups = [
    'Explore' => [
        ['/services/', 'Services'], ['/our-approach/', 'Our approach'], ['/sanctuary/', 'Sanctuary'],
        ['/careteam/', 'Meet the team'], ['/reflections/', 'Reflections'], ['/frequently-asked-questions/', 'FAQs'],
    ],
    'For clients' => [
        ['/consultation/', 'Free consultation'], ['/pricing/', 'Insurance & pricing'], ['/good-faith-estimate/', 'Good Faith Estimate'],
        ['/client-rights/', 'Client rights'], ['/client-information-and-website-disclosures/', 'Credentials & disclosures'],
    ],
    'For professionals' => [
        ['/referral-partners/', 'Professional referrals'], ['/supervision/', 'LPC supervision'],
        ['/lifewise-career-development-program-2/', 'Career development'],
    ],
];
?>
    <footer class="lw-footer">
      <div class="relative mx-auto max-w-[1280px] px-6 pt-16 sm:px-10 lg:pt-20 xl:px-16">

        <div class="grid items-center gap-10 border-b border-white/10 pb-14 lg:grid-cols-[0.9fr_2.1fr] lg:gap-14">
          <div>
            <a class="inline-block" href="/" aria-label="LifeWise home"><img class="block h-auto w-[230px]" src="/images/lifewise-logo-light.png" alt="LifeWise Counseling and Wellness" width="690" height="230" loading="lazy" /></a>
            <div class="mt-5 max-w-[300px] text-[15px] leading-[1.7] text-white/65">Thoughtful, affirming counseling. In person in North Fort Worth and online across Texas.</div>
          </div>

          <ul class="m-0 grid list-none gap-4 p-0 sm:grid-cols-3">
            <li>
              <a class="lw-footer-tile" href="tel:+18176028520">
                <span class="lw-footer-tile-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg></span>
                <span class="lw-footer-tile-label">Call us</span>
                <span class="lw-footer-tile-value">817.602.8520</span>
              </a>
            </li>
            <li>
              <a class="lw-footer-tile" href="mailto:lifewise@lifewisetx.com">
                <span class="lw-footer-tile-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></span>
                <span class="lw-footer-tile-label">Email us</span>
                <span class="lw-footer-tile-value lw-footer-tile-value--sm">lifewise@<wbr>lifewisetx.com</span>
              </a>
            </li>
            <li>
              <a class="lw-footer-tile lw-footer-tile--primary" href="<?= CONSULTATION ?>">
                <span class="lw-footer-tile-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="4" y="5" width="16" height="15" rx="2"/><path d="M8 3v4M16 3v4M4 10h16"/></svg></span>
                <span class="lw-footer-tile-label">Free consultation</span>
                <span class="lw-footer-tile-value">Book 15 minutes <span class="lw-footer-tile-arrow" aria-hidden="true">↗</span></span>
              </a>
            </li>
          </ul>
        </div>

        <div class="grid grid-cols-2 gap-x-6 gap-y-12 py-14 sm:gap-x-8 lg:grid-cols-[1fr_1fr_1fr_1.35fr]">
<?php foreach ($footerGroups as $groupTitle => $links): ?>
          <nav aria-label="<?= e($groupTitle) ?>">
            <h2 class="m-0 text-[12px] font-semibold tracking-[0.18em] text-lw-aqua uppercase"><?= e($groupTitle) ?></h2>
            <ul class="m-0 mt-5 grid list-none gap-3 p-0">
<?php foreach ($links as [$href, $label]): ?>
              <li><a class="lw-footer-link" href="<?= e($href) ?>"><?= e($label) ?></a></li>
<?php endforeach; ?>
            </ul>
          </nav>
<?php endforeach; ?>

          <div class="col-span-2 self-start rounded-2xl border border-lw-aqua/20 bg-white/[0.05] p-6 lg:col-span-1" role="note" aria-label="Crisis support">
            <span class="grid size-10 place-items-center rounded-full bg-lw-aqua/15 text-lw-aqua" aria-hidden="true"><svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 5.6-7 10-7 10Z"/></svg></span>
            <div class="mt-4 text-[15px] leading-[1.65] text-white/70"><strong class="block text-[16px] text-white">Need support right now?</strong>Call or text <a class="font-semibold text-white" href="tel:988">988</a> for the Suicide &amp; Crisis Lifeline. In an emergency, call <a class="font-semibold text-white" href="tel:911">911</a>.</div>
            <a class="lw-link lw-link--light mt-5" href="https://988lifeline.org/get-help/" target="_blank" rel="noopener noreferrer">988 Lifeline <span aria-hidden="true">↗</span></a>
          </div>
        </div>
      </div>

      <div class="lw-footer-signature" aria-hidden="true">Come <em>as you are.</em></div>

      <div class="relative border-t border-white/10 bg-[#00173a]">
        <div class="mx-auto flex max-w-[1280px] flex-col gap-3 px-6 py-5 text-[13px] text-white/55 sm:px-10 md:flex-row md:items-center md:justify-between xl:px-16">
          <span>© <?= date('Y') ?> LifeWise Counseling and Wellness, PLLC. All rights reserved.</span>
          <span class="flex flex-wrap items-center gap-x-6 gap-y-2">
            <a class="lw-footer-legal" href="/website-privacy-policy/">Privacy</a>
            <a class="lw-footer-legal" href="/terms-of-use/">Terms of use</a>
            <a class="lw-footer-legal" href="#top">Back to top ↑</a>
          </span>
        </div>
      </div>
    </footer>
    <script src="/assets/js/site.js?v=<?= $jsVersion ?>" defer></script>
  </body>
</html>
