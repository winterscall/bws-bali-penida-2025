#!/bin/sh
set -e

echo "Starting BWS Bali Penida Production Environment..."

# Wait for database to be ready (if using external DB)
# sleep 5

# Run Laravel setup commands
cd /var/www/html

# Ensure proper permissions
chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache

# Create database file if it doesn't exist
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    chown www:www database/database.sqlite
fi

# Run migrations and optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Start supervisor to manage all services
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf