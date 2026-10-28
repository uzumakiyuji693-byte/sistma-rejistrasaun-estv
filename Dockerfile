FROM php:8.2-cli
WORKDIR /app
RUN apt-get update && apt-get install -y git zip unzip libpng-dev libxml2-dev && docker-php-ext-install pdo_mysql mbstring gd
COPY ..
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate --force
EXPOSE 10000
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
