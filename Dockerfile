FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN printf 'mysqli.default_socket=/run/mysqld/mysqld.sock\npdo_mysql.default_socket=/run/mysqld/mysqld.sock\n' \
    > /usr/local/etc/php/conf.d/mysql-socket.ini

RUN apt-get update \
    && apt-get install -y --no-install-recommends mariadb-server mariadb-client \
    && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html/autos

COPY docker/init.sh /init.sh
RUN chmod +x /init.sh

EXPOSE 80

ENTRYPOINT ["/init.sh"]
