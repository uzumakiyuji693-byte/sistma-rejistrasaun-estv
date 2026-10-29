FROM php:8.2-cli
WORKDIR /app
RUN apt-get update && apt-get install -y git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev && docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install pdo_mysql mbstring gd zip bcmath
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
COPY . /app
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN mkdir -p storage/app/public/estudante storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache
RUN composer install --no-interaction --no-dev --optimize-autoloader
RUN php artisan key:generate --force || true
RUN php artisan config:clear || true
EXPOSE 10000
CMD php artisan storage:link || true; php artisan migrate --force || true; php artisan serve --host=0.0.0.0 --port=10000
