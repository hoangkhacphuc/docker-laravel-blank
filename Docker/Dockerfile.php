FROM php:8.2-fpm-alpine

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    supervisor

RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install swoole
RUN pecl install openswoole

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html
USER root
RUN chmod 777 -R /var/www/html

EXPOSE 9000 80 443 9001
CMD ["php-fpm"]