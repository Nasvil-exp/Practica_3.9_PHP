# Práctica 3.9 - Gestión de Proyectos con Laravel

**Curso:** 2.º DAW  
**Asignatura:** Desarrollo Web en Entorno Servidor

## 1. Descripción

En esta práctica he desarrollado una aplicación web con Laravel para gestionar proyectos colaborativos.

Los usuarios pueden registrarse, iniciar sesión, crear proyectos y consultar su información. Cada proyecto tiene un propietario, que es el único que puede editarlo, eliminarlo y añadir participantes.

También se pueden asignar roles y horas de contribución a los participantes de cada proyecto.

## 2. Tecnologías utilizadas

- PHP y Laravel 13
- Laravel Breeze para la autenticación
- Laravel Sail y Docker
- MySQL 8.4
- Blade y Tailwind CSS
- Git y GitHub

## 3. Funcionalidades

- Registro e inicio de sesión.
- Página de bienvenida para visitantes.
- Listado y detalles de proyectos.
- Creación, edición y eliminación de proyectos.
- Control de permisos para que solo el propietario pueda modificar sus proyectos.
- Incorporación de usuarios registrados como participantes.
- Asignación de roles y horas de contribución.
- Datos de prueba mediante seeders.

## 4. Instalación y ejecución

Para ejecutar el proyecto es necesario tener Docker Desktop, PHP y Composer, además de Node.js y NPM.

### 4.1. Descargar el proyecto

```bash
git clone https://github.com/Nasvil-exp/Practica_3.9_PHP.git
cd Practica_3.9_PHP
```

### 4.2. Instalar las dependencias de PHP

```bash
composer install
```

Si Composer no está instalado en Windows, se puede utilizar Docker desde PowerShell:

```powershell
docker run --rm -v "${PWD}:/app" -w /app composer:2 install
```

### 4.3. Configurar el entorno

Copiar `.env.example` para crear el archivo `.env`.

En PowerShell:

```powershell
Copy-Item .env.example .env
```

La configuración preparada para esta práctica utiliza MySQL y el puerto 8082.

### 4.4. Iniciar Docker

Con Docker Desktop funcionando:

```bash
docker compose up -d --build
```

### 4.5. Preparar Laravel y la base de datos

Generar la clave de la aplicación:

```bash
docker compose exec laravel.test php artisan key:generate
```

Ejecutar las migraciones y los seeders:

```bash
docker compose exec laravel.test php artisan migrate --seed
```

### 4.6. Instalar y compilar los estilos

```bash
npm ci
npm run build
```

### 4.7. Acceder a la aplicación

Abrir en el navegador:

http://localhost:8082

## 5. Usuarios de prueba

El seeder crea tres usuarios para comprobar el funcionamiento de la aplicación.

| Nombre | Correo electrónico |
|---|---|
| Ana García | ana@example.com |
| Carlos López | carlos@example.com |
| María Sánchez | maria@example.com |

**Contraseña de los usuarios de prueba:** `password`

También se crean dos proyectos con participantes, roles y horas de contribución para comprobar las relaciones y permisos.

## 6. Base de datos

La aplicación utiliza tres tablas principales:

- **users:** almacena los usuarios registrados.
- **projects:** almacena los proyectos, sus datos y el propietario.
- **project_user:** relaciona los usuarios participantes con los proyectos y guarda su rol y horas de contribución.

Las relaciones utilizadas son:

- **1:N:** un usuario puede ser propietario de varios proyectos.
- **N:N:** un proyecto puede tener varios participantes y un usuario puede participar en varios proyectos.

## 7. Repositorio

El código fuente y el historial de commits están disponibles en:

https://github.com/Nasvil-exp/Practica_3.9_PHP

