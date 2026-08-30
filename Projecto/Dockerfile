FROM php:8.2-cli

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
    libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_sqlite pdo_mysql mbstring exif pcntl bcmath

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . /var/www

# Set correct permissions
RUN chmod -R 755 /var/www \
    && chmod -R 777 storage bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Create SQLite database file
RUN touch database/database.sqlite \
    && chmod 777 database/database.sqlite

# Copy and set start script
COPY docker-start.sh /var/www/docker-start.sh
RUN chmod +x /var/www/docker-start.sh

# Expose the port Render uses
EXPOSE 10000

CMD ["/var/www/docker-start.sh"]
