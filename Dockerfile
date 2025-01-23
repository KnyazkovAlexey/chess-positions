FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 testuser
RUN useradd -u 1000 -ms /bin/bash -g testuser testuser

WORKDIR /app

USER testuser

COPY . .