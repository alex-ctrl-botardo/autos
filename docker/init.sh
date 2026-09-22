#!/bin/bash
set -e

DATADIR=/var/lib/mysql

if [ ! -d "$DATADIR/mysql" ]; then
    mariadb-install-db --user=mysql --datadir="$DATADIR" > /dev/null 2>&1
fi

mysqld_safe --skip-networking=0 &
until mariadb-admin ping --silent 2>/dev/null; do
    sleep 1
done

mariadb -uroot <<'SQL'
CREATE DATABASE IF NOT EXISTS pruebas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
SQL

mariadb -uroot pruebas < /var/www/html/autos/db/pruebas.sql

mariadb -uroot <<'SQL'
ALTER USER 'root'@'localhost' IDENTIFIED VIA mysql_native_password USING PASSWORD('');
FLUSH PRIVILEGES;
SQL

exec apache2-foreground