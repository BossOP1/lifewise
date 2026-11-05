<?php
/** @var array $media */
/** @var array $areas */
/** @var array $team */
/** @var array $homeReflections */
?>
<main id="home" tabindex="-1">
  <section class="hero">
    <div class="hero-backdrop" aria-hidden="true">
      <video class="hero-background-video" autoplay muted loop playsinline preload="metadata" tabindex="-1" data-hero-video>
        <source src="/lightTheme.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="hero-shade" aria-hidden="true"></div>
    <div class="hero-content">
      <p class="hero-eyebrow">COUNSELING &amp; WELLNESS IN TEXAS</p>
      <h1 class="hero-heading"><span class="hero-opening">Come</span> <em>as you are.</em></h1>
      <p class="hero-description">We&apos;ll meet you where you are.<span>And find a way forward, together.</span></p>
      <p class="hero-care-format">In person in North Fort Worth. Online across Texas.</p>
      <a class="hero-action" href="<?= CONSULTATION ?>">Start a conversation <span aria-hidden="true">↗</span></a>
      <p class="hero-consultation-note">A complimentary 15-minute consultation.</p>
    </div>
  </section>

  <section class="intro" id="approach">
    <?php partial('divider'); ?>
    <div class="intro-visual">
      <div class="intro-tag"><span class="outline-num">01</span> A PLACE TO START, AS YOU ARE</div>
      <figure class="intro-nature-frame">
        <img src="<?= e($media['home-intro']['src']) ?>" alt="<?= e($media['home-intro']['alt']) ?>" width="1024" height="1536" loading="lazy" decoding="async" />
      </figure>
    </div>
    <div>
      <p class="eyebrow">YOU DON&apos;T NEED THE PERFECT WORDS</p>
      <h2>We&apos;ll listen, and find a way forward <em>together.</em></h2>
      <p class="intro-copy">Life can ask a lot of you. You don&apos;t have to have everything figured out before reaching out. We&apos;ll get to know what matters to you and help you find support that feels right, at a pace that works for you.</p>

      <div class="intro-media-grid">
        <div class="intro-media-card">
          <div class="intro-media-frame">
            <img src="/images/office-sanctuary.png" alt="LifeWise In-Person Counseling Office in North Fort Worth" loading="lazy" />
          </div>
          <div class="intro-media-label">
            <strong>In-Person Sanctuary</strong>
            <span>North Fort Worth, TX</span>
          </div>
        </div>
        <div class="intro-media-card">
          <div class="intro-media-frame">
            <img src="/images/community-care.png" alt="Care Built Around the Person" loading="lazy" />
          </div>
          <div class="intro-media-label">
            <strong>Care Built Around You</strong>
            <span>Diverse, Affirming Approaches</span>
          </div>
        </div>
      </div>

      <a class="under-link" href="<?= CONSULTATION ?>">Start with a conversation <span>↗</span></a>
    </div>
  </section>

  <section class="philosophy-section">
    <div class="philosophy-glow" aria-hidden="true"></div>
    <div class="philosophy-inner">
      <span class="philosophy-symbol">“</span>
      <blockquote class="philosophy-quote">
        Healing is not about fixing what is broken. It is about remembering who you are when you no longer have to carry it all alone.
      </blockquote>
      <div class="philosophy-meta">
        <span class="philosophy-gold-line"></span>
        <p class="philosophy-caption">LIFEWISE CLINICAL PRACTICE &bull; NORTH FORT WORTH &amp; STATEWIDE TEXAS</p>
      </div>
    </div>
  </section>

  <section class="support" id="support">
    <?php partial('divider'); ?>
    <div class="section-head">
      <div>
        <p class="eyebrow">COUNSELING THAT MEETS YOU WHERE YOU ARE</p>
        <h2>Support for the life you&apos;re living.</h2>
      </div>
      <p>Practical, affirming counseling for the things you&apos;re carrying and the people you care about.</p>
    </div>
    <div class="area-grid">
<?php foreach ($areas as $area): $areaImage = $media[$area['media']]; ?>
      <a class="area-card area-card-link" href="<?= e($area['href']) ?>">
        <div class="area-card-thumb">
          <img src="<?= e($areaImage['src']) ?>" alt="<?= e($areaImage['alt']) ?>" loading="lazy" />
          <span class="area-badge"><?= e($area['badge']) ?></span>
        </div>
        <div class="area-card-body">
          <div class="area-card-header">
            <span class="area-card-num"><?= e($area['num']) ?></span>
            <span class="area-card-arrow">↗</span>
          </div>
          <h3><?= e($area['title']) ?></h3>
          <p><?= e($area['desc']) ?></p>
          <div class="area-card-tags">
