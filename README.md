# Autos

Aplicación web en PHP para gestionar un catálogo de coches: **marcas**, **modelos** y **motores**, con inicio de sesión y control de roles.

## Características

- Login con sesiones y contraseñas almacenadas con hash (`bcrypt`).
- Dos roles: **admin** (acceso a los formularios de alta) y **usuario** (solo listados).
- Listados de marcas, modelos y motores.
- Listado de motores con **paginación**.
- Alta de registros (marcas, modelos y motores).
- Interfaz en HTML5 y CSS3.

## Tecnologías

| Capa | Tecnología |
| --- | --- |
| Backend | PHP 8.2 (mysqli) |
| Base de datos | MySQL / MariaDB |
| Servidor web | Apache |
| Frontend | HTML5, CSS3, JavaScript |
| Despliegue | Docker / Docker Compose |

## Estructura del proyecto

```
.
├── Marca/           Alta y listado de marcas
├── Modelo/          Alta y listado de modelos
├── Motor/           Alta y listado de motores
├── css/             Hojas de estilo
├── java/            JavaScript
├── db/pruebas.sql   Dump de la base de datos (estructura + datos)
├── conexion.php     Conexión a la base de datos
├── sesion.php       Control de sesión
├── login.php        Formulario de acceso
├── logout.php       Cierre de sesión
├── index.php        Página principal
├── Dockerfile       Imagen de la aplicación
├── compose.yaml     Servicio de Docker
└── DOCKER.md        Guía detallada de Docker
```

## Modelo de datos

- **Marca**: `id_marca`, `nombre`, `pais`
- **Motor**: `id_motor`, `nombre`, `potencia`, `par`, `cilindrada`, `num_pistones`, `id_marca`
- **Modelo**: `id_modelo`, `nombre`, `id_motor`
- **Usuario**: `id_usuario`, `nombre`, `password`, `rol`

## Instalación rápida con Docker

Requisitos: tener Docker instalado (con el plugin `docker compose`).

```bash
git clone https://github.com/alex-ctrl-botardo/autos.git
cd autos
docker compose up -d --build
```

Abre la aplicación en:

```
http://localhost:8080/autos/
```

La base de datos `pruebas` se crea y se rellena automáticamente desde `db/pruebas.sql` al arrancar.

### Acceso

| Usuario | Contraseña | Rol |
| --- | --- | --- |
| `admin` | `password` | admin |
| `alejandro` | `password` | usuario |

Para parar el contenedor:

```bash
docker compose down
```

Tienes la guía completa (comandos, puertos, reinicio de la base de datos y solución de problemas) en [DOCKER.md](DOCKER.md).

## Instalación manual (sin Docker)

1. Copia el proyecto dentro del directorio web del servidor, por ejemplo `htdocs/autos` (XAMPP) o `/var/www/html/autos` (LAMP).
2. Crea una base de datos llamada `pruebas` e importa el dump `db/pruebas.sql`.
3. Revisa las credenciales en `conexion.php` (por defecto: host `localhost`, usuario `root`, sin contraseña, base `pruebas`).
4. Abre `http://localhost/autos/` en el navegador.

## Notas

- La aplicación se sirve bajo la ruta **`/autos/`** y las páginas usan rutas absolutas (`/autos/...`). Si la instalas en otra carpeta, tendrás que ajustar esas rutas.
- Los formularios de alta y los listados de marcas, modelos y motores están accesibles desde la página principal tras iniciar sesión.
- La edición de registros está prevista como trabajo futuro.
