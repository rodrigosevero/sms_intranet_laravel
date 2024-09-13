# Usar uma imagem PHP oficial com Apache e PHP 7.2 (compatível com Laravel 5.6)
FROM php:7.2-apache

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# Habilitar extensões PHP necessárias
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilitar mod_rewrite para o Apache
RUN a2enmod rewrite

# Definir o diretório de trabalho como o diretório Laravel
WORKDIR /var/www/html

# Copiar todos os arquivos para o container
COPY . /var/www/html

# Permitir que o Apache tenha as permissões corretas
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/storage \
    && chmod -R 777 /var/www/html/bootstrap/cache

# Expor a porta 80
EXPOSE 80
