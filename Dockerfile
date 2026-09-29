FROM php:8.2-apache

# Install required system packages and PHP extensions
RUN apt-get update \
    && apt-get install -y \
        git \
        unzip \
        libsqlite3-dev \
        libzip-dev \
        libicu-dev \
        libonig-dev \
        libxml2-dev \
    && docker-php-ext-install \
        pdo_sqlite \
        mbstring \
        bcmath \
        intl \
        zip \
        xml \
        opcache \
    && a2enmod rewrite mime headers \
    && echo "AddType text/css .css" > /etc/apache2/conf-available/assets.conf \
    && echo "AddType application/javascript .js" >> /etc/apache2/conf-available/assets.conf \
    && echo "AddType image/svg+xml .svg" >> /etc/apache2/conf-available/assets.conf \
    && a2enconf assets \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Laravel public folder as Apache document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" \
        /etc/apache2/sites-available/*.conf \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf \
    && sed -ri 's/AllowOverride None/AllowOverride All/g' \
        /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Install PHP dependencies
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader \
    --no-scripts

# Copy Laravel project
COPY . .

# Optimize Composer autoload
RUN composer dump-autoload --optimize

# Create Laravel writable directories
RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
        database \
    && chown -R www-data:www-data \
        storage \
        bootstrap/cache \
        database \
    && chmod -R 775 \
        storage \
        bootstrap/cache \
        database

EXPOSE 80

# Create SQLite database if needed, run migrations and seed,
# then start Apache
CMD ["sh", "-c", "if [ ! -f database/database.sqlite ]; then touch database/database.sqlite && php artisan migrate --force --seed; else php artisan migrate --force; fi && php artisan optimize:clear && chown -R www-data:www-data storage bootstrap/cache database && apache2-foreground"]