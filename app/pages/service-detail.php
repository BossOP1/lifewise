<?php
/** @var array $page @var array $serviceItem @var array $services @var array $serviceHeadlines */

/** Split a <br>-separated paragraph into trimmed lines. */
$linesFrom = function (DOMElement $node): array {
    $clone = $node->cloneNode(true);
    foreach (iterator_to_array($clone->getElementsByTagName('br')) as $br) {
        $br->parentNode->replaceChild($clone->ownerDocument->createTextNode("\n"), $br);
    }
    $text = preg_replace('/Low energy Disconnection/', "Low energy\nDisconnection", $clone->textContent, 1);
    return array_values(array_filter(array_map('trim', explode("\n", $text)), fn ($line) => $line !== ''));
};

/** Render imported nodes, turning <br>-separated paragraphs into lists. */
$richBlocks = function (array $nodes, string $className = '') use ($linesFrom): string {
    $html = '';
    foreach ($nodes as $node) {
        if (tag($node) === 'hr') continue;
        if (tag($node) === 'p' && br_count($node) >= 2) {
            $html .= '<ul class="service-detail-list">' . implode('', array_map(fn ($line) => '<li>' . e($line) . '</li>', $linesFrom($node))) . '</ul>';
        } else {
            $html .= outer_html($node);
        }
    }
    return '<div class="service-copy ' . e($className) . '">' . $html . '</div>';
};

// Group the imported page into heading-led sections.
$sections = [];
$current = null;
foreach (html_elements($page['html']) as $element) {
    $text = trim($element->textContent);
    if (preg_match('/^h[234]$/', tag($element))) {
        if ($text === '') continue;
        $sections[] = ['title' => str_replace('shows uP', 'shows up', $text), 'id' => $element->getAttribute('id'), 'nodes' => []];
        $current = array_key_last($sections);
    } elseif ($current !== null && ($text !== '' || tag($element) === 'hr')) {
        $sections[$current]['nodes'][] = $element;
    }
}

$first = array_shift($sections);
$firstDivider = null;
foreach ($first['nodes'] as $i => $node) if (tag($node) === 'hr') { $firstDivider = $i; break; }
$intro = array_filter(array_slice($first['nodes'], 0, $firstDivider ?? count($first['nodes'])), fn ($n) => tag($n) === 'p');
$experience = array_slice($first['nodes'], $firstDivider === null ? 0 : $firstDivider + 1);

$symptoms = [];
foreach ($experience as $node) {
    if (br_count($node) >= 2) foreach ($linesFrom($node) as $line) if (!str_ends_with($line, ':')) $symptoms[] = $line;
}
$notes = array_values(array_filter($experience, fn ($n) => tag($n) === 'p' && br_count($n) === 0 && trim($n->textContent) !== (($s = strong_text($n)) === null ? null : trim($s))));

$helpIndex = null;
foreach ($sections as $i => $section) if (preg_match('/how counseling can help/i', $section['title'])) { $helpIndex = $i; break; }
$cards = [];
foreach ($helpIndex === null ? [] : $sections[$helpIndex]['nodes'] as $node) {
    $strong = tag($node) === 'p' ? strong_text($node) : null;
    if ($strong === null) continue;
    $cards[] = ['title' => $strong, 'text' => trim(mb_substr($node->textContent, mb_strlen($strong)))];
}
$before = $helpIndex === null ? $sections : array_slice($sections, 0, $helpIndex);
$closing = end($sections) ?: ['title' => '', 'nodes' => []];
$after = $helpIndex === null ? [] : array_slice($sections, $helpIndex + 1, -1);
$closingNodes = array_filter($closing['nodes'], fn ($n) => tag($n) === 'p' && !preg_match('/^schedule a 15/i', $n->textContent));

[$opening, $accent] = $serviceHeadlines[$serviceItem['path']];
$related = array_slice(array_values(array_filter($services, fn ($s) => $s['path'] !== $serviceItem['path'])), 0, 3);
$detailImage = $serviceItem['detailImage'] ?? ['src' => $serviceItem['image'], 'alt' => $serviceItem['imageAlt']];

