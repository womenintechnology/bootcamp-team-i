FROM php:7.4.5-apache
RUN apt-get update
RUN a2enmod rewrite
RUN usermod --non-unique --uid 1000 www-data \
  && groupmod --non-unique --gid 1000 www-data
RUN apt-get install -y \
  libzip-dev \
  zip \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip
RUN apt-get -y install gcc make autoconf libc-dev pkg-config
RUN docker-php-ext-install pdo pdo_mysql
COPY ./composer.json /srv/composer.json
COPY ./composer.json /srv/composer.lock
COPY ./bin/composer /srv/bin/composer
WORKDIR /srv/
RUN /srv/bin/composer install
