FROM php:8.0.2-apache

WORKDIR /var/www/html

RUN docker-php-ext-install pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_15.x  | bash -
RUN apt-get -y install nodejs \
    git \
    zip

RUN apt-get update

ARG COMPOSER_ENV
ARG NPM_ENV=dev

COPY src .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN /usr/bin/composer install ${COMPOSER_ENV} && npm install && npm run ${NPM_ENV}

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite
