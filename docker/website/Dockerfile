
################################################################################
# Base stage
################################################################################
FROM php:8.4.8-apache AS base

ARG XDEBUG_ENABLE=0

# Global environment variables
ENV DEBIAN_FRONTEND=noninteractive
ENV XDEBUG_ENABLE=${XDEBUG_ENABLE}

# Install system utilities
RUN apt-get update && apt-get install -y unzip curl \
    && rm -rf /var/lib/apt/lists/*

# Install nodejs and npm
RUN curl -fsSL https://deb.nodesource.com/setup_24.x -o nodesource_setup.sh && \
    bash nodesource_setup.sh && \
    apt-get install -y nodejs && \
    rm nodesource_setup.sh

# Install composer globally and make it executable
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

# Install & configure php modules
RUN curl -sSLf -o /usr/local/bin/install-php-extensions https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd zip pdo_mysql apcu mysqli bcmath soap intl ldap imap tidy redis gmp exif calendar xmlrpc xsl pcntl sockets opcache

# Enable Apache modules
RUN a2enmod rewrite headers ssl expires deflate mime setenvif ssl http2

# Create self-signed certificate for HTTPS
RUN a2ensite default-ssl && \
    openssl req -subj '/CN=localhost/O=Binh.XYZ/C=VN' -new -newkey rsa:2048 -days 365 -nodes -x509 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem

# Remove default sites from base image to avoid conflicts
RUN rm /etc/apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled/default-ssl.conf
COPY nginx.default-ssl.conf /etc/apache2/sites-available/default-ssl.conf
RUN a2ensite default-ssl

# Install and configure xdebug if enabled
RUN if [ "$XDEBUG_ENABLE" = "1" ]; then \
    install-php-extensions xdebug && \
    echo "opcache.enable=0" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    fi

# Prepare working directory
WORKDIR /var/www/html
COPY . /var/www/html

# Expose necessary ports
EXPOSE 443
# Set the entrypoint
ENTRYPOINT ["apache2-foreground"]