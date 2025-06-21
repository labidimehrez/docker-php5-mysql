FROM php:5.6-apache

# Installation des extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activation du module Apache rewrite
RUN a2enmod rewrite

# Configuration d'Apache pour permettre les .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copie des fichiers de configuration PHP personnalisés (optionnel)
# COPY php.ini /usr/local/etc/php/

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port 80
EXPOSE 80