FROM php:8.4-fpm-alpine

# Install dev tools
RUN apk add --no-cache \
    git 

# Install production dependencies
RUN apk add --no-cache \
    libpng \
    libjpeg-turbo \
    libzip \
    mariadb-client

# Install build dependencies
RUN apk add --no-cache --virtual .build-deps \
    linux-headers \
    autoconf \
    g++ \
    make \
    mariadb-dev \
    libzip-dev \
    libpng-dev \
    jpeg-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql opcache
RUN docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Remove build dependencies
RUN apk del .build-deps

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
