<?php
/** @var array $media */
/** @var array $areas */
/** @var array $team */
/** @var array $homeReflections */
?>
<main id="home" tabindex="-1">
  <section class="lw-hero relative isolate flex min-h-[700px] items-start overflow-hidden sm:min-h-[720px] lg:min-h-[clamp(720px,100svh,960px)] lg:items-center" aria-labelledby="hero-title">
    <div class="absolute inset-0 -z-20" aria-hidden="true">
      <video class="lw-hero-video size-full object-cover" autoplay muted loop playsinline preload="metadata" poster="/images/hero-meadow-poster.jpg" tabindex="-1" data-hero-video>
        <source src="/assets/bg-video/4909470-hd_1920_1080_25fps.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="lw-hero-wash absolute inset-0 -z-10" aria-hidden="true"></div>

    <div class="mx-auto w-full max-w-[1280px] px-6 pt-12 pb-16 sm:px-10 lg:py-20 xl:px-16">
      <div class="lw-hero-copy relative max-w-[600px]">

        <h1 id="hero-title" class="m-0 font-royal text-[clamp(58px,7.4vw,108px)] font-medium leading-[0.92] tracking-[-0.03em] text-lw-navy">
          Come <em class="block font-normal italic text-lw-teal">as you are.</em>
        </h1>

        <p class="m-0 mt-7 max-w-[30rem] text-[19px] leading-[1.65] text-lw-slate sm:text-[20px]">
          We&apos;ll meet you where you are, and find a way forward, together. Thoughtful, affirming counseling for adults, couples, and families.
        </p>

        <div class="mt-9 flex flex-wrap items-center gap-x-6 gap-y-4">
          <a class="lw-hero-cta group inline-flex items-center gap-3 rounded-full bg-lw-navy py-2 pr-2 pl-6 text-[15px] font-semibold text-white no-underline shadow-[0_14px_30px_-12px_rgba(0,30,75,0.55)] transition hover:bg-lw-teal" href="<?= CONSULTATION ?>">
            Book a free 15-minute consultation
            <span class="grid size-10 place-items-center rounded-full bg-lw-aqua text-lw-navy transition group-hover:translate-x-0.5" aria-hidden="true">↗</span>
          </a>
          <a class="inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/80 px-5 py-3.5 text-[15px] font-semibold text-lw-navy no-underline shadow-[0_10px_24px_-16px_rgba(0,30,75,0.5)] backdrop-blur-md transition hover:bg-white hover:text-lw-teal" href="/careteam/">Meet our counselors <span aria-hidden="true">→</span></a>
        </div>

      </div>
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

  <?php
  $sanctuaryFeatures = [
      ['Unhurried sessions', 'Care structured with room to breathe, uncompressed by standard clinical rush or sterile environments.', $media['sanctuary-garden']],
      ['Acoustic privacy', 'Discrete, sound-insulated counseling suites in North Fort Worth with calming natural textures and hospitality.', $media['hero-consultation']],
      ['Statewide telehealth', 'Bank-grade encrypted, high-fidelity video appointments available across all 254 Texas counties.', $media['hero-stress']],
  ];
  ?>
  <section class="lw-sanctuary relative isolate overflow-hidden" id="sanctuary" aria-labelledby="sanctuary-title">
    <div class="mx-auto max-w-[1280px] px-6 py-20 sm:px-10 lg:py-28 xl:px-16">
      <div class="grid items-center gap-14 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20">
        <div>
          <p class="m-0 inline-flex items-center gap-2.5 text-[12px] font-semibold tracking-[0.18em] text-lw-teal uppercase"><span aria-hidden="true">✦</span> The Sanctuary Experience</p>
          <h2 id="sanctuary-title" class="m-0 mt-5 font-royal text-[clamp(40px,4.8vw,66px)] leading-[1.04] font-medium tracking-[-0.02em] text-lw-navy">A space designed for <em class="font-normal text-lw-teal italic">calm, dignity &amp; clarity.</em></h2>
          <p class="m-0 mt-6 max-w-[34rem] text-[17px] leading-[1.75] text-lw-slate">Whether connecting from the privacy of your home across Texas or stepping through our doors in North Fort Worth, our care is anchored in unhurried presence, warmth, and real understanding.</p>
          <div class="mt-9 flex flex-wrap items-center gap-x-6 gap-y-4">
            <a class="lw-hero-cta group inline-flex items-center gap-3 rounded-full bg-lw-navy py-2 pr-2 pl-6 text-[15px] font-semibold text-white no-underline shadow-[0_14px_30px_-12px_rgba(0,30,75,0.55)] transition hover:bg-lw-teal" href="<?= CONSULTATION ?>">
              Experience thoughtful counseling
              <span class="grid size-10 place-items-center rounded-full bg-lw-aqua text-lw-navy transition group-hover:translate-x-0.5" aria-hidden="true">↗</span>
            </a>
            <a class="lw-link" href="/sanctuary/">Explore the Sanctuary <span aria-hidden="true">↗</span></a>
          </div>
          <p class="m-0 mt-6 text-[14px] text-lw-slate/80">No waitlists &bull; Complimentary initial conversation</p>
        </div>

        <div class="relative mx-auto w-[calc(100%-2.5rem)] max-w-[440px]">
          <figure class="lw-sanctuary-arch m-0">
            <img src="/images/office-sanctuary.jpg" alt="The LifeWise counseling room in North Fort Worth, with two armchairs, soft lamps, and a colorful rug" width="900" height="1125" loading="lazy" />
          </figure>
          <div class="absolute -bottom-5 left-1/2 flex -translate-x-1/2 items-center gap-2.5 rounded-full border border-lw-aqua/60 bg-white/95 px-5 py-3 text-[14px] whitespace-nowrap text-lw-navy shadow-[0_18px_40px_-18px_rgba(0,30,75,0.45)] backdrop-blur">
            <svg class="size-[17px] text-lw-teal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
            Our North Fort Worth sanctuary
          </div>
        </div>
      </div>

      <ul class="m-0 mt-20 grid list-none gap-6 p-0 md:grid-cols-3 lg:mt-24">
