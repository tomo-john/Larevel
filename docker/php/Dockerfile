# Dockerimage の指定
FROM php:8.0-fpm
COPY php.ini /usr/local/etc/php/

# Package & Library install
RUN apt-get update \
    && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# グループとユーザー追加(root回避)
RUN groupadd -g 1000 tomo || true \
    && useradd -u 1000 -g 1000 -m tomo

# ディレクトリ所有者変更(root回避)
RUN chown -R tomo:tomo /var/www

# WorkDir Path setting
WORKDIR /var/www

# Laravel Package install
RUN composer global require "laravel/installer"

# コンテナを非rootユーザーで実行
USER tomo

