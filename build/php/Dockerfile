FROM php:7.4-fpm
    
RUN docker-php-ext-install pdo_mysql
    
RUN pecl install apcu
    
RUN apt-get update && \
apt-get install -y \
libzip-dev
    
RUN docker-php-ext-install zip
RUN docker-php-ext-enable apcu

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 app  && useradd -g 1000 -u 1000 -d /var/www -s /bin/bash app
COPY --chown=app:app src /var/www/html
RUN chown app:app /var/www
USER app:app

VOLUME [/var/www]

WORKDIR /var/www/html