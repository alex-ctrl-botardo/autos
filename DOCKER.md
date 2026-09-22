# Levantar el proyecto con Docker

Todo el proyecto (Apache + PHP 8.2 y MariaDB) se ejecuta en **un solo contenedor**. No hace falta XAMPP ni instalar nada aparte: la base de datos `pruebas` se crea y se rellena sola desde `db/pruebas.sql` al arrancar.

## Requisitos

- Docker con el plugin Compose: `docker compose version`
- Si tu usuario no está en el grupo `docker`, antepón `sudo` a los comandos de Docker (te pedirá la contraseña)

## Arranque rápido (copiar y pegar)

```bash
git clone https://github.com/alex-ctrl-botardo/autos.git
cd autos
docker compose up -d --build
```

Si necesitas `sudo` (Docker no te deja sin él):

```bash
git clone https://github.com/alex-ctrl-botardo/autos.git
cd autos
sudo docker compose up -d --build
```

Abre en el navegador:

```
http://localhost:8080/autos/
```

La aplicación se sirve bajo `/autos/`, no en la raíz.

## Credenciales

| Usuario | Contraseña | Rol |
| --- | --- | --- |
| `admin` | `password` | admin |
| `alejandro` | `password` | usuario |

Datos de conexión (solo dentro del contenedor): base de datos `pruebas`, usuario `root` sin contraseña, escucha en `127.0.0.1:3306` y en el socket `/run/mysqld/mysqld.sock`.

## Comandos útiles

```bash
docker compose ps                 # ver si está levantado
docker compose logs -f            # ver los logs en directo (Ctrl+C para salir)
docker compose down               # parar y eliminar el contenedor
docker compose up -d --build      # reconstruir tras cambiar código
docker compose restart            # reiniciar (recarga la base desde el dump)
```

Entrar en la base de datos:

```bash
docker compose exec autos mariadb -uroot pruebas
```

Abrir una terminal dentro del contenedor:

```bash
docker compose exec autos bash
```

> Si usas `sudo` para Docker, úsalo también con `docker compose exec`.

## Aviso: los datos se reinician

`docker/init.sh` importa `db/pruebas.sql` **en cada arranque** del contenedor, y el dump hace `DROP TABLE IF EXISTS` antes de crear. Cualquier dato que introduzcas a mano se pierde al hacer `down`, `restart` o al reiniciar el equipo. Para conservar cambios, edita el dump o no reinicies el contenedor.

## Qué hace cada fichero

| Fichero | Función |
| --- | --- |
| `Dockerfile` | Imagen `php:8.2-apache` + extensiones `mysqli`/`pdo_mysql` + MariaDB servidor y cliente |
| `compose.yaml` | Servicio único `autos`, publica el puerto `8080` y `restart: unless-stopped` |
| `docker/init.sh` | Prepara MariaDB, crea la base `pruebas`, importa el dump y arranca Apache |
| `.dockerignore` | Excluye `.git`, `Dockerfile` y `compose.yaml` de la imagen |

## Cambiar el puerto

Edita `compose.yaml` y cambia `"8080:80"` por el puerto que quieras, por ejemplo `"9090:80"`, y vuelve a levantarlo:

```bash
docker compose up -d
```

La app quedaría en `http://localhost:9090/autos/`.

## Notas técnicas

- **Socket de MySQL:** la imagen de PHP no define `mysqli.default_socket`, así que `conexion.php` con `$host = "localhost"` buscaría un socket inexistente y fallaría con `No such file or directory`. El `Dockerfile` escribe `/usr/local/etc/php/conf.d/mysql-socket.ini` apuntando a `/run/mysqld/mysqld.sock`, que es donde escucha MariaDB.
- **Avisos de sesión:** `conexion.php` terminaba con la etiqueta de cierre `?>` y líneas en blanco, que PHP enviaba como salida antes de tiempo; eso rompía `session_start()` y `header()` en `sesion.php` (avisos "headers already sent"). Se ha eliminado el cierre.
