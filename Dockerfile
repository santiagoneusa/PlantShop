# Use the official PHP image with Apache
FROM php:8.1.4-apache

# Update package list and install necessary packages
RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Set correct permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Change Apache DocumentRoot to Laravel public directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set environment variables and run Laravel commands
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Run Laravel specific commands
RUN service apache2 restart \
    && php artisan key:generate \
    && php artisan migrate --force \
    && php artisan db:seed --class=SuperUserSeeder \
    && php artisan db:seed --class=CategorySeeder \
    && php artisan db:seed --class=PlantSeeder

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
