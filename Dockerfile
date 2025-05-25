# Use PHP with Apache
FROM php:8.1-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev unzip zip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Allow .htaccess to override settings
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/allow-override.conf \
    && a2enconf allow-override

# Set working directory
WORKDIR /var/www/html

# Copy all app files into the container
COPY . .

# Set correct permissions for writable folder
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/writable