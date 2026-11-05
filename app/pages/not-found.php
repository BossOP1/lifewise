<?php partial('hero', [
    'eyebrow' => 'PAGE NOT FOUND', 'title' => 'Let’s find your', 'accent' => 'way back.',
    'description' => 'The page you’re looking for isn’t here. Explore our services or return home.',
    'compact' => true, 'actions' => button('Return home', '/') . text_link('/services/', 'Explore services ↗'),
]);
