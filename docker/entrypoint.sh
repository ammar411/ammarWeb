#!/bin/bash

set -e

APP_PATH="/var/www"

# Check if we need to run migrations
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    cd $APP_PATH
    php artisan migrate --force
fi

# Check if we need to clear caches
if [ "$CLEAR_CACHES" = "true" ]; then
    echo "Clearing application caches..."
    cd $APP_PATH
    php artisan cache:clear
    php artisan config:cache
    php artisan view:cache
    php artisan route:cache
fi

# Set proper permissions
echo "Setting permissions..."
chown -R www-data:www-data $APP_PATH/storage
chown -R www-data:www-data $APP_PATH/bootstrap/cache
chmod -R 775 $APP_PATH/storage
chmod -R 775 $APP_PATH/bootstrap/cache

echo "Application ready! Starting services..."

# Start supervisord
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
