#!/bin/sh
set -e

echo "Starting BWS Bali Penida Production Environment..."

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
while ! /usr/bin/mariadb --ssl=0 -h "${DB_HOST:-mysql}" -P "${DB_PORT:-3306}" -u "${DB_USERNAME:-laravel}" -p"${DB_PASSWORD}" -e "SELECT 1" >/dev/null 2>&1; do
    echo "MySQL is not ready yet, waiting..."
    sleep 2
done
echo "MySQL is ready!"

# Run Laravel setup commands
cd /var/www/html

# Ensure proper permissions
echo "Setting up correct permissions..."
chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Ensure nginx can write to its required directories
mkdir -p /var/log/nginx /var/lib/nginx /var/cache/nginx /run/nginx
chmod 755 /var/log/nginx /var/lib/nginx /var/cache/nginx /run/nginx

# Run migrations and optimize
echo "Running Laravel optimizations and migrations..."
php artisan optimize
php artisan migrate --force

# Create storage symbolic link
echo "Creating storage symbolic link..."
php artisan storage:link --force

echo "All services ready, starting supervisord..."
# Start supervisor to manage all services
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf