#!/bin/bash

# Ensure Laravel key is generated
php artisan key:generate

# Clear and cache configurations
php artisan config:clear
php artisan config:cache

# Run database migrations
php artisan migrate --force

# Execute the CMD from Dockerfile (apache2-foreground)
exec "$@"
