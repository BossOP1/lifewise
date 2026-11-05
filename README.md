# LifeWise Counseling & Wellness website

A PHP website styled with Tailwind CSS. The pages share the brand's deep navy, teal, and white palette. Content and reference images come from the supplied `../scraped_site` clone.

The site includes services and seven service detail pages; a care team directory and five profiles; consultation booking; insurance and pricing; FAQs; referral partners; supervision and career development; five client information pages; and a searchable reflections archive with 35 full articles.

## Project layout

```
app/                  PHP application (not web-accessible)
  bootstrap.php       Loads data and helpers
  data.php            Team, services, pricing, and other site data
  helpers.php         Escaping, routing, date, and HTML-parsing helpers
  data/               content.json, media.json, navigation-pages.json
  partials/           Layout, header, footer, hero, closing, cards
  pages/              One template per page type
public/               Web root
  index.php           Front controller and router
  .htaccess           Apache rewrite to index.php
  assets/css/site.css Compiled Tailwind output (committed, do not edit by hand)
  assets/js/site.js   Navigation, scroll effects, reflections filters
  images/ fonts/ documents/ *.mp4
tailwind/             Tailwind CSS source and build tooling
  src/input.css       Entry point: theme tokens, sources, component layers
  src/components/     Site component styles
scripts/              Optional content import and site checks
```

## Run locally

Requires PHP 8.1 or newer. From this folder run:

```
php -S localhost:8000 -t public public/index.php
```

Then open http://localhost:8000.

## Styles (Tailwind CSS)

Styles live in `tailwind/` and compile to `public/assets/css/site.css`. Edit the files in `tailwind/src`, then rebuild:

```
cd tailwind
npm install      # once
npm run build    # minified build
npm run watch    # rebuild on change while developing
```

Tailwind v4 scans `app/` and `public/assets/js/` for utility classes, so you can use utilities such as `hidden`, `flex`, `text-ink`, or `bg-teal` directly in PHP templates. Brand colors and fonts are defined as theme tokens in `tailwind/src/input.css`. The existing component styles are imported into the `components` layer, so utilities override them when both apply. Tailwind's Preflight reset is not included, because the component styles and imported article content rely on browser defaults.

The compiled CSS is committed, so the server needs no Node.js. Rebuild only after changing styles or adding utility classes.

## Deploy

Upload the project to any PHP host. Point the document root at `public/`. If the host does not allow that, as is common on shared hosting, the root `.htaccess` forwards requests into `public/`. On Apache, `public/.htaccess` routes every page through `index.php`. On Nginx, use `try_files $uri /index.php?$query_string;`.

### Netlify

Netlify cannot run PHP when a page is requested, so the site is pre-rendered when Netlify builds it. `netlify.toml` compiles Tailwind and then runs `php build.php`. That renders every route through `public/index.php` into `dist/<route>/index.html`, writes `dist/404.html`, and copies the public assets. Netlify publishes `dist/`. Redirects for the old Dallas Voyager link and `/category/*` URLs are in `netlify.toml`.

To preview the static build locally, run `php build.php` and then `php -S localhost:8000 -t dist`. `dist/` is generated and ignored by git.

Clean URLs end with a slash. Requests without one, legacy `.html` URLs, and the old `/featured-in-the-dallas-voyager/` link redirect with a 301. Unknown pages return a 404 page.

## Content and navigation

The homepage is `app/pages/home.php`. Interior pages are chosen in `public/index.php` and rendered from `app/pages`. Imported page and article HTML is in `app/data/content.json`. Copied reference images live in `public/images/reference`.

The seven service detail pages use `app/pages/service-detail.php`. It parses the imported HTML with PHP's DOM extension into image-led introductions, topic panels, editorial sections, counseling approach cards, and closing invitations. The FAQ page splits its imported HTML into question-and-answer disclosures the same way. The shared navbar and service directory are in `app/partials/header.php`. They open on desktop hover and on mobile tap, driven by `public/assets/js/site.js`.

The site uses 26 people-focused Unsplash photographs and one garden photograph, all stored locally. The manifest is `app/data/media.json`, the images are in `public/images/unsplash`, and sources are recorded in `docs/media-credits.md`.

Internal links stay on the local website. The consultation page opens the original Google booking calendar. No backend form submission is required.

`python scripts/import-content.py` refreshes imported content and images from the supplied clone. It requires Beautiful Soup (`beautifulsoup4`). This is optional, because the site uses the checked-in content.

## Verification

`python scripts/check-site.py` starts PHP's built-in server and runs an isolated headless browser against it. It requires PHP, Python Playwright, and Chromium. It checks all routes, local links, browser errors, responsive widths, navigation and browser Back, search and category filters, load-more behavior, FAQs, and the consultation calendar link. Visual review captures are in `docs/qa`.
