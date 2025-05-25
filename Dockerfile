# Use PHP with Apache
FROM php:8.1-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev unzip zip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Allow .htaccess to override settings
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/allow-override.conf \
    && a2enconf allow-override

# Set Apache DocumentRoot to public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy all app files into the container
COPY . .

# Set correct permissions for writable and logs folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/writable \
    && chmod -R 755 /var/www/html/public

# Optional: Add DirectoryIndex to avoid index errors
RUN echo 'DirectoryIndex index.php index.html' >> /etc/apache2/apache2.conf
