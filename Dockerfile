FROM composer

RUN apk add --no-cache nodejs npm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN set -eux; \
    install-php-extensions excimer pdo_pgsql;

WORKDIR /app

COPY . .

RUN composer install --no-interaction

#RUN npm ci

CMD ["bash", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]


