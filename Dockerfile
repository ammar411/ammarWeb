# Stage 1: Build frontend assets
FROM node:20-alpine AS node-builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build

# Stage 2: PHP Application
FROM php:8.2-fpm

ARG USER=www-data
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libsqlite3-dev \
    zip \
    curl \
    libxml2-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) gd mbstring pdo_mysql pdo_sqlite exif pcntl bcmath zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Copy composer files first for cached install
COPY composer.json composer.lock* /var/www/html/

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction --no-scripts

# Copy application files
COPY . /var/www/html

# Copy compiled frontend assets from node-builder stage
COPY --from=node-builder /app/public/build /var/www/html/public/build

# Set ownership and permissions & prepare SQLite database if missing
RUN mkdir -p /var/www/html/database \
 && touch /var/www/html/database/database.sqlite \
 && chown -R ${USER}:${USER} /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 8080

CMD ["sh","-lc","touch /var/www/html/database/database.sqlite && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]