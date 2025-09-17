# BWS Bali Penida 2025 - Docker Setup

This repository contains a Docker setup for both development and production environments for the BWS Bali Penida Laravel application.

## Directory Structure

```
.
├── src/                          # Laravel application source code
├── docker/                       # Docker configuration files
│   ├── nginx/                   # Nginx configuration
│   ├── php/                     # PHP configuration
│   ├── supervisor/              # Supervisor configuration
│   └── logs/                    # Application logs
├── Dockerfile                    # Production Dockerfile
├── Dockerfile.dev               # Development Dockerfile
├── docker-compose.prod.yml      # Production Docker Compose
├── docker-compose.dev.yml       # Development Docker Compose
├── .env.prod.example           # Production environment template
└── .env.dev.example            # Development environment template
```

## Quick Start

### Development Environment

1. **Clone and setup environment:**
   ```bash
   git clone <repository-url>
   cd bws-bali-penida-2025
   
   # Copy development environment file
   cp .env.dev.example .env.dev
   
   # Generate application key
   docker-compose -f docker-compose.dev.yml run --rm app php artisan key:generate
   ```

2. **Start development services:**
   ```bash
   docker-compose -f docker-compose.dev.yml up -d
   ```

3. **Access the application:**
   - Laravel App: http://localhost:8000
   - Vite Dev Server: http://localhost:5173
   - MailHog Web Interface: http://localhost:8025
   - Redis: localhost:6380
   - MySQL: localhost:3306 (username: `laravel`, password: `password`)

### Production Environment

1. **Setup production environment:**
   ```bash
   # Copy production environment file
   cp .env.prod.example .env.prod
   
   # Edit .env.prod with your production values
   nano .env.prod
   
   # Set your APP_KEY (generate one with: php artisan key:generate --show)
   ```

2. **Build and start production services:**
   ```bash
   docker-compose -f docker-compose.prod.yml up -d --build
   ```

3. **Access the application:**
   - Application: http://localhost (port 80)
   - Redis: localhost:6379
   - MySQL: Connect using environment variables from .env.prod

## Environment Configuration

### Development (.env.dev)

The development environment includes:
- Hot reloading with Vite
- MailHog for email testing
- Debug mode enabled
- Detailed logging
- Redis for caching

### Production (.env.prod)

The production environment includes:
- Optimized PHP and Nginx configuration
- Error logging without displaying errors
- OPcache enabled
- Supervisor for process management
- Queue worker management

## Docker Services

### Development Services

- **app**: PHP 8.3 with Laravel development server and Vite
- **redis**: Redis 7 for caching and sessions
- **mailhog**: Email testing tool

### Production Services

- **app**: Optimized PHP 8.3 + Nginx with Supervisor
- **redis**: Redis 7 for caching and sessions

## Available Commands

### Development

```bash
# Start development environment
docker-compose -f docker-compose.dev.yml up -d

# View logs
docker-compose -f docker-compose.dev.yml logs -f

# Run artisan commands
docker-compose -f docker-compose.dev.yml exec app php artisan migrate

# Run composer commands
docker-compose -f docker-compose.dev.yml exec app composer install

# Run npm commands
docker-compose -f docker-compose.dev.yml exec app npm run build

# Stop development environment
docker-compose -f docker-compose.dev.yml down
```

### Production

```bash
# Start production environment
docker-compose -f docker-compose.prod.yml up -d

# View logs
docker-compose -f docker-compose.prod.yml logs -f

# Run artisan commands
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force

# Stop production environment
docker-compose -f docker-compose.prod.yml down
```

## Database

The application uses MySQL as the default database for both development and production environments. 

### Development Environment
- **Service:** MySQL 8.0 container
- **Database:** `bws_bali_penida`
- **Username:** `laravel`
- **Password:** `password`
- **Host:** `mysql` (Docker service name)
- **Port:** `3306`

### Production Environment
- **Service:** MySQL 8.0 container  
- **Database:** Configurable via `DB_DATABASE` environment variable (default: `bws_bali_penida`)
- **Username:** Configurable via `DB_USERNAME` environment variable (default: `laravel`)
- **Password:** Must be set via `DB_PASSWORD` environment variable
- **Root Password:** Must be set via `DB_ROOT_PASSWORD` environment variable
- **Host:** `mysql` (Docker service name)
- **Port:** `3306`

### Database Persistence
Database data is persisted using Docker volumes:
- **Development:** `mysql_data` volume
- **Production:** `mysql_data` volume

The application will automatically wait for MySQL to be ready and run database migrations on startup.

## Storage and Uploads

Application storage is mounted as volumes to persist data across container restarts:
- `./src/storage` - Laravel storage directory
- `./src/bootstrap/cache` - Bootstrap cache
- `./docker/logs` - Application logs

## Security Considerations

### Production Deployment

1. **Environment Variables**: Never commit `.env.prod` to version control
2. **HTTPS**: Configure SSL/TLS termination (reverse proxy or load balancer)
3. **Secrets Management**: Use Docker secrets or external secret management
4. **Security Headers**: Review and adjust security headers in nginx configuration
5. **Updates**: Keep base images and dependencies updated

### Development

1. **Isolation**: Development containers run with user permissions
2. **Ports**: Only necessary ports are exposed
3. **Volumes**: Source code is mounted, not copied for development

## Troubleshooting

### Common Issues

1. **Permission Issues**:
   ```bash
   # Fix storage permissions
   docker-compose exec app chown -R www:www storage bootstrap/cache
   ```

2. **Database Issues**:
   ```bash
   # Reset database
   docker-compose exec app php artisan migrate:fresh --seed
   ```

3. **Cache Issues**:
   ```bash
   # Clear all caches
   docker-compose exec app php artisan optimize:clear
   ```

### Debugging

1. **View container logs**:
   ```bash
   docker-compose logs -f [service-name]
   ```

2. **Enter container shell**:
   ```bash
   docker-compose exec app sh
   ```

3. **Check service status**:
   ```bash
   docker-compose ps
   ```

## Health Checks

The production container includes health checks to monitor application status:
- HTTP health check endpoint: `/health`
- Container health status: `docker ps` shows health status

## Performance Optimization

### Production Optimizations Applied

- **OPcache**: Enabled for PHP performance
- **Laravel Optimizations**: Config, route, and view caching
- **Nginx**: Gzip compression and static file caching
- **Supervisor**: Process management and queue workers

### Monitoring

Consider adding monitoring tools in production:
- Application Performance Monitoring (APM)
- Log aggregation (ELK stack)
- Metrics collection (Prometheus + Grafana)
- Uptime monitoring

## Contributing

When making changes to the Docker setup:

1. Test both development and production configurations
2. Update documentation if needed
3. Consider backward compatibility
4. Test with fresh installations

## Support

For issues related to:
- **Docker setup**: Check this documentation and GitHub issues
- **Laravel application**: Refer to Laravel documentation
- **Infrastructure**: Check with your DevOps team