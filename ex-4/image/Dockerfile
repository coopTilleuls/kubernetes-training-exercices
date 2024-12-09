ARG PHP_VERSION=8.3
ARG COMPOSER_VERSION=2

FROM composer:${COMPOSER_VERSION} AS composer

FROM php:${PHP_VERSION}-fpm AS php_prod
RUN apt-get update ; \
    apt-get install --no-install-recommends -y \
    unzip; # nécessaire pour symfony/flex
WORKDIR /app
COPY . .
RUN --mount=from=composer,source=/usr/bin/composer,target=/usr/bin/composer \
    echo '<?php return [];' > .env.local.php \
 && composer install --prefer-dist --no-dev --no-scripts --no-progress \
 && composer dump-autoload --classmap-authoritative --no-dev

FROM php_prod AS php_dev
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash \
 && apt-get install -y symfony-cli \
 && mkdir var/ && chmod 777 var
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint
CMD ["symfony", "server:start", "--allow-all-ip"]
ENTRYPOINT ["docker-entrypoint"]
