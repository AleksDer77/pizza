FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    apt-utils \
    bash \
    iputils-ping \
    coreutils \
    libicu-dev \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    bcmath \
    gd \
    zip

RUN pecl install xdebug redis\
    && docker-php-ext-enable xdebug redis

COPY ./docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data \
    && groupmod -g 1000 www-data \
    && chown -R www-data:www-data /var/www

RUN echo "# Custom global bash configuration" > /etc/bash.bashrc \
    && echo "alias ll='ls -la'" >> /etc/bash.bashrc \
    && echo "alias art='php artisan'" >> /etc/bash.bashrc \
    && echo "alias comp='composer'" >> /etc/bash.bashrc \
    && echo "export PS1='🐳 \w $ '" >> /etc/bash.bashrc \
    && chmod 644 /etc/bash.bashrc

COPY --chown=www-data:www-data . /var/www

USER www-data
WORKDIR /var/www
