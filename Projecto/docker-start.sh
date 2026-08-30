#!/usr/bin/env bash
set -e

echo "--- Setting up environment ---"
# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

echo "--- Running Migrations & Seeders ---"
php artisan migrate:fresh --force --seed

echo "--- Clearing and caching ---"
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- Starting Laravel server on port 10000 ---"
php artisan serve --host=0.0.0.0 --port=10000
