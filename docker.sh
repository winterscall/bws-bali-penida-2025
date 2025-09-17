#!/bin/bash

# BWS Bali Penida Docker Helper Script
# Usage: ./docker.sh [command]

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Print colored output
print_status() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARN]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

print_header() {
    echo -e "${BLUE}========================================${NC}"
    echo -e "${BLUE} BWS Bali Penida Docker Manager${NC}"
    echo -e "${BLUE}========================================${NC}"
}

# Check if Docker is running
check_docker() {
    if ! docker info >/dev/null 2>&1; then
        print_error "Docker is not running. Please start Docker first."
        exit 1
    fi
}

# Development commands
dev_up() {
    print_status "Starting development environment..."
    check_docker
    if [ ! -f ".env.dev" ]; then
        print_warning ".env.dev not found. Copying from example..."
        cp .env.dev.example .env.dev
    fi
    docker compose -f docker-compose.dev.yml up -d
    print_status "Development environment started!"
    print_status "Application: http://localhost:8000"
    print_status "Vite Dev Server: http://localhost:5173"
    print_status "MailHog: http://localhost:8025"
}

dev_down() {
    print_status "Stopping development environment..."
    docker compose -f docker-compose.dev.yml down
    print_status "Development environment stopped!"
}

dev_logs() {
    print_status "Showing development environment logs..."
    docker compose -f docker-compose.dev.yml logs -f "${2:-}"
}

dev_shell() {
    print_status "Opening shell in development container..."
    docker compose -f docker-compose.dev.yml exec app sh
}

# Production commands
prod_up() {
    print_status "Starting production environment..."
    check_docker
    if [ ! -f ".env.prod" ]; then
        print_warning ".env.prod not found. Copying from example..."
        cp .env.prod.example .env.prod
        print_error "Please configure .env.prod with your production settings before running again!"
        exit 1
    fi
    docker compose -f docker compose.prod.yml up -d --build
    print_status "Production environment started!"
    print_status "Application: http://localhost"
}

prod_down() {
    print_status "Stopping production environment..."
    docker compose -f docker-compose.prod.yml down
    print_status "Production environment stopped!"
}

prod_logs() {
    print_status "Showing production environment logs..."
    docker compose -f docker-compose.prod.yml logs -f "${2:-}"
}

prod_shell() {
    print_status "Opening shell in production container..."
    docker compose -f docker-compose.prod.yml exec app sh
}

# Utility commands
clean() {
    print_status "Cleaning up Docker resources..."
    docker compose -f docker-compose.dev.yml down -v --remove-orphans 2>/dev/null || true
    docker compose -f docker-compose.prod.yml down -v --remove-orphans 2>/dev/null || true
    docker system prune -f
    print_status "Cleanup completed!"
}

build_dev() {
    print_status "Building development images..."
    docker compose -f docker-compose.dev.yml build --no-cache
    print_status "Development images built!"
}

build_prod() {
    print_status "Building production images..."
    docker compose -f docker-compose.prod.yml build --no-cache
    print_status "Production images built!"
}

# Laravel commands
artisan() {
    if docker compose -f docker-compose.dev.yml ps | grep -q "Up"; then
        print_status "Running artisan command in development container..."
        docker compose -f docker-compose.dev.yml exec app php artisan "${@:2}"
    elif docker compose -f docker-compose.prod.yml ps | grep -q "Up"; then
        print_status "Running artisan command in production container..."
        docker compose -f docker-compose.prod.yml exec app php artisan "${@:2}"
    else
        print_error "No running containers found. Please start development or production environment first."
        exit 1
    fi
}

composer() {
    if docker compose -f docker-compose.dev.yml ps | grep -q "Up"; then
        print_status "Running composer command in development container..."
        docker compose -f docker-compose.dev.yml exec app composer "${@:2}"
    else
        print_error "Development container is not running. Please start development environment first."
        exit 1
    fi
}

npm() {
    if docker compose -f docker-compose.dev.yml ps | grep -q "Up"; then
        print_status "Running npm command in development container..."
        docker compose -f docker-compose.dev.yml exec app npm "${@:2}"
    else
        print_error "Development container is not running. Please start development environment first."
        exit 1
    fi
}

# Help function
show_help() {
    print_header
    echo ""
    echo "Available commands:"
    echo ""
    echo "Development:"
    echo "  dev:up      - Start development environment"
    echo "  dev:down    - Stop development environment"
    echo "  dev:logs    - Show development logs"
    echo "  dev:shell   - Open shell in development container"
    echo ""
    echo "Production:"
    echo "  prod:up     - Start production environment"
    echo "  prod:down   - Stop production environment"
    echo "  prod:logs   - Show production logs"
    echo "  prod:shell  - Open shell in production container"
    echo ""
    echo "Build:"
    echo "  build:dev   - Build development images"
    echo "  build:prod  - Build production images"
    echo ""
    echo "Laravel:"
    echo "  artisan     - Run artisan command"
    echo "  composer    - Run composer command (dev only)"
    echo "  npm         - Run npm command (dev only)"
    echo ""
    echo "Utility:"
    echo "  clean       - Clean up Docker resources"
    echo "  help        - Show this help message"
    echo ""
}

# Main command dispatcher
case "${1:-help}" in
    "dev:up")
        dev_up
        ;;
    "dev:down")
        dev_down
        ;;
    "dev:logs")
        dev_logs "$@"
        ;;
    "dev:shell")
        dev_shell
        ;;
    "prod:up")
        prod_up
        ;;
    "prod:down")
        prod_down
        ;;
    "prod:logs")
        prod_logs "$@"
        ;;
    "prod:shell")
        prod_shell
        ;;
    "build:dev")
        build_dev
        ;;
    "build:prod")
        build_prod
        ;;
    "artisan")
        artisan "$@"
        ;;
    "composer")
        composer "$@"
        ;;
    "npm")
        npm "$@"
        ;;
    "clean")
        clean
        ;;
    "help"|*)
        show_help
        ;;
esac