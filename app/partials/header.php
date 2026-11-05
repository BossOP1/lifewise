<?php
/** @var string $path */
/** @var array $services */
$isService = $path === '/services/' || find_by($services, 'path', $path) !== null;
?>
    <header class="site-header<?= $path === '/' ? ' site-header--overlay' : '' ?>" data-site-header>
      <div class="header-inner">
        <a class="brand" href="/" aria-label="LifeWise home"><img src="/images/lifewise-logo.png" alt="LifeWise Counseling and Wellness" /></a>
        <nav id="main-navigation" aria-label="Main navigation" class="nav-links">
          <div class="nav-service-group<?= $isService ? ' is-current' : '' ?>" data-service-group>
            <div class="nav-service-trigger">
              <a href="/services/"<?= current_attr($isService) ?>>Services</a>
              <button type="button" aria-label="Explore services" aria-controls="service-navigation" aria-expanded="false" data-service-toggle><svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4" /></svg></button>
            </div>
            <div class="nav-service-menu" id="service-navigation" hidden>
              <div class="nav-menu-intro">
                <p class="eyebrow">CARE THAT MEETS YOU WHERE YOU ARE</p>
                <h2>A little support.<br /><em>A way forward.</em></h2>
                <p>Explore what feels right for you. We can help you find a place to begin.</p>
                <a href="/consultation/">Start a conversation <span aria-hidden="true">↗</span></a>
              </div>
              <div class="nav-service-options">
<?php foreach ($services as $i => $item): ?>
                <a href="<?= e($item['path']) ?>"<?= current_attr($path === $item['path']) ?>><small><?= num($i + 1) ?></small><span><?= e($item['title']) ?></span><b aria-hidden="true">↗</b></a>
<?php endforeach; ?>
                <a class="nav-all-services" href="/services/"><span>Explore all services</span><b aria-hidden="true">↗</b></a>
              </div>
            </div>
          </div>
          <a href="/careteam/"<?= current_attr($path === '/careteam/') ?>>Our team</a>
          <a href="/our-approach/"<?= current_attr($path === '/our-approach/') ?>>Our approach</a>
          <a href="/sanctuary/"<?= current_attr($path === '/sanctuary/') ?>>Sanctuary</a>
          <a href="/reflections/"<?= current_attr($path === '/reflections/' || str_starts_with($path, '/2026/')) ?>>Reflections</a>
          <a href="/pricing/"<?= current_attr($path === '/pricing/') ?>>Insurance &amp; pricing</a>
          <div class="nav-mobile-footer">
            <a href="/sanctuary/">Discover our Sanctuary <span aria-hidden="true">↗</span></a>
            <a href="/consultation/">Book a free 15-minute consultation <span aria-hidden="true">↗</span></a>
            <p>In North Fort Worth. Online across Texas.</p>
          </div>
        </nav>
        <div class="header-actions">
          <a class="nav-button" href="/consultation/">Let’s talk <span aria-hidden="true">↗</span></a>
          <button class="menu-toggle" type="button" aria-controls="main-navigation" aria-expanded="false" aria-label="Open navigation" data-menu-toggle><span></span><span></span></button>
        </div>
      </div>
    </header>
