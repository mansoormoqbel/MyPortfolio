# --- Stage 1: Build Frontend with Node ---
FROM node:18 AS nodebuild
WORKDIR /app
COPY package*.json ./
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm install
RUN npm run build


# --- Stage 2: Build Laravel App with PHP ---
FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libsqlite3-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_sqlite mbstring gd

# Enable Apache rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html



# Apache يجب أن يشير إلى مجلد public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


# Copy Laravel app files
COPY . .
COPY . /var/www/html

# Copy Vite build output from Node stage
COPY --from=nodebuild /app/public/build ./public/build

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chmod -R 777 storage bootstrap/cache

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
