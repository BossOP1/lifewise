/* LifeWise site behaviour: header navigation, scroll effects, hero video, reflections filters. */
(() => {
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

  /* ── Reading progress, sticky header state, concierge dock ── */
  const progressBar = document.querySelector('.reading-progress-bar');
  const header = document.querySelector('[data-site-header]');
  const concierge = document.querySelector('[data-concierge]');
  const conciergeKey = 'lifewise-concierge-dismissed';
  const conciergeDismissed = () => { try { return sessionStorage.getItem(conciergeKey) === '1'; } catch { return false; } };
  // The footer has its own consultation button, so the dock steps aside while it is on screen.
  let footerVisible = false;
  const updateConcierge = () => {
    if (!concierge) return;
    if (footerVisible) concierge.classList.add('hidden');
    else if (window.scrollY > 480 && !conciergeDismissed()) concierge.classList.remove('hidden');
  };
  const footer = document.querySelector('.lw-footer');
  if (footer && 'IntersectionObserver' in window) {
    new IntersectionObserver(([entry]) => { footerVisible = entry.isIntersecting; updateConcierge(); }).observe(footer);
  }

  const onScroll = () => {
    const total = document.documentElement.scrollHeight - window.innerHeight;
    const progress = total > 0 ? window.scrollY / total : 0;
    if (progressBar) progressBar.style.transform = `scaleX(${progress})`;
    header?.classList.toggle('is-scrolled', progress > 0);
    updateConcierge();
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  document.querySelector('[data-concierge-close]')?.addEventListener('click', () => {
    concierge?.classList.add('hidden');
    try { sessionStorage.setItem(conciergeKey, '1'); } catch { /* Storage may be unavailable. */ }
  });

  /* ── Hero video respects reduced-motion preference ── */
  const heroVideo = document.querySelector('[data-hero-video]');
  if (heroVideo) {
    const updatePlayback = () => {
      if (reducedMotion.matches) heroVideo.pause();
      else heroVideo.play().catch(() => { /* Keep the hero usable if autoplay is blocked. */ });
    };
    updatePlayback();
    reducedMotion.addEventListener('change', updatePlayback);
  }

  /* ── Scroll reveal ── */
  if ('IntersectionObserver' in window && !reducedMotion.matches) {
    const targets = document.querySelectorAll('.intro-visual, .intro > div:last-child, .area-card, .coverage > div:not(.section-divider), .closing .eyebrow, .closing h2, .closing > p:not(.eyebrow), .closing > a, .team-person, .faq-list details, .recognition, .referrals > div:not(.section-divider), .referrals > a, .crisis > div, .crisis > a, .coverage-card, .section-head, .team-heading, .population-row, .faq-heading, .sanctuary-banner, .reflection-card, .philosophy-section');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -24px 0px' });
    targets.forEach((target, index) => {
      target.classList.add('scroll-reveal');
      target.style.setProperty('--reveal-delay', `${(index % 3) * 45}ms`);
      observer.observe(target);
    });
  }

  /* ── Header navigation and services menu ── */
  if (header) {
    const nav = header.querySelector('#main-navigation');
    const group = header.querySelector('[data-service-group]');
    const serviceButton = header.querySelector('[data-service-toggle]');
    const serviceMenu = header.querySelector('#service-navigation');
    const menuButton = header.querySelector('[data-menu-toggle]');
    const desktop = window.matchMedia('(min-width: 1201px)');
    const hoverCapable = window.matchMedia('(min-width: 1201px) and (hover: hover) and (pointer: fine)');
    let menuOpen = false;
    let servicesOpen = false;
    let hoverTimer;

    const render = () => {
      nav.classList.toggle('open', menuOpen);
      menuButton.setAttribute('aria-expanded', String(menuOpen));
      menuButton.setAttribute('aria-label', menuOpen ? 'Close navigation' : 'Open navigation');
      group.classList.toggle('expanded', servicesOpen);
      serviceButton.setAttribute('aria-expanded', String(servicesOpen));
      serviceMenu.hidden = !servicesOpen;
      if (menuOpen) requestAnimationFrame(() => { nav.scrollTop = 0; });
    };
    const setState = (menu, services) => { menuOpen = menu; servicesOpen = services; render(); };

    const openOnHover = () => {
      if (!hoverCapable.matches) return;
      clearTimeout(hoverTimer);
      setState(menuOpen, true);
    };
    const closeAfterHover = () => {
      if (!hoverCapable.matches) return;
      clearTimeout(hoverTimer);
      hoverTimer = setTimeout(() => setState(menuOpen, false), 180);
    };
    group.addEventListener('pointerenter', openOnHover);
    group.addEventListener('pointerleave', closeAfterHover);
    serviceMenu.addEventListener('pointerenter', openOnHover);
    serviceMenu.addEventListener('pointerleave', closeAfterHover);

    serviceButton.addEventListener('click', (event) => {
      setState(menuOpen, hoverCapable.matches && event.detail > 0 ? true : !servicesOpen);
    });
    menuButton.addEventListener('click', () => setState(!menuOpen, false));

    desktop.addEventListener('change', () => { clearTimeout(hoverTimer); setState(false, false); });
    document.addEventListener('keydown', (event) => {
      if (event.key !== 'Escape') return;
      if (servicesOpen) { setState(menuOpen, false); serviceButton.focus(); }
      else if (menuOpen) { setState(false, false); menuButton.focus(); }
    });
    document.addEventListener('pointerdown', (event) => {
      if ((menuOpen || servicesOpen) && !header.contains(event.target)) setState(false, false);
    });
  }

  /* ── Reflections archive: category filters, search, load more ── */
  const journal = document.querySelector('[data-journal]');
  if (journal) {
    const pageSize = Number(journal.dataset.pageSize) || 9;
    const cards = [...journal.querySelectorAll('[data-journal-grid] > .journal-card')];
    const filters = [...journal.querySelectorAll('[data-category]')];
    const searchInput = journal.querySelector('[data-journal-search]');
    const results = journal.querySelector('[data-journal-results]');
    const empty = journal.querySelector('[data-journal-empty]');
    const more = journal.querySelector('[data-journal-more]');
    const all = 'All reflections';
    let category = all;
    let shown = pageSize;

    const render = () => {
      const search = searchInput.value;
      const term = search.toLowerCase();
      const matches = cards.filter((card) => {
        const categories = JSON.parse(card.dataset.categories || '[]');
        return (category === all || categories.includes(category)) && card.dataset.search.includes(term);
      });
      const visible = new Set(matches.slice(0, shown));
      cards.forEach((card) => card.classList.toggle('hidden', !visible.has(card)));
      filters.forEach((button) => {
        const active = button.dataset.category === category;
        button.classList.toggle('active', active);
        button.setAttribute('aria-pressed', String(active));
      });
      const noun = matches.length === 1 ? 'reflection' : 'reflections';
      results.textContent = `${matches.length} ${noun}${search ? ` matching “${search}”` : ' to explore'}`;
      empty.classList.toggle('hidden', matches.length > 0);
      more.classList.toggle('hidden', shown >= matches.length);
    };

    filters.forEach((button) => button.addEventListener('click', () => {
      category = button.dataset.category;
      shown = pageSize;
      render();
    }));
    searchInput.addEventListener('input', () => { shown = pageSize; render(); });
    more.querySelector('button').addEventListener('click', () => { shown += pageSize; render(); });
    journal.querySelector('[data-journal-reset]').addEventListener('click', () => {
      searchInput.value = '';
      category = all;
      shown = pageSize;
      render();
    });
    render();
  }
})();
