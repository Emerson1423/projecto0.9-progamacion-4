#!/usr/bin/env bash
set -e

echo "--- Setting up environment ---"

# Ensure the .env file exists (needed for artisan commands)
if [ ! -f /var/www/.env ]; then
    cp /var/www/.env.example /var/www/.env 2>/dev/null || touch /var/www/.env
fi

# Write all necessary env vars to .env (so artisan picks them up)
{
    echo "APP_NAME=SecureCode"
    echo "APP_ENV=${APP_ENV:-production}"
    echo "APP_DEBUG=${APP_DEBUG:-true}"
    echo "APP_URL=${APP_URL:-http://0.0.0.0:10000}"
    echo "DB_CONNECTION=sqlite"
    echo "DB_DATABASE=/var/www/database/database.sqlite"
    echo "SESSION_DRIVER=file"
    echo "CACHE_DRIVER=file"
    echo "QUEUE_CONNECTION=sync"
    echo "LOG_CHANNEL=stderr"
    echo "LOG_LEVEL=error"
} > /var/www/.env

# Generate a fresh APP_KEY and write it to .env
php artisan key:generate --force --ansi

echo "--- Ensuring SQLite database file exists ---"
touch /var/www/database/database.sqlite
chmod 777 /var/www/database/database.sqlite

echo "--- Running Migrations & Seeders ---"
php artisan migrate:fresh --force --seed

echo "--- Clearing and rebuilding cache ---"
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- Starting Laravel server on port 10000 ---"
php artisan serve --host=0.0.0.0 --port=10000