<?php foreach ($sanctuaryFeatures as $i => [$featureTitle, $featureText, $featureImage]): ?>
        <li class="lw-sanctuary-card">
          <div class="lw-sanctuary-card-media"><img src="<?= e($featureImage['src']) ?>" alt="<?= e($featureImage['alt']) ?>" loading="lazy" /></div>
          <div class="p-6 sm:p-7">
            <span class="text-[12px] font-semibold tracking-[0.18em] text-lw-teal uppercase"><?= num($i + 1) ?></span>
            <h3 class="m-0 mt-2 font-royal text-[26px] leading-[1.15] font-medium text-lw-navy"><?= e($featureTitle) ?></h3>
            <p class="m-0 mt-3 text-[15px] leading-[1.7] text-lw-slate"><?= e($featureText) ?></p>
          </div>
        </li>
<?php endforeach; ?>
      </ul>
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

  <section class="lw-connect" aria-label="Professionals and urgent support">
    <div class="mx-auto grid w-full max-w-[1280px] gap-12 px-5 py-16 sm:px-10 lg:grid-cols-2 lg:gap-0 lg:py-24 xl:px-16">
      <div class="lg:pr-16">
        <span class="text-[12px] font-bold tracking-[0.16em] text-lw-teal">FOR PROFESSIONALS &amp; FUTURE COUNSELORS</span>
        <h2 class="m-0 mt-4 font-royal text-[clamp(32px,3.6vw,46px)] leading-[1.05] font-semibold tracking-[-0.02em] text-lw-navy">Let&apos;s make a <em class="font-normal italic text-lw-teal">thoughtful connection.</em></h2>
        <span class="mt-5 block max-w-[500px] text-[16px] leading-[1.75] text-lw-slate">Ask us about professional referrals, LPC supervision, and counselor development. We&apos;ll share the right next steps before you send any client information.</span>
        <a class="lw-connect-link mt-8" href="<?= PROFESSIONAL_MAIL ?>">Contact LifeWise <span aria-hidden="true">↗</span></a>
      </div>

      <div class="lw-connect-crisis lg:pl-16" aria-labelledby="crisis-title">
        <span class="text-[12px] font-bold tracking-[0.16em] text-lw-teal">NEED SUPPORT RIGHT NOW?</span>
        <h2 id="crisis-title" class="m-0 mt-4 font-royal text-[clamp(28px,2.8vw,36px)] leading-[1.1] font-semibold text-lw-navy">Help is available any time, day or night.</h2>
        <div class="mt-7">
          <a class="lw-crisis-row" href="tel:911"><b>911</b><span>If you&apos;re in immediate danger or facing a medical emergency</span><i aria-hidden="true">↗</i></a>
          <a class="lw-crisis-row" href="tel:988"><b>988</b><span>If you or someone you know is in crisis, call or text</span><i aria-hidden="true">↗</i></a>
          <a class="lw-crisis-row" href="https://988lifeline.org/get-help/" target="_blank" rel="noreferrer"><b class="lw-crisis-chat">Chat</b><span>Prefer to type? Chat with the 988 Lifeline</span><i aria-hidden="true">↗</i></a>
        </div>
      </div>
    </div>
    <?php partial('divider'); ?>
  </section>

  <?php partial('closing', [
      'title' => 'A small first conversation',
      'accent' => 'can help you see what comes next.',
      'text' => 'No pressure to have everything figured out. Bring your questions, and whatever words you have.',
  ]); ?>
</main>
