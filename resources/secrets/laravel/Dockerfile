FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
        git \
        zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install sockets \
    && curl -sS https://getcomposer.org/installer | php -- --version=1.10.15 \
    && mv composer.phar /bin/composer \
    && composer global require hirak/prestissimo
CMD php-fpm