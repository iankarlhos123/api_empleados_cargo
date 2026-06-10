# API de Empleados y Cargos

Una API REST construida con Laravel 13 para la gestión de empleados y sus correspondientes cargos en la organización.

## Características

- Gestión completa de empleados (CRUD)
- Administración de cargos y posiciones
- Autenticación con Laravel Fortify
- API segura con Sanctum
- Interfaz reactiva con Livewire y Flux UI
- Tests automatizados con Pest

## Requisitos

- PHP 8.4 o superior
- Composer
- Node.js 18+
- npm o yarn

## Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/iankarlhos123/api_empleados_cargo.git
cd empleados-cargo-api
```

2. **Instalar dependencias de PHP**
```bash
composer install
```

3. **Instalar dependencias de Node**
```bash
npm install
```

4. **Configurar variables de entorno**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurar la base de datos**
```bash
php artisan migrate
```

6. **Compilar assets**
```bash
npm run build
```

## Desarrollo

Para el desarrollo con recarga automática:

```bash
composer run dev
```

Este comando inicia simultáneamente:
- Vite para compilación de assets
- Laravel con servidor integrado

## Uso de la API

### Autenticación

La API utiliza tokens de autenticación. Primero, registrate o inicia sesión:

```bash
POST /login
Content-Type: application/json

{
  "email": "usuario@ejemplo.com",
  "password": "contraseña"
}
```

### Endpoints Principales

#### Empleados
- `GET /api/empleados` - Listar todos los empleados
- `POST /api/empleados` - Crear nuevo empleado
- `GET /api/empleados/{id}` - Obtener empleado específico
- `PUT /api/empleados/{id}` - Actualizar empleado
- `DELETE /api/empleados/{id}` - Eliminar empleado

#### Cargos
- `GET /api/cargos` - Listar todos los cargos
- `POST /api/cargos` - Crear nuevo cargo
- `GET /api/cargos/{id}` - Obtener cargo específico
- `PUT /api/cargos/{id}` - Actualizar cargo
- `DELETE /api/cargos/{id}` - Eliminar cargo

## Testing

Ejecutar todos los tests:
```bash
php artisan test
```

Ejecutar tests con salida compacta:
```bash
php artisan test --compact
```

Ejecutar un test específico:
```bash
php artisan test --filter=NombreDePrueba
```

## Estructura del Proyecto

```
.
├── app/
│   ├── Actions/        # Acciones de negocio
│   ├── Http/
│   │   ├── Controllers/ # Controladores
│   │   └── Requests/   # Form Requests
│   ├── Models/         # Modelos Eloquent
│   └── ...
├── config/            # Archivos de configuración
├── database/
│   ├── migrations/    # Migraciones
│   └── factories/     # Factories
├── resources/
│   ├── css/           # Estilos Tailwind
│   ├── js/            # JavaScript
│   └── views/         # Vistas Livewire
├── routes/            # Definición de rutas
├── tests/             # Tests Pest
└── ...
```

## Comandos Útiles

```bash
# Listar rutas disponibles
php artisan route:list

# Crear una nueva migración
php artisan make:migration nombre_migracion

# Crear un nuevo modelo
php artisan make:model NombreModelo

# Crear un nuevo controlador
php artisan make:controller NombreControlador

# Ejecutar migraciones
php artisan migrate

# Revertir migraciones
php artisan migrate:rollback

# Formatear código con Pint
vendor/bin/pint

# Ejecutar Tinker (REPL de Laravel)
php artisan tinker
```

## Configuración

Las configuraciones principales se encuentran en el archivo `.env`:

```env
APP_NAME="API Empleados"
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=empleados_cargo
DB_USERNAME=root
DB_PASSWORD=
```

## Contribución

1. Fork el repositorio
2. Crea una rama para tu característica (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la licencia MIT.

## Soporte

Para reportar problemas o sugerencias, abre un issue en el repositorio de GitHub.

## Tecnologías Utilizadas

- **Laravel 13** - Framework PHP
- **Livewire 4** - Componentes reactivos
- **Flux UI** - Componentes de UI
- **Tailwind CSS 4** - Framework CSS
- **Pest 4** - Framework de testing
- **Laravel Fortify** - Autenticación
- **Laravel Sanctum** - API tokens
- **Vite** - Build tool

---

**Última actualización:** Junio 2026
