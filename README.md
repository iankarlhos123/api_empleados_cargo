# API de Empleados y Cargos

API REST desarrollada en Laravel para la gestión de empleados, cargos y funciones asociadas a cada cargo. Utiliza autenticación mediante tokens con Laravel Sanctum.


## Requisitos previos

Antes de clonar el repositorio verifica que tienes instalado:

- PHP 8.3 o superior
- Node.js
- Composer
- MySQL

Ejecuta los siguientes comandos en tu terminal para verificar:

```bash
php -v
node -v
composer -v
mysql --version
```

## Instalación

### Clonar el repositorio

```bash
git clone https://github.com/iankarlhos123/api_empleados_cargo
```

Luego dirígete a la carpeta del proyecto:

```bash
cd api_empleados_cargo
```

### Instalar dependencias

Ejecuta cada comando por separado:

```bash
composer install
npm install
```

### Configurar el archivo de entorno

```bash
cp .env.example .env
```

### Editar el archivo `.env`

Abre el archivo `.env` en tu editor de código y edita los siguientes campos con las credenciales de tu motor de base de datos:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=1234
```

Nota: `DB_USERNAME` y `DB_PASSWORD` dependen de la configuración de tu motor de base de datos. Asegúrate de que `DB_DATABASE` coincida exactamente con el nombre de la base de datos que crearás en el siguiente paso.

### Generar la clave de la aplicación

```bash
php artisan key:generate
```

### Crear la base de datos en MySQL (si no existe)

Ingresa a MySQL y ejecuta:

```sql
CREATE DATABASE db_3066552;
```

### Ejecutar las migraciones

```bash
php artisan migrate
```

### Poblar la base de datos

```bash
php artisan db:seed
```

Esto creará automáticamente:

- 1 usuario de prueba para autenticación
- 40 cargos
- 5 funciones por cada cargo
- 30 empleados con cargos distribuidos aleatoriamente

Credenciales del usuario que se acaban de crear:

```
Email: admin@example.com
Password: password
```

### Ejecutar los tests

```bash
php artisan test
```

### Levantar el servidor

```bash
php artisan serve
```

## Generación del token

Antes de consumir cualquier endpoint protegido debes iniciar sesión para obtener tu token.

### Registrar un nuevo usuario 

Si quieres crear tu propio usuario en vez de usar el de prueba, puedes registrarte indicando nombre, correo y contraseña:

```bash
curl -X POST http://localhost:8000/api/register -H "Accept: application/json" -H "Content-Type: application/json" -d '{"name":"Goku Solano","email":"goku@example.com","password":"password123"}'
```

Recibirás una respuesta como esta:

```json
{
  "message": "Usuario registrado correctamente.",
  "user": {
    "id": 2,
    "name": "Goku Solano",
    "email": "goku@example.com"
  }
}
```

Con este registro el usuario es creado exitosamente, pero no se genera un token de forma automática. Deberás iniciar sesión a continuación para obtener tu token.

### Iniciar sesión

Si ya tienes un usuario (el de prueba creado por el seeder, o uno que registraste tú mismo), inicia sesión así:

```bash
curl -X POST http://localhost:8000/api/login -H "Accept: application/json" -H "Content-Type: application/json" -d '{"email":"admin@example.com","password":"password"}'
```

Recibirás una respuesta como esta:

```json
{
  "message": "Sesion iniciada correctamente.",
  "token": "1|oEq4mR8v5P3LdX7cyuN52YButNp0GaPL7sgiQxzWae13ad01"
}
```

Copia ese token. Lo usarás en todos los endpoints reemplazando `TU_TOKEN` por el valor recibido en la parte de token.

### Lista de empleados

```bash
curl -X GET http://localhost:8000/api/empleados -H "Authorization: Bearer TU_TOKEN"
```

### Lista de cargos (incluye funciones por cargo)

```bash
curl -X GET http://localhost:8000/api/cargos -H "Authorization: Bearer TU_TOKEN"
```

### Lista de todas las funciones

```bash
curl -X GET http://localhost:8000/api/funciones-cargo -H "Authorization: Bearer TU_TOKEN"
```

### Funciones por cargo

```bash
curl -X GET http://localhost:8000/api/cargos/1/funciones -H "Authorization: Bearer TU_TOKEN"
```

Nota: El `/1` hace referencia al id del cargo que deseas consultar.

### Detalle de empleado

Muestra nombre, cargo asignado, salario y funciones que tiene por su cargo.

```bash
curl -X GET http://localhost:8000/api/empleados/4 -H "Authorization: Bearer TU_TOKEN"
```

Nota: El `/4` hace referencia al id del empleado del cual quieres ver el detalle.

## CRUD Empleados

### Crear

```bash
curl -X POST http://localhost:8000/api/empleados -H "Authorization: Bearer TU_TOKEN" -H "Accept: application/json" -H "Content-Type: application/json" -d '{"id_cargo":"4","nombres":"goku","apellidos":"solano","fecha_nacimiento":"2000-12-01","fecha_ingreso":"2023-11-25","salario":"3000000","estado":true}'
```

### Leer

```bash
curl -X GET http://localhost:8000/api/empleados -H "Authorization: Bearer TU_TOKEN"
```

### Actualizar

```bash
curl -X PUT http://localhost:8000/api/empleados/31 -H "Authorization: Bearer TU_TOKEN" -H "Accept: application/json" -H "Content-Type: application/json" -d '{"id_cargo":"4","nombres":"goku","apellidos":"solano","fecha_nacimiento":"2000-12-01","fecha_ingreso":"2023-11-25","salario":"3500000","estado":false}'
```

Nota: El `/31` hace referencia al id del empleado que se va a actualizar.

### Eliminar

```bash
curl -X DELETE http://localhost:8000/api/empleados/31 -H "Authorization: Bearer TU_TOKEN"
```

Nota: El `/31` hace referencia al id del empleado que se va a eliminar.

## CRUD Cargos

### Crear

```bash
curl -X POST http://localhost:8000/api/cargos -H "Authorization: Bearer TU_TOKEN" -H "Accept: application/json" -H "Content-Type: application/json" -d '{"nombre_cargo":"el cargo que deseamos agregar","descripcion":"la descripcion referente al cargo"}'
```

### Leer

```bash
curl -X GET http://localhost:8000/api/cargos -H "Authorization: Bearer TU_TOKEN"
```

### Actualizar

```bash
curl -X PUT http://localhost:8000/api/cargos/41 -H "Authorization: Bearer TU_TOKEN" -H "Accept: application/json" -H "Content-Type: application/json" -d '{"nombre_cargo":"el cargo que deseamos actualizar","descripcion":"la descripcion actualizada referente al cargo"}'
```

Nota: El `/41` hace referencia al id del cargo que se va a actualizar.

### Eliminar

```bash
curl -X DELETE http://localhost:8000/api/cargos/41 -H "Authorization: Bearer TU_TOKEN"
```

Nota: El `/41` hace referencia al id del cargo que se va a eliminar.

## Cerrar sesión

```bash
curl -X POST http://localhost:8000/api/logout -H "Authorization: Bearer TU_TOKEN"
```