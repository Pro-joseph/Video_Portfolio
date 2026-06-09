FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libicu-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl zip pdo_sqlite bcmath mbstring exif gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader \
    && cp .env.example .env \
    && php artisan key:generate --force \
    && touch database/database.sqlite \
    && php artisan migrate --force \
    && php artisan storage:link

CMD php -S 0.0.0.0:$PORT -t public
