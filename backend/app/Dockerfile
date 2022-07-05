FROM php:8.1.6-fpm AS laravel_base

###########################################################################
# Install package
###########################################################################
USER root

RUN apt-get update
RUN apt-get install -y --allow-downgrades --no-install-recommends \
        dialog \
        apt-utils \
        cron
RUN apt-get install -y --allow-downgrades --no-install-recommends \
        libmemcached-dev \
        libz-dev \
        # libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        # libmcrypt-dev \
        openssh-server \
        libmagickwand-dev \
        git \
        nano \
        libxml2-dev \
        supervisor \
        netcat

###############
RUN apt-get install -y zlib1g-dev libicu-dev g++ \
        && docker-php-ext-configure intl \
        && docker-php-ext-install intl

###########################################################################
# Set Timezone
###########################################################################
USER root

ARG TZ=UTC
ENV TZ ${TZ}

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone


# Install soap extention
RUN docker-php-ext-install soap

# Install the PHP mcrypt extention (from PECL, mcrypt has been removed from PHP 7.2)
# RUN pecl install mcrypt-1.0.1
# RUN docker-php-ext-enable mcrypt

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN apt-get install -y \
        libzip-dev \
        zip \
        && docker-php-ext-install zip

# Insatll gmp
RUN apt-get install -y libgmp-dev re2c libmhash-dev libmcrypt-dev file
RUN ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/local/include/
RUN docker-php-ext-configure gmp
RUN docker-php-ext-install gmp

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

# Install redis

RUN pecl install -o -f redis \
        &&  rm -rf /tmp/pear \
        &&  docker-php-ext-enable redis

#####################################
# Imagick:
#####################################
USER root

RUN pecl install imagick && \
        docker-php-ext-enable imagick

# Install the PHP gd library
RUN docker-php-ext-install gd && \
        docker-php-ext-configure gd \
        --with-jpeg \
        --with-freetype && \
        docker-php-ext-install gd

RUN rm -r /var/lib/apt/lists/*

COPY cron /etc/cron.d/cron

RUN chmod 0644 /etc/cron.d/cron

RUN touch /var/log/cron.log
RUN chmod 777 /var/log/cron.log

WORKDIR /var/www/server

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer