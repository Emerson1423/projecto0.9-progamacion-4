FROM php:8.2-fpm

# Install system dependencies & PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

RUN docker-php-ext-install pdo pdo_sqlite pdo_mysql mbstring exif

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Run composer install
RUN composer install --no-dev --optimize-autoloader

# Setup storage & database permissions
RUN touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

# Expose port and start Laravel dev server for Render
EXPOSE 10000

CMD php artisan migrate:fresh --force --seed && php artisan serve --host=0.0.0.0 --port=10000
