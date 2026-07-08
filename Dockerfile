# Use PHP 8.2 FPM Alpine as base image
FROM php:8.2-fpm-alpine

# Set environment variables
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_HOME=/var/www

# Install system dependencies, refresh mirrors, and handle PHP extensions safely
RUN sed -i 's/dl-cdn.alpinelinux.org/uk.alpinelinux.org/g' /etc/apk/repositories || true
RUN apk update --no-cache && apk add --no-cache \
    curl \
    wget \
    git \
    nginx \
    supervisor \
    bash \
    mysql-client \
    $PHPIZE_DEPS \
    && docker-php-ext-install pdo pdo_mysql bcmath opcache \
    && docker-php-ext-enable opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create app directory
WORKDIR $APP_HOME

# Create all necessary Laravel storage directories with correct permissions first
# This prevents permission mismatch bugs during the subsequent COPY step
RUN mkdir -p $APP_HOME/storage/logs \
    $APP_HOME/storage/app \
    $APP_HOME/storage/framework/views \
    $APP_HOME/storage/framework/cache \
    $APP_HOME/storage/framework/sessions \
    $APP_HOME/bootstrap/cache \
    && chown -R www-data:www-data $APP_HOME \
    && chmod -R 775 $APP_HOME/storage $APP_HOME/bootstrap/cache

# Copy entire application
COPY . .

# Install Composer dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction --no-scripts

# Copy nginx configuration
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Copy supervisord configuration
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Enforce final file owner permissions across the app directory
RUN chown -R www-data:www-data $APP_HOME

# Create nginx cache and logging directories
RUN mkdir -p /var/cache/nginx /var/log/nginx && \
    chown -R www-data:www-data /var/cache/nginx /var/log/nginx

# Create supervisord log directory
RUN mkdir -p /var/log/supervisor && \
    chown -R www-data:www-data /var/log/supervisor

# Configure PHP Opcache
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini && \
    echo "opcache.memory_consumption=256" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini && \
    echo "opcache.interned_strings_buffer=16" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini && \
    echo "opcache.max_accelerated_files=20000" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini && \
    echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# Expose port (Render will map this)
EXPOSE 8080

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s --retries=3 \
    CMD curl -f http://localhost:8080/ || exit 1

# Run supervisord to manage both nginx and php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]