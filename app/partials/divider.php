<?php /** @var string $tone light|dark */ $tone ??= 'light'; ?>
<div class="section-divider section-divider--<?= e($tone) ?>" aria-hidden="true">
  <span class="section-divider-ornament">
    <svg viewBox="0 0 72 36" fill="none" focusable="false">
      <path class="divider-stem" d="M36 28C26 27 16 20 9 10M36 28C46 27 56 20 63 10" />
      <path class="divider-leaf" d="M16 18C9 18 7 13 8 8C14 9 17 12 16 18ZM23 23C17 26 12 24 10 20C15 17 20 19 23 23ZM24 23C21 18 23 13 27 11C30 16 29 20 24 23ZM56 18C63 18 65 13 64 8C58 9 55 12 56 18ZM49 23C55 26 60 24 62 20C57 17 52 19 49 23ZM48 23C51 18 49 13 45 11C42 16 43 20 48 23Z" />
      <path class="divider-seed" d="M36 17L39 21L36 25L33 21Z" />
    </svg>
  </span>
</div>
