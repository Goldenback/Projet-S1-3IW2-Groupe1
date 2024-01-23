# Use the official PHP image with FPM
FROM php:fpm

# Update package repository and install dependencies
RUN apt-get update -y \
    && apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libyaml-dev \
        libzip-dev \
        libpq-dev  # PostgreSQL development libraries

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_pgsql zip  # Install pdo_pgsql for PostgreSQL

# Install YAML extension
RUN pecl install yaml \
    && docker-php-ext-enable yaml

# Clear apt cache to reduce image size
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*
