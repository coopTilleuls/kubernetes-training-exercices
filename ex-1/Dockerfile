ARG PHP_VERSION=8.1
ARG COMPOSER_VERSION=2

FROM composer:${COMPOSER_VERSION} AS composer

FROM php:${PHP_VERSION}-fpm AS php_prod
RUN apt-get update ; \
    apt-get install --no-install-recommends -y \
    unzip \
    libpq-dev ; \
    docker-php-ext-install pdo pdo_pgsql
WORKDIR /app
COPY composer.json composer.lock symfony.lock ./
RUN --mount=from=composer,source=/usr/bin/composer,target=/usr/bin/composer \
    echo '<?php return [];' > .env.local.php; \
    composer install --prefer-dist --no-dev --no-scripts --no-progress; \
    composer dump-autoload --classmap-authoritative --no-dev;
COPY bin/console bin/
COPY config/ config/
COPY public/ public/
COPY src/ src/


FROM php_prod AS php_dev
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash ; \
    apt-get install -y symfony-cli; \
    mkdir var/ && chmod 777 var;
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY .infrastructure/docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]
CMD ["symfony", "server:start"]
