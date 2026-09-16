#!/usr/bin/env bash
set -euo pipefail

echo "==> Installing PHP dependencies"
composer install --no-dev --optimize-autoloader

echo "==> Preparing dist/"
rm -rf dist
mkdir -p dist

echo "==> Rendering routes via the Slim app"
cat > public/_netlify_router.php <<'PHP'
<?php
$path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $path;
if ($path !== '/' && file_exists($file)) {
    return false;
}
require __DIR__ . '/index.php';
PHP

php -S 127.0.0.1:8917 -t public public/_netlify_router.php >/tmp/netlify-build-server.log 2>&1 &
SERVER_PID=$!
sleep 1

curl -sf http://127.0.0.1:8917/ -o dist/index.html
curl -sf http://127.0.0.1:8917/hackathons -o dist/hackathons.html
curl -sf http://127.0.0.1:8917/publications -o dist/publications.html
curl -sf http://127.0.0.1:8917/projects -o dist/projects.html

kill "$SERVER_PID" 2>/dev/null || true
rm -f public/_netlify_router.php

echo "==> Copying static assets"
cp -R public/css dist/css
cp -R public/assets dist/assets
cp -R public/blog dist/blog
cp public/favicon.svg dist/favicon.svg
cp public/favicon.ico dist/favicon.ico
cp public/apple-touch-icon.png dist/apple-touch-icon.png
[ -f robots.txt ] && cp robots.txt dist/robots.txt || true
[ -f sitemap.xml ] && cp sitemap.xml dist/sitemap.xml || true
touch dist/.nojekyll

echo "==> Build complete: $(find dist -type f | wc -l) files in dist/"
