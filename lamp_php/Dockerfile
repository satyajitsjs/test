# Pull base image.
FROM php:8-apache

# Install tools
RUN apt-get clean && apt-get update && apt-get install --fix-missing wget apt-transport-https lsb-release ca-certificates gnupg2 -y
RUN apt-get clean && apt-get update && apt-get install --fix-missing -y \
    ruby-dev \
    rubygems \
    imagemagick \
    graphviz \
    memcached \
    libmemcached-tools \
    libmemcached-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libxml2-dev \
    libxslt1-dev \
    default-mysql-client \
    sudo \
    git \
    vim \
    zip \
    wget \
    htop \
    iputils-ping \
    dnsutils \
    linux-libc-dev \
    libyaml-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    bash-completion \
    libldap2-dev \
    libssl-dev \
    libonig-dev
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip