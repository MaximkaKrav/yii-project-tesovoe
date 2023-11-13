FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y curl git zip

RUN docker-php-ext-install pdo pdo_mysql

RUN git clone https://github.com/yiisoft/yii2-gii /var/www/html/gii

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install -d /var/www/html/gii



RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

USER "1000:1000"

WORKDIR /var/www

ENTRYPOINT [ "php-fpm" ]
