# Production Dockerfile for BWS Bali Penida Laravel Application
FROM php:8.3-fpm-alpine AS base

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite \
    sqlite-dev \
    mariadb-client \
    mariadb-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    nginx \
    supervisor

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_sqlite pdo_mysql mysqli mbstring exif pcntl bcmath gd opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create nginx user for file permissions
RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -D -S -G www www

# Copy application files
COPY ./src /var/www/html

# Set proper permissions
RUN chown -R www:www /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Install Composer dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Production stage
FROM base AS production

# Copy nginx configuration
COPY ./docker/nginx/production.conf /etc/nginx/nginx.conf

# Copy supervisor configuration
COPY ./docker/supervisor/production.conf /etc/supervisor/conf.d/supervisord.conf

# Copy PHP production configuration
COPY ./docker/php/production.ini /usr/local/etc/php/conf.d/production.ini

# Create required directories
RUN mkdir -p /var/log/supervisor /run/nginx

# Set environment to production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Create entrypoint script
COPY ./docker/entrypoint-production.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -f http://localhost || exit 1

# Use non-root user
USER www

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]