<?php foreach ($area['tags'] as $tagLabel): ?>
            <span class="area-tag-pill"><?= e($tagLabel) ?></span>
<?php endforeach; ?>
          </div>
        </div>
      </a>
<?php endforeach; ?>
    </div>
    <div class="population-row">
      <p class="eyebrow">CARE THAT UNDERSTANDS YOUR WORLD</p>
      <p>First responders <i></i> Military members &amp; veterans <i></i> Helping professionals <i></i> LGBTQIA+ clients <i></i> Neurodivergent adults</p>
    </div>
  </section>

  <section class="recognition">
    <span class="recognition-star">✳</span>
    <p>Grounded, human care. <a href="/2026/04/09/featured-in-the-dallas-voyager/">Read our feature in Dallas Voyager <b>↗</b></a></p>
  </section>

  <section class="team-section" id="team">
    <?php partial('divider'); ?>
    <div class="team-heading">
      <div>
        <p class="eyebrow">THE PEOPLE BEHIND YOUR CARE</p>
        <h2>A team with room for <em>your story.</em></h2>
      </div>
      <div>
        <p>Our team brings different personalities, backgrounds, strengths, and approaches to the work. We can help you find a provider who feels right for you.</p>
        <a class="under-link" href="/careteam/">Get to know the team <span>↗</span></a>
      </div>
    </div>
    <div class="team-grid">
<?php foreach ($team as $i => $person): ?>
      <a class="team-person" href="<?= e($person['href']) ?>">
        <div class="team-photo team-photo-<?= $i + 1 ?>">
          <img src="<?= e($person['image']) ?>" alt="<?= e($person['name']) ?>" loading="lazy" />
        </div>
        <div class="team-person-copy">
          <div>
            <h3><?= e($person['name']) ?></h3>
            <p><?= e($person['role']) ?></p>
          </div>
          <span aria-hidden="true">↗</span>
        </div>
      </a>
<?php endforeach; ?>
    </div>
  </section>

  <section class="sanctuary-banner" id="sanctuary">
    <?php partial('divider', ['tone' => 'dark']); ?>
    <div class="sanctuary-backdrop">
      <img src="/images/atrium-banner.png" alt="LifeWise Calming Atrium Sanctuary" loading="lazy" />
      <div class="sanctuary-gradient"></div>
    </div>
    <div class="sanctuary-content">
      <div class="sanctuary-prestige-tag"><span>✦</span> THE SANCTUARY EXPERIENCE</div>
      <h2>A space designed for <em>calm, dignity &amp; clarity.</em></h2>
      <p>Whether connecting from the privacy of your home across Texas or stepping through our doors in North Fort Worth, our care is anchored in unhurried presence, warmth, and real understanding.</p>

      <div class="sanctuary-features-grid">
        <div class="sanctuary-feature-card">
          <div class="feature-icon">✦</div>
          <h4>Unhurried Sessions</h4>
          <p>Care structured with room to breathe, uncompressed by standard clinical rush or sterile environments.</p>
        </div>
        <div class="sanctuary-feature-card">
          <div class="feature-icon">✦</div>
          <h4>Acoustic Privacy</h4>
          <p>Discrete, sound-insulated counseling suites in North Fort Worth with calming natural textures and hospitality.</p>
        </div>
        <div class="sanctuary-feature-card">
          <div class="feature-icon">✦</div>
          <h4>Statewide Telehealth</h4>
          <p>Bank-grade encrypted, high-fidelity video appointments available across all 254 Texas counties.</p>
        </div>
      </div>

      <div class="sanctuary-actions">
        <a class="sanctuary-cta" href="<?= CONSULTATION ?>">Experience thoughtful counseling <b>↗</b></a>
        <span class="sanctuary-note">No waitlists &bull; Complimentary initial conversation</span>
      </div>
    </div>
  </section>

  <section class="reflections-section" id="reflections">
    <?php partial('divider'); ?>
    <div class="section-head">
      <div>
        <p class="eyebrow">THE LIFEWISE JOURNAL &bull; BETWEEN SESSIONS</p>
        <h2>Perspectives from <em>our counselors.</em></h2>
      </div>
      <p>Thoughtful writings on identity, mental health, emotional boundaries, and the human side of healing.</p>
    </div>
    <div class="reflections-grid">
