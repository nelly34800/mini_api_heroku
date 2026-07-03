# Image PHP 8.2 avec Apache
FROM php:8.2-apache

# Installe les dépendances système nécessaires
RUN a2enmod rewrite

# Définit le dossier de travail
WORKDIR /var/www/html

# Copie le code du backend
COPY ./backend /var/www/html

# Index.php est dans /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Expose le port Apache
EXPOSE 80
