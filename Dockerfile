FROM php:8.2-apache

RUN a2enmod rewrite

RUN a2dismod mpm_event || true \
 && a2enmod mpm_prefork

WORKDIR /var/www/html

COPY ./backend /var/www/html

# IMPORTANT: DocumentRoot FIXE (pas de variable)
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
