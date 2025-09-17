# BWS Bali Penida 2025

Laravel application for BWS Bali Penida with Docker support.

## Quick Start

### Development
```bash
# Start development environment
./docker.sh dev:up

# Access the application
# Laravel App: http://localhost:8000
# Vite Dev Server: http://localhost:5173
# MailHog: http://localhost:8025
```

### Production
```bash
# Configure production environment
cp .env.prod.example .env.prod
# Edit .env.prod with your settings

# Start production environment
./docker.sh prod:up

# Access the application at http://localhost
```

## Directory Structure

- `src/` - Laravel application source code
- `docker/` - Docker configuration files
- `DOCKER.md` - Comprehensive Docker documentation

## Available Commands

Use the `./docker.sh` script for easy Docker management:

```bash
./docker.sh help              # Show all commands
./docker.sh dev:up             # Start development
./docker.sh prod:up            # Start production
./docker.sh artisan migrate    # Run artisan commands
./docker.sh composer install   # Run composer commands
```

For detailed documentation, see [DOCKER.md](./DOCKER.md).

## Features

✅ **Production Ready**: Nginx + PHP-FPM + Supervisor  
✅ **Development Environment**: Hot reload with Vite  
✅ **Email Testing**: MailHog for development  
✅ **Caching**: Redis for both environments  
✅ **Database**: SQLite (easily configurable)  
✅ **Security**: Optimized configurations and health checks  
✅ **Easy Management**: Helper script for common tasks  

## Requirements

- Docker & Docker Compose
- Git

## Support

For Docker-related issues, check [DOCKER.md](./DOCKER.md).  
For Laravel application issues, refer to the Laravel documentation.