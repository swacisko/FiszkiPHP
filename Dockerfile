FROM php:7-fpm



RUN docker-php-ext-install mysqli sysvsem pdo_mysql