$botanicalRule = fn (bool $dark = false) => '<div class="service-rule' . ($dark ? ' service-rule--dark' : '') . '" aria-hidden="true"><span></span><svg viewBox="0 0 72 36" fill="none"><path d="M36 28C26 27 16 20 9 10M36 28C46 27 56 20 63 10" /><path d="M16 18C9 18 7 13 8 8C14 9 17 12 16 18ZM23 23C17 26 12 24 10 20C15 17 20 19 23 23ZM24 23C21 18 23 13 27 11C30 16 29 20 24 23ZM56 18C63 18 65 13 64 8C58 9 55 12 56 18ZM49 23C55 26 60 24 62 20C57 17 52 19 49 23ZM48 23C51 18 49 13 45 11C42 16 43 20 48 23Z" /><path d="M36 17L39 21L36 25L33 21Z" /></svg><span></span></div>';
$action = fn (string $label = 'Start a conversation', bool $light = false) => '<a class="service-action' . ($light ? ' service-action--light' : '') . '" href="/consultation/">' . e($label) . '<span aria-hidden="true">↗</span></a>';
?>
<div class="service-detail">
  <section class="service-hero">
    <figure class="service-hero-photo"><img src="<?= e($serviceItem['hero']['src']) ?>" alt="<?= e($serviceItem['hero']['alt']) ?>" style="object-position: <?= e($serviceItem['hero']['position'] ?? 'center 35%') ?>" /><figcaption><?= e($serviceItem['label']) ?></figcaption></figure>
    <div class="service-hero-shade" aria-hidden="true"></div>
    <div class="service-hero-inner">
      <div class="service-breadcrumb"><a href="/">Home</a><span>/</span><a href="/services/">Our services</a><span>/</span><span><?= e($serviceItem['title']) ?></span></div>
      <p class="eyebrow"><?= e($serviceItem['title']) ?></p>
      <h1><?= e($opening) ?><br /><em><?= e($accent) ?></em></h1>
      <p class="service-hero-description"><?= e($serviceItem['desc']) ?></p>
      <div class="service-hero-actions"><?= $action(light: true) ?><a href="/our-approach/" class="service-discover">Learn about our approach <span aria-hidden="true">↗</span></a></div>
      <div class="service-hero-note"><span aria-hidden="true">✦</span> Thoughtful care. At a pace that works for you.</div>
    </div>
  </section>

  <div class="service-care-strip"><span><i aria-hidden="true"></i> Online throughout Texas</span><span>In-person care in select locations</span><a href="/consultation/">Complimentary 15-minute consultation <b aria-hidden="true">↗</b></a></div>

  <section class="service-introduction service-section" id="your-experience">
    <?= $botanicalRule() ?>
    <div class="service-intro-heading"><p class="eyebrow">01 / A PLACE TO BE UNDERSTOOD</p><h2><?= e($first['title']) ?></h2><span class="service-small-rule" aria-hidden="true"></span></div>
    <?= $richBlocks($intro) ?>
  </section>

  <section class="service-experience service-section">
    <div class="service-experience-heading"><p class="eyebrow">YOU MAY RECOGNIZE SOME OF THIS</p><h2>Whatever you’re carrying,<br /><em>there’s room for it here.</em></h2><?= $notes ? $richBlocks($notes) : '' ?></div>
    <div class="service-topics-panel"><div class="service-topics-label"><span aria-hidden="true">✦</span><span><?= e($serviceItem['title']) ?></span></div><ul class="service-topics"><?php foreach ($symptoms as $item): ?><li><?= e($item) ?></li><?php endforeach; ?></ul><p>You don’t need to have the perfect words before reaching out.</p></div>
  </section>

  <section class="service-understanding service-section">
    <div class="service-understanding-photo"><img src="<?= e($detailImage['src']) ?>" alt="<?= e($detailImage['alt']) ?>" style="object-position: center 35%" loading="lazy" /><span class="service-photo-seal" aria-hidden="true">ROOM TO<br /><em>be you.</em></span></div>
    <div class="service-story-stack"><p class="eyebrow">02 / UNDERSTANDING YOUR EXPERIENCE</p><?php foreach ($before as $section): ?><article class="service-story" id="<?= e($section['id']) ?>"><h2><?= e($section['title']) ?></h2><?= $richBlocks($section['nodes']) ?></article><?php endforeach; ?></div>
  </section>

  <section class="service-counseling service-section" id="how-counseling-can-help">
    <?= $botanicalRule(true) ?>
    <div class="service-counseling-heading"><p class="eyebrow">03 / HOW COUNSELING CAN HELP</p><h2>Small shifts.<br /><em>More room to live.</em></h2><p>We’ll work together to understand your patterns and build support around what matters to you.</p></div>
    <div class="service-methods"><?php foreach ($cards as $i => $card): ?><article><div class="service-method-top"><span><?= num($i + 1) ?></span><span aria-hidden="true">✦</span></div><h3><?= e($card['title']) ?></h3><p><?= e($card['text']) ?></p></article><?php endforeach; ?></div>
    <a class="service-counseling-link" href="/careteam/">Find the person behind your care <span aria-hidden="true">↗</span></a>
  </section>

<?php if ($after): ?>
  <section class="service-more service-section"><div class="service-more-heading"><p class="eyebrow">CARE THAT SEES THE WHOLE PERSON</p><h2>There’s more to you<br /><em>than what brings you here.</em></h2></div><div class="service-more-grid"><?php foreach ($after as $section): ?><article id="<?= e($section['id']) ?>"><span class="service-more-mark" aria-hidden="true">✧</span><h3><?= e($section['title']) ?></h3><?= $richBlocks($section['nodes']) ?></article><?php endforeach; ?></div></section>
<?php endif; ?>

  <section class="service-ending service-section">
    <?= $botanicalRule() ?>
    <p class="eyebrow">WHENEVER YOU’RE READY</p><h2><?= e($closing['title']) ?></h2><?= $richBlocks($closingNodes) ?><?= $action('Book a free 15-minute consultation') ?><p class="service-ending-note">A small first conversation. No pressure to have everything figured out.</p>
  </section>

  <section class="service-related service-section"><div><p class="eyebrow">OTHER WAYS WE CAN HELP</p><h2>Explore more <em>support.</em></h2></div><div class="service-related-links"><?php foreach ($related as $item): ?><a href="<?= e($item['path']) ?>"><span><?= e($item['title']) ?></span><b aria-hidden="true">↗</b></a><?php endforeach; ?><a href="/services/" class="service-related-all">All LifeWise services <b aria-hidden="true">↗</b></a></div></section>
</div>
