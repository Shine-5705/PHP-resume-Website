# Build stage
FROM composer:2 AS builder

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

COPY . .
RUN php build.php

# Production stage
FROM nginx:alpine

RUN apk add --no-cache \
    php83 \
    php83-fpm \
    php83-json \
    php83-openssl \
    php83-curl \
    php83-zlib \
    php83-xml \
    php83-phar \
    php83-intl \
    php83-dom \
    php83-xmlreader \
    php83-ctype \
    php83-session \
    php83-mbstring \
    php83-gd \
    php83-tokenizer \
    supervisor

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf
COPY php-fpm.conf /etc/php83/php-fpm.d/www.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN mkdir -p /var/www/html /run/php
WORKDIR /var/www/html

COPY --from=builder /app/vendor ./vendor
COPY --from=builder /app/public ./public
COPY --from=builder /app/templates ./templates
COPY --from=builder /app/.htaccess ./public/.htaccess
COPY --from=builder /app/robots.txt ./public/robots.txt
COPY --from=builder /app/sitemap.xml ./public/sitemap.xml
COPY composer.json ./

RUN chown -R nginx:nginx /var/www/html && \
    chmod -R 755 /var/www/html

EXPOSE 8000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]