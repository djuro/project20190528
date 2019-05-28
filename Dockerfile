FROM php:7.1.8-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite

ADD newsapp.local.conf /etc/apache2/sites-available/000-default.conf
