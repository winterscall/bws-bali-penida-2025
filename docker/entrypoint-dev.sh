#!/bin/bash
set -e

echo "Starting BWS Bali Penida Development Environment..."

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
while ! /usr/bin/mariadb --ssl=0 -h "${DB_HOST:-mysql}" -P "${DB_PORT:-3306}" -u "${DB_USERNAME:-laravel}" -p"${DB_PASSWORD}" -e "SELECT 1" >/dev/null 2>&1; do
    echo "MySQL is not ready yet, waiting..."
    sleep 2
done
echo "MySQL is ready!"

cd /var/www/html

# Fix permissions (running as root initially)
echo "Setting up proper permissions..."
# Create directories if they don't exist
mkdir -p /var/www/html/node_modules
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/app/public

# Set proper ownership for the www user
chown -R www:www /var/www/html/node_modules
chown -R www:www /var/www/html/storage
chown -R www:www /var/www/html/bootstrap/cache || true

# Install dependencies if not present
if [ ! -d "vendor" ] || [ ! -d "node_modules/.bin" ]; then
    echo "Installing dependencies..."
    su www -s /bin/bash -c "composer install --no-interaction --optimize-autoloader"
    su www -s /bin/bash -c "npm install"
fi

# Set up Laravel if needed
# if [ ! -f ".env" ]; then
#     echo "Setting up Laravel environment..."
#     cp .env.example .env
#     php artisan key:generate
# fi

# Run database migrations as www user
echo "Running database migrations..."
su www -s /bin/bash -c "php artisan migrate --force"

# Clear caches for development
su www -s /bin/bash -c "php artisan optimize:clear"
echo "Environment setup complete!"

# Start development services in background as www user
echo "Starting Laravel development server..."
su www -s /bin/bash -c "php artisan serve --host=0.0.0.0 --port=8000" &

echo "Starting Vite development server..."
su www -s /bin/bash -c "npm run dev -- --host=0.0.0.0 --port=5173" &

# Keep the container running
wait