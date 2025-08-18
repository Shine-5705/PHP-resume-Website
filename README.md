# PHP Resume Website

A minimalist, single-page resume website built with PHP Slim Framework and SCSS.

## Quick Start

```bash
composer install
php build.php
php -S localhost:8000 -t public
```

## Docker

```bash
docker build -t resume-app .
docker run -p 8000:8000 resume-app
```

## Features

- Server-side rendering with PHP Slim
- SCSS compilation and JS minification
- SEO optimized with structured data
- Print-friendly and responsive design

## Credits

Design inspired by [Bartosz Jarocki's CV template](https://github.com/BartoszJarocki/cv) - adapted to PHP with SCSS.