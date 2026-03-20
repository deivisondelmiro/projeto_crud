# Usar imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Apache para apontar para a pasta public do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Copiar arquivos do projeto
COPY . /var/www/html

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Instalar dependências Node e compilar assets (se necessário)
RUN cd /var/www/html && npm ci && npm run production || true

# Instalar dependências PHP
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader

# Configurar ambiente Laravel
RUN cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache

# Criar banco SQLite
RUN touch /var/www/html/database/database.sqlite && chmod 666 /var/www/html/database/database.sqlite

EXPOSE 80