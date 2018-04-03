FROM php:7.1-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        mysql-client \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install -j$(nproc) mbstring opcache pdo pdo_mysql zip

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=60'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
  } > /usr/local/etc/php/conf.d/opcache-recommended.ini


# Install composer globally
# -------------------------

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer


# DRUPAL CONSOLE.
# --------------

# Download console.
RUN curl https://drupalconsole.com/installer -L -o drupal.phar

# Install console.
RUN mv drupal.phar /usr/local/bin/drupal && \
    chmod +x /usr/local/bin/drupal && \
    drupal init --override

# Build-time configuration.
# -------------------------
# This is mostly useful to override on CIs.
ARG APP_NAME=drupal
ARG GROUP_ID=1000
ARG USER_ID=1000


# Configure environment.
# ----------------------

ENV APP_NAME=${APP_NAME}
ENV GROUP_ID=${GROUP_ID}
ENV GROUP_NAME=${APP_NAME} USER_ID=${USER_ID} USER_NAME=${APP_NAME}


# Create group and user.
# ----------------------

RUN groupadd --gid ${GROUP_ID} ${GROUP_NAME}                                                                          \
    && echo "%sudo ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers                                                           \
    && useradd -u ${USER_ID} -G users,www-data,sudo -g ${GROUP_NAME} -d /${APP_NAME} --shell /bin/bash -m ${APP_NAME} \
    && echo "secret\nsecret" | passwd ${USER_NAME}

# Setup user and initialization directory.
# ----------------------------------------

USER ${USER_NAME}

# DRUSH.
# --------------

# Set the Drush version.
ENV DRUSH_VERSION 8.x

# Install Drush using Composer.
RUN composer global require drush/drush:"$DRUSH_VERSION" --prefer-dist

USER root

RUN ln -s /drupal/.composer/vendor/drush/drush/drush /usr/local/bin/drush && \
  chmod +x /usr/local/bin/drush

# XDEBUG.
# --------------

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.max_nesting_level=9999" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.var_display_max_depth = 5" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.var_display_max_children = 5" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.var_display_max_data = 5" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable = on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back = on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && docker-php-ext-enable xdebug

USER ${USER_NAME}

WORKDIR /${USER_NAME}/app
