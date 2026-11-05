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

    <footer>
      <div class="footer-main">
        <div class="footer-brand-block">
          <a class="footer-logo" href="/" aria-label="LifeWise home"><img src="/images/lifewise-logo.png" alt="LifeWise Counseling and Wellness" /></a>
          <p>Virtual counseling throughout Texas, with in-person care in North Fort Worth.</p>
        </div>
        <div class="footer-column">
          <h2>Explore</h2>
          <a href="/services/">Services</a>
          <a href="/our-approach/">Our approach</a>
          <a href="/sanctuary/">Sanctuary</a>
          <a href="/careteam/">Meet the team</a>
          <a href="/reflections/">Reflections</a>
          <a href="/frequently-asked-questions/">FAQs</a>
        </div>
        <div class="footer-column">
          <h2>Helpful information</h2>
          <a href="/pricing/">Insurance &amp; pricing</a>
          <a href="/referral-partners/">Professional referrals</a>
          <a href="/supervision/">LPC supervision</a>
          <a href="/website-privacy-policy/">Privacy</a>
          <a href="/terms-of-use/">Terms of use</a>
          <a href="/client-rights/">Client rights</a>
          <a href="/good-faith-estimate/">Good Faith Estimate</a>
          <a href="/client-information-and-website-disclosures/">Credentials &amp; disclosures</a>
        </div>
        <div class="footer-column footer-contact">
          <h2>Start a conversation</h2>
          <a class="footer-book" href="<?= CONSULTATION ?>">Book a free 15-minute consultation <span>↗</span></a>
          <a href="tel:+18176028520">817.602.8520</a>
          <a href="mailto:lifewise@lifewisetx.com">lifewise@lifewisetx.com</a>
          <small>For emergencies call 911. For immediate crisis support call or text 988.</small>
        </div>
      </div>
      <div class="footer-bottom">
        <small>© <?= date('Y') ?> LifeWise Counseling and Wellness, PLLC. All rights reserved.</small>
        <a href="https://988lifeline.org/get-help/">988 Lifeline <span>↗</span></a>
      </div>
    </footer>
    <script src="/assets/js/site.js?v=<?= $jsVersion ?>" defer></script>
  </body>
</html>
