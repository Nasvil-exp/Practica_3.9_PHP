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

Para ejecutar el proyecto es necesario tener instalados Docker Desktop, PHP y Composer, además de Node.js y NPM.

### 4.1. Descargar el proyecto

```bash
git clone https://github.com/Nasvil-exp/Practica_3.9_PHP.git
cd Practica_3.9_PHP
```

### 4.2. Instalar las dependencias de PHP

```bash
composer install
```

### 4.3. Configurar el entorno

Copiar el archivo `.env.example` y crear un archivo llamado `.env`.

En PowerShell:

```powershell
Copy-Item .env.example .env
```

El archivo `.env.example` incluye la configuración de MySQL y el puerto 8082.

### 4.4. Iniciar Docker

Con Docker Desktop funcionando, ejecutar:

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
npm install
npm run build
```

### 4.7. Acceder a la aplicación

Abrir en el navegador:

http://localhost:8082

## 5. Usuarios de prueba

Los seeders crean tres usuarios para probar la aplicación.

| Nombre
|---|---|
| PacoPorros 
| agalsan1808 
| Carlos López

Estos usuarios permiten comprobar los permisos, los proyectos y las relaciones entre participantes.

## 6. Base de datos

La aplicación utiliza las siguientes tablas principales:

- **users:** almacena los usuarios registrados.
- **projects:** almacena los proyectos y su propietario.
- **project_user:** relaciona participantes y proyectos, incluyendo su rol y horas de contribución.

Se utiliza una relación **uno a muchos (1:N)** entre el propietario y sus proyectos, y una relación **muchos a muchos (N:N)** entre usuarios participantes y proyectos.

## 7. Repositorio

El código fuente y el historial de commits están disponibles en:

https://github.com/Nasvil-exp/Practica_3.9_PHP

