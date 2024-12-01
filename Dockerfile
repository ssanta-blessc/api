FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git
RUN a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY ./.docker/apache.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html

RUN chmod -R 777 /var/www/html/

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN cp .env.example .env
RUN php artisan key:generate

RUN php artisan optimize
RUN php artisan optimize:clear
RUN php artisan config:cache
RUN php artisan event:cache
RUN php artisan route:cache
RUN php artisan view:cache

CMD ["apache2-foreground"]