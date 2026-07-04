FROM php:8.2-cli

WORKDIR /app

COPY ./backend /app

# Heroku utilise PORT dynamiquement
CMD sh -c "php -S 0.0.0.0:$PORT -t public"