<?php foreach ($homeReflections as $ref): ?>
      <article class="reflection-card">
        <div class="reflection-media">
          <img src="<?= e($ref['image']) ?>" alt="<?= e($ref['title']) ?>" loading="lazy" />
          <span class="reflection-pill"><?= e($ref['category']) ?></span>
        </div>
        <div class="reflection-body">
          <div class="reflection-meta-top">
            <time><?= e($ref['date']) ?></time>
            <span class="reflection-read-time"><?= e($ref['readTime']) ?></span>
          </div>
          <h3><?= e($ref['title']) ?></h3>
          <p><?= e($ref['desc']) ?></p>
          <div class="reflection-footer">
            <span class="reflection-author"><?= e($ref['author']) ?></span>
            <a class="reflection-link" href="<?= e($ref['href']) ?>">Read reflection <span>↗</span></a>
          </div>
        </div>
      </article>
<?php endforeach; ?>
    </div>
  </section>

  <section class="coverage" id="coverage">
    <div>
      <p class="eyebrow">MAKING CARE MORE ACCESSIBLE</p>
      <h2>Let&apos;s start with <em>what works.</em></h2>
      <p>See accepted insurance plans and self-pay information, then reach out if you would like help checking your benefits.</p>
      <a class="under-link" href="/pricing/">Insurance &amp; pricing <span>↗</span></a>
    </div>
    <div class="coverage-card">
      <small>INSURANCE &amp; PAYMENT</small>
      <h3>A clearer path to care.</h3>
      <ul>
        <li>Accepted insurance plans</li>
        <li>Benefits and coverage information</li>
        <li>Self-pay rates and Good Faith Estimate details</li>
        <li>Questions about your plan? Ask us before scheduling</li>
      </ul>
    </div>
    <?php partial('divider'); ?>
  </section>

  <section class="faq" id="faq">
    <?php partial('divider'); ?>
    <div class="faq-heading">
      <p class="eyebrow">A FEW THINGS YOU MAY BE WONDERING</p>
      <h2>Good questions. <em>Clear answers.</em></h2>
      <a class="under-link" href="/frequently-asked-questions/">More frequently asked questions <span>↗</span></a>
    </div>
    <div class="faq-list">
      <details><summary>Do you offer virtual counseling throughout Texas?</summary><p>Yes. LifeWise offers virtual counseling across Texas.</p></details>
      <details><summary>Do you offer in-person appointments?</summary><p>In-person care is available in North Fort Worth.</p></details>
      <details><summary>Do you accept insurance or EAP benefits?</summary><p>Plan participation can vary. Check the current insurance information, or ask us to help confirm your benefits before scheduling.</p></details>
      <details><summary>How do I know which provider may be a good fit?</summary><p>Start with a complimentary 15-minute conversation. We&apos;ll learn what you&apos;re looking for and help you explore a provider who may fit your needs.</p></details>
      <details><summary>Do I have to talk about everything right away?</summary><p>No. You can move at a pace that feels manageable and share only what you&apos;re ready to share.</p></details>
    </div>
  </section>

  <section class="referrals">
    <?php partial('divider'); ?>
    <div>
      <p class="eyebrow">FOR PROFESSIONALS &amp; FUTURE COUNSELORS</p>
      <h2>Let&apos;s make a thoughtful connection.</h2>
      <p>Contact us to ask about professional referrals, LPC supervision, and counselor development opportunities. We&apos;ll share the appropriate next steps before you send client information.</p>
    </div>
    <a href="<?= PROFESSIONAL_MAIL ?>">Contact LifeWise <span>↗</span></a>
  </section>

  <section class="crisis">
    <div>
      <p class="eyebrow">NEED SUPPORT RIGHT NOW?</p>
      <h2>If you&apos;re in immediate danger or facing a medical emergency, call 911.</h2>
      <p>If you or someone you know is in crisis, call or text 988, or chat with the 988 Lifeline.</p>
    </div>
    <a href="https://988lifeline.org/get-help/" target="_blank" rel="noreferrer">988 Lifeline <span>↗</span></a>
  </section>

  <section class="closing">
    <?php partial('divider', ['tone' => 'dark']); ?>
    <p class="eyebrow">WHENEVER YOU&apos;RE READY</p>
    <h2>A small first conversation can help you see what comes next.</h2>
    <p>No pressure to have everything figured out.</p>
    <a href="<?= CONSULTATION ?>">Book a free 15-minute consultation <span>↗</span></a>
  </section>
</main>
