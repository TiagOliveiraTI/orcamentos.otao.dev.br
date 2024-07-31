FROM php:8.3.9-fpm

# Adiciona e configura o usuário antes de mudar para ele
RUN apt-get update && \
    apt-get --no-install-recommends install git libzip-dev zip unzip -y && \
    useradd -ms /bin/bash otaodev && \
    # Instala dependências necessárias para Xdebug
    apt-get install -y --no-install-recommends \
    autoconf \
    build-essential \
    && pecl install xdebug \
    && docker-php-ext-install zip \
    && docker-php-ext-enable xdebug \
    && apt-get purge -y --auto-remove \
    autoconf \
    build-essential \
    && rm -rf /var/lib/apt/lists/*

USER otaodev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
