FROM php:8.3-fpm

RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;
RUN docker-php-ext-install pdo_mysql mbstring;

WORKDIR /app
COPY composer.json .
RUN composer install --no-scripts;
COPY . .
RUN npm install;

CMD php artisan serve --host 0.0.0.0 --port 80;
