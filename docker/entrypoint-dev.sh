#!/bin/bash
set -e

echo "Starting BWS Bali Penida Development Environment..."

# Wait for any dependencies
sleep 2

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

# Create database if it doesn't exist
if [ ! -f "database/database.sqlite" ]; then
    echo "Creating database..."
    touch database/database.sqlite
    php artisan migrate --force
fi

# Clear caches for development
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "Environment setup complete!"

# Start development services in background
echo "Starting Laravel development server..."
php artisan serve --host=0.0.0.0 --port=8000 &

echo "Starting Vite development server..."
npm run dev -- --host=0.0.0.0 --port=5173 &

# Keep the container running
wait