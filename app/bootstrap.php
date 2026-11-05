<?php
declare(strict_types=1);

const APP_ROOT = __DIR__;

/** Decode a JSON file from app/data. */
function load_json(string $name): array
{
    static $cache = [];
    return $cache[$name] ??= json_decode((string) file_get_contents(APP_ROOT . "/data/$name.json"), true, 512, JSON_THROW_ON_ERROR);
}

$content = load_json('content');
$media = load_json('media');
$navigationPages = load_json('navigation-pages');

require APP_ROOT . '/helpers.php';
require APP_ROOT . '/data.php';
