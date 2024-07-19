FROM composer:latest AS composer
FROM php:8.2-fpm
COPY --from=composer /usr/bin/composer /usr/bin/composer

ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y && \
    apt-get install -y --no-install-recommends \
        libpq-dev \
        libxml2-dev \
        mc \
        htop \
        libc-client-dev \
        libkrb5-dev \
        libpng-dev \
        libmagickwand-dev \
        nodejs \
        zlib1g-dev \
        libzip-dev \
        telnet && \
    rm -r /var/lib/apt/lists/* && \
    rm -rf /tmp/pear && \
    apt-get clean -y

RUN docker-php-ext-configure pgsql --with-pgsql \
    && docker-php-ext-install pgsql pdo_pgsql pdo_mysql \
    && docker-php-ext-install soap mysqli zip gd pcntl intl simplexml \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

RUN pecl install imagick redis xdebug \
    && docker-php-ext-enable imagick redis xdebug

# Настройка Xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug
ENV PHP_IDE_CONFIG 'serverName=docker'
COPY conf/php.ini /usr/local/etc/php
COPY conf/20-xdebug.ini /usr/local/etc/php/conf.d/
COPY start.sh /start.sh
