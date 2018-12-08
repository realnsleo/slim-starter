FROM webdevops/php-nginx:7.2

# Set env variables
ENV ENVIRONMENT development

# These are specific to the pulled image
ENV WEB_DOCUMENT_ROOT /var/www/public
ENV WEB_DOCUMENT_INDEX index.php

# Copy PHP Configuration file
COPY ./php.ini /opt/docker/etc/php/php.ini