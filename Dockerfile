# Use an official PHP image as base
FROM php:8.2-cli

# Install necessary extensions and tools
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        libonig-dev \
        libxml2-dev \
        curl \
        && docker-php-ext-install zip pdo_mysql mbstring bcmath xml

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Set Xdebug configuration (you may need to adjust these settings)
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Create log directories
RUN mkdir -p /var/log/php

# Copy the application code to the container
COPY . /var/www/html/

# Use Supervisor to manage processes
RUN apt-get install -y supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port if necessary
# EXPOSE 8000

# Run Supervisor to manage processes
CMD ["supervisord", "-n"]
