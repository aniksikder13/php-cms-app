FROM php:8.2-apache

# Set the document root
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Install mysqli and pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo_mysql
