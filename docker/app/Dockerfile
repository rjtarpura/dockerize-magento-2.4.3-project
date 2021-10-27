FROM php:7.4-apache

ARG APP_NAME
ARG COMPOSER_VERSION=1.10.23
ARG NODE_VERSION=10.20.0

RUN apt-get update && apt-get install -y \
  cron \
  git \
  gzip \
  libfreetype6-dev \
  libicu-dev \
  libjpeg62-turbo-dev \
  libmcrypt-dev \
  libpng-dev \
  libxslt1-dev \
  libmagickwand-dev \
  lsof \
  mariadb-client \
  vim \
  zip \
  unzip \
  curl \
  openssl \
  libssl-dev \
  libcurl4-openssl-dev \
  libonig-dev \
  libzip-dev \
  zlib1g-dev 

RUN pecl install imagick-3.4.3 -y

# http://devdocs.magento.com/guides/v2.0/install-gde/system-requirements.html
RUN docker-php-ext-install bcmath \
  && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
  && docker-php-ext-install gd \
  && docker-php-ext-install intl \
  && docker-php-ext-install mbstring \
  && docker-php-ext-install opcache \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install zip \
  && docker-php-ext-install xml \
  && docker-php-ext-install ctype \
  && docker-php-ext-install json \
  && docker-php-ext-enable imagick \
  && docker-php-ext-install bz2 \
  && docker-php-ext-install exif \
  && docker-php-ext-install sockets \
  && docker-php-ext-install simplexml \
  && docker-php-ext-install soap \
  && docker-php-ext-install xsl \
  && docker-php-ext-install dom \
  #&& docker-php-ext-install hash \
  && docker-php-ext-install iconv

# Install Composer version 1.10.23
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=$COMPOSER_VERSION

# Install node.js
RUN apt-get install -y curl
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.34.0/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

# Make sure the volume mount point is empty
RUN rm -rf /var/www/html/*

# Set www-data as owner for /var/www
RUN chown -R www-data:www-data /var/www/
RUN chmod -R g+w /var/www/

# add apache modules and configuration
RUN a2enmod rewrite \
	&& a2enmod headers \
  && a2enmod expires \
  && echo "memory_limit=2048M" > /usr/local/etc/php/conf.d/memory-limit.in
  #&& echo "max_allowed_packet = 2048M" >> /etc/mysql/mysql.conf.d/mysqld.cnf

# Remove unnecssary modules
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copy magento auth credentials
COPY auth.json /root/.composer/auth.json

COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN sed -i "s/<APP_NAME>/${APP_NAME}/g" /etc/apache2/sites-available/000-default.conf

# copy php.ini file for custom php configuration
COPY php.ini /usr/local/etc/php/php.ini