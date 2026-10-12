# MyDramaListChafa

Lista personal de dramas hecha con **Laravel 13**. Permite registrar los dramas que quieres ver, estás viendo o ya terminaste, con su género, año, calificación y sinopsis.

Este proyecto nació como práctica de servicio social para aprender Laravel desde cero siguiendo el temario básico de la fase 1.

## Tecnologías

- PHP 8.3
- Laravel 13
- MySQL 8.4
- Blade + Bootstrap 5.3 (por CDN)
- Laragon como entorno local

## Qué hace

- CRUD completo de dramas: listar, ver detalle, crear, editar y eliminar.
- Búsqueda por título y paginación de 10 en 10.
- Cada drama pertenece a un género (relación `belongsTo` / `hasMany`).
- Cambio rápido de estado (Pendiente, Viendo, Finalizado) con una petición `PATCH`.
- Eliminación suave (*soft delete*): los dramas borrados siguen en la base de datos con `deleted_at`.
- Validación con un Form Request (`DramaRequest`), incluida la regla `unique` por título y año, y la regla `exists` para el género.
- Mensajes flash y componentes Blade reutilizables (`<x-alerta>` y `<x-estado-badge>`).
- Middleware propio (`registrar`) que escribe en el log cada petición que entra y la respuesta que sale.
- Respuestas JSON con códigos de estado (200 y 404) para consultar los dramas.

## Rutas

| Verbo | URL | Nombre | Qué hace |
|-------|-----|--------|----------|
| GET | `/` | — | Redirige a `/dramas` |
| GET | `/dramas` | `dramas.index` | Lista con búsqueda y paginación |
| GET | `/dramas/create` | `dramas.create` | Formulario para crear |
| POST | `/dramas` | `dramas.store` | Guarda un drama nuevo |
| GET | `/dramas/{drama}` | `dramas.show` | Muestra el detalle |
| GET | `/dramas/{drama}/edit` | `dramas.edit` | Formulario para editar |
| PUT | `/dramas/{drama}` | `dramas.update` | Actualiza el drama |
| PATCH | `/dramas/{drama}/estado` | `dramas.estado` | Cambia solo el estado |
| DELETE | `/dramas/{drama}` | `dramas.destroy` | Elimina (soft delete) |
| GET | `/json/dramas` | `json.dramas.index` | Lista en JSON |
| GET | `/json/dramas/{id}` | `json.dramas.show` | Detalle en JSON (404 si no existe) |

Las rutas de `/dramas` y `/json` pasan por el middleware `registrar`.

## Estructura relevante

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── DramaController.php        # CRUD con vistas Blade
│   │   └── DramaJsonController.php    # Respuestas JSON
│   ├── Middleware/RegistrarAccion.php # Escribe entrada y salida en el log
│   └── Requests/DramaRequest.php      # Reglas y mensajes de validación
└── Models/
    ├── Drama.php                      # SoftDeletes + belongsTo(Genero)
    └── Genero.php                     # hasMany(Drama)
database/migrations/                   # dramas, generos, genero_id y soft deletes
resources/views/
├── layouts/app.blade.php              # Layout base
├── components/                        # alerta y estado-badge
└── dramas/                            # index, show, create, edit
routes/web.php                         # Rutas agrupadas con prefijo y nombre
```

## Instalación

1. Clona el repositorio y entra a la carpeta:

   ```bash
   git clone https://github.com/DamianRobles/MyDramaListChafa
   cd MyDramaListChafa
   ```

2. Instala las dependencias:

   ```bash
   composer install
   ```

3. Copia el archivo de entorno y genera la llave de la aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Crea una base de datos vacía en MySQL llamada `mydramalistchafa` y ajusta en `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mydramalistchafa
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Corre las migraciones:

   ```bash
   php artisan migrate
   ```

6. Crea algunos géneros. El proyecto todavía no trae seeder, así que usa Tinker:

   ```bash
   php artisan tinker
   ```

   ```php
   use App\Models\Genero;
   Genero::create(['nombre' => 'Romance']);
   Genero::create(['nombre' => 'Comedia']);
   Genero::create(['nombre' => 'Drama']);
   ```

7. Levanta el servidor con `php artisan serve` y abre `http://localhost:8000`. Si usas Laragon, entra directo a `http://mydramalistchafa.test`.

## Cómo seguir el recorrido de una petición

Abre `storage/logs/laravel.log` mientras navegas. El middleware `registrar` deja dos líneas por petición:

```
Entra: GET /dramas
Sale: código 200
```

Las horas del log aparecen en UTC, es decir, seis horas por delante de la hora de Ciudad de México.
