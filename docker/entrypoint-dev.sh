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

# Install dependencies if not present
if [ ! -d "vendor" ] || [ ! -d "node_modules" ]; then
    echo "Installing dependencies..."
    composer install --no-interaction --optimize-autoloader
    npm install
fi

# Set up Laravel if needed
if [ ! -f ".env" ]; then
    echo "Setting up Laravel environment..."
    cp .env.example .env
    php artisan key:generate
fi

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Clear caches for development
php artisan optimize:clear

echo "Environment setup complete!"

# Start development services in background
echo "Starting Laravel development server..."
php artisan serve --host=0.0.0.0 --port=8000 &

echo "Starting Vite development server..."
npm run dev -- --host=0.0.0.0 --port=5173 &

# Keep the container running
wait