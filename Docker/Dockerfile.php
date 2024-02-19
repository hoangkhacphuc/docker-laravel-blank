FROM php:8.2-alpine

# COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer
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

# RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \ 
#     && pecl install xdebug \
#     && docker-php-ext-enable xdebug \
#     && apk del pcre-dev ${PHPIZE_DEPS}

RUN docker-php-ext-install pdo pdo_mysql pcntl
RUN pecl channel-update pecl.php.net
RUN pecl install swoole
# RUN pecl install openswoole
RUN docker-php-ext-enable swoole


WORKDIR /var/www/html
USER root
RUN chmod 775 -R /var/www/html

EXPOSE 8000
CMD ["php","artisan","octane:start","--port","8000","--server","swoole"]