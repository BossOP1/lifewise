<?php /** Vars: eyebrow, title, accent, description, image (media entry) */
partial('hero', [
    'eyebrow' => $eyebrow, 'title' => $title, 'accent' => $accent, 'description' => $description,
    'image' => $image['src'], 'imageAlt' => $image['alt'], 'imagePosition' => $image['position'] ?? 'center 35%', 'caption' => false,
    'actions' => button() . text_link('/careteam/', 'Meet the people behind your care ↗'),
]);
