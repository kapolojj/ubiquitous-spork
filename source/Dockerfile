FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev

# Install additional PHP extensions if needed
# RUN docker-php-ext-install ...

WORKDIR /var/www/html

# Copy source files into the container
COPY index.php /var/www/html

# Set up Apache config if needed
# COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]