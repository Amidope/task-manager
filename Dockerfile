# syntax=docker/dockerfile:1

FROM php:8.3-fpm-alpine3.20

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache bash make nodejs npm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN set -eux; \
    install-php-extensions excimer pdo_pgsql;

WORKDIR /app

COPY . .

RUN composer install --no-interaction

RUN cp .env.example .env && php artisan config:cache

RUN npm ci && npm run build

RUN --mount=type=secret,id=DATABASE_URL,env=DATABASE_URL \
    --mount=type=secret,id=APP_KEY,env=APP_KEY

CMD ["bash", "-c", "\
    php artisan config:clear && \
    php artisan config:cache && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan serve --host=0.0.0.0 --port=8000"]




