FROM webdevops/php-nginx:7.2

# Set env variables
ENV ENVIRONMENT development

# These are specific to the pulled image
ENV WEB_DOCUMENT_ROOT /var/www/public
ENV WEB_DOCUMENT_INDEX index.php

# Copy PHP Configuration file
COPY ../php.ini /opt/docker/etc/php/php.ini

# Set the working directory
WORKDIR /var/www

# Install Git as it's needed for composer
RUN apt-get update \
    && apt-get install --assume-yes git zip unzip

# Install composer dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && php composer.phar install --no-dev --no-scripts --no-interaction --optimize-autoloader \
    && rm composer.phar