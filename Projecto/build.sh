#!/usr/bin/env bash
# Exit on error
set -o errexit

echo "--- Installing Composer Dependencies ---"
composer install --no-dev --optimize-autoloader

echo "--- Creating Database if not exists ---"
touch database/database.sqlite

echo "--- Running Migrations & Seeders ---"
php artisan migrate:fresh --force --seed

echo "--- Caching Configuration and Views ---"
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- Build Completed Successfully ---"
