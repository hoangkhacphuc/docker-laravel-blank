FROM php:8.2-alpine

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    supervisor \
    autoconf \
    build-base

RUN docker-php-ext-install pdo pdo_mysql pcntl
RUN pecl channel-update pecl.php.net
RUN pecl install swoole
RUN docker-php-ext-enable swoole


WORKDIR /var/www/html
USER root
RUN chmod 775 -R /var/www/html

EXPOSE 8000
CMD ["php","artisan","octane:start","--port","8000","--server","swoole","--host","0.0.0.0"]