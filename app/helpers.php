<?php
declare(strict_types=1);

/** Escape text for HTML output. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Render a partial from app/partials with the given variables. */
function partial(string $__partial, array $__vars = []): void
{
    extract($__vars, EXTR_SKIP);
    require APP_ROOT . "/partials/$__partial.php";
}

/** Primary page button markup. */
function button(string $label = 'Start a conversation', string $href = '/consultation/', bool $secondary = false, bool $external = false): string
{
    return '<a class="page-button' . ($secondary ? ' page-button--outline' : '') . '" href="' . e($href) . '"'
        . ($external ? ' target="_blank" rel="noopener noreferrer"' : '') . '>' . e($label) . '<span aria-hidden="true">↗</span></a>';
}

/** Inline text link markup. */
function text_link(string $href, string $label, string $extraClass = ''): string
{
    return '<a class="page-text-link' . ($extraClass ? " $extraClass" : '') . '" href="' . e($href) . '">' . e($label) . '</a>';
}

/** Two-digit index label: 1 => "01". */
function num(int $index): string
{
    return str_pad((string) $index, 2, '0', STR_PAD_LEFT);
}

/** aria-current attribute when $active is true. */
function current_attr(bool $active): string
{
    return $active ? ' aria-current="page"' : '';
}

/** Normalize a request path to the site's trailing-slash route format. */
function normalize_path(string $path): string
{
    $result = preg_replace('#/+#', '/', rawurldecode($path)) ?: '/';
    if ($result === '/index.html' || $result === '/index.php') return '/';
    if (str_ends_with($result, '.html')) $result = str_replace('__', '/', substr($result, 0, -5));
    return str_ends_with($result, '/') ? $result : $result . '/';
}

/** "2026-10-01" => "October 1, 2026". */
function format_date(?string $date): string
{
    if (!$date) return 'LifeWise Reflections';
    $time = strtotime($date . ' 12:00:00');
    return $time ? date('F j, Y', $time) : 'LifeWise Reflections';
}

/** Truncate to $length characters, adding an ellipsis when shortened. */
function excerpt(string $text, int $length = 150): string
{
    return mb_strlen($text) > $length ? mb_substr($text, 0, $length) . '…' : $text;
}

/** [id, text] pairs for every <h2|h3|h4 id="..."> in imported HTML. */
function content_headings(string $html): array
{
    preg_match_all('/<h[234] id="([^"]+)">(.+?)<\/h[234]>/', $html, $matches, PREG_SET_ORDER);
    return array_map(fn ($m) => [$m[1], strip_tags($m[2])], $matches);
}

/** Parse an HTML fragment and return its top-level element nodes. */
function html_elements(string $html): array
{
    $doc = new DOMDocument();
    $previous = libxml_use_internal_errors(true);
    $doc->loadHTML('<?xml encoding="UTF-8"><!DOCTYPE html><html><head><meta charset="utf-8"></head><body>' . $html . '</body></html>');
    libxml_clear_errors();
    libxml_use_internal_errors($previous);
    $body = $doc->getElementsByTagName('body')->item(0);
    $elements = [];
    foreach ($body?->childNodes ?? [] as $node) {
        if ($node instanceof DOMElement) $elements[] = $node;
    }
    return $elements;
}

/** Serialize a DOM node back to HTML. */
function outer_html(DOMNode $node): string
{
    return (string) $node->ownerDocument->saveHTML($node);
}

/** Lowercase tag name of a node. */
function tag(DOMNode $node): string
{
    return strtolower($node->nodeName);
}

/** Text of the first <strong> inside a node, or null. */
function strong_text(DOMElement $node): ?string
{
    $strong = $node->getElementsByTagName('strong')->item(0);
    return $strong ? $strong->textContent : null;
}

/** Number of <br> elements inside a node. */
function br_count(DOMElement $node): int
{
    return $node->getElementsByTagName('br')->length;
}
