FROM php:8.3-apache

# System dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Enable Apache rewrite (required for Laravel routes)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# IMPORTANT: point Apache to Laravel /public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Expose standard Apache port
EXPOSE 80

# Start Apache (production-safe)
CMD ["apache2-foreground"]
