<?php /** Vars: items ([title, text] pairs), class */ ?>
<div class="<?= e($class) ?>"><?php foreach ($items as $i => [$itemTitle, $itemText]): ?><article><span><?= num($i + 1) ?></span><h3><?= e($itemTitle) ?></h3><p><?= e($itemText) ?></p></article><?php endforeach; ?></div>
