# Usa PHP 8.2 con CLI
FROM php:8.2-cli

# Instala extensiones necesarias (MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia todo tu backend al contenedor
COPY . /var/www/html

# Expone el puerto 10000 (Render lo usará)
EXPOSE 10000

# Comando para iniciar el servidor PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
