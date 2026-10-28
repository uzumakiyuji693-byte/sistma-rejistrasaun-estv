FROM php:8.2-cli
WORKDIR /app
RUN apt-get update && apt-get install -y git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev && docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install pdo_mysql mbstring gd zip bcmath
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
COPY ..
RUN if [! -f .env ]; then cp .env.example .env; fi
RUN composer install --no-interaction --no-dev --optimize-autoloader
RUN php artisan key:generate --force
RUN php artisan config:clear
EXPOSE 10000
CMD php artisan migrate --force || true && php artisan serve --host=0.0.0.0 --port=10000
