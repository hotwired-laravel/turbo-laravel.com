FROM serversideup/php:8.2-fpm-nginx as base

FROM base as builder

USER root

# Cache the vendor files first
COPY composer.json composer.lock /var/www/html

RUN mkdir -p app && \
    mkdir -p database/{factories,seeders} && \
    composer install --no-interaction --prefer-dist --no-scripts

FROM base

ENV SSL_MODE="off"

# Copy the app files...
COPY --chown=www-data:www-data . /var/www/html

# Copy the vendor folder from builder step...
COPY --from=builder --chown=www-data:www-data /var/www/html/vendor /var/www/html/vendor

# Re-run install, but now with scripts and optimizing the autoloader...
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Build TailwindCSS and Importmap
RUN php artisan tailwindcss:download && php artisan tailwindcss:build --prod && php artisan importmap:optimize

ENTRYPOINT ["/var/www/html/resources/docker/entrypoint.sh"]
