FROM php:8.0.2-apache

WORKDIR /var/www/html

COPY src .

RUN docker-php-ext-install pdo_mysql

RUN chown -R www-data:www-data /var/www/html
