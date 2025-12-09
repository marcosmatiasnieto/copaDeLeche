# 🥛 Sistema "Copa de Leche" -- Laravel

Sistema web para la gestión de Escuelas, Solicitudes y Documentación

Este proyecto fue desarrollado para digitalizar y optimizar el proceso
de administración del programa **Copa de Leche**, permitiendo gestionar
escuelas, solicitudes, archivos PDF, estados y usuarios con distintos
roles.

Incluye una interfaz clara, responsiva y orientada al uso real en
instituciones.



# 🚀 Funcionalidades principales

### ✔️ **Roles y autenticación**

-   Administrador\
-   Escuela\
-   Middleware para control de permisos

### ✔️ **Módulos ABM**

-   Escuelas\
-   Solicitudes\
-   Documentación en PDF

### ✔️ **Estados de Solicitudes**

-   Pendiente\
-   Aprobado\
-   Rechazado

### ✔️ **Manejo de archivos**

-   Subida de PDFs\
-   Almacenamiento seguro en `storage`

### ✔️ **Interfaz visual limpia**

-   Bootstrap 5\
-   Diseño ordenado y responsivo

------------------------------------------------------------------------

# ⚙️ Requisitos

Asegurate de tener instalado:

-   PHP **8.1+**\
-   Composer\
-   MySQL / MariaDB\
-   Node.js **18+**\
-   Extensiones PHP necesarias: `pdo`, `fileinfo`, `openssl`, etc.\
-   Laravel **10+**

------------------------------------------------------------------------

# 📥 Instalación

### 1️⃣ Clonar el repositorio

``` bash
git clone https://github.com/marcosmatiasnieto/copaDeLeche.git
```

### 2️⃣ Ingresar al proyecto

``` bash
cd copaDeLeche
```

### 3️⃣ Instalar dependencias de PHP

``` bash
composer install
```

### 4️⃣ Instalar dependencias de Node

``` bash
npm install
```

------------------------------------------------------------------------

# 🔧 Configuración del entorno

### 5️⃣ Crear archivo `.env`

``` bash
cp .env.example .env
```

### 6️⃣ Generar la APP_KEY

``` bash
php artisan key:generate
```

### 7️⃣ Configurar la base de datos en `.env`

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_copa_de_leche_app
    DB_USERNAME=root
    DB_PASSWORD=

------------------------------------------------------------------------

# 🗄️ Base de datos

### 8️⃣ Crear la base de datos

``` sql
CREATE DATABASE db_copa_de_leche_app;
```

### 9️⃣ Ejecutar migraciones

``` bash
php artisan migrate
```

### Ejecutar seeders

``` bash
php artisan db:seed
```
### generar la key 

``` bash
php artisan key:generate
```

------------------------------------------------------------------------

# 🎨 Compilar assets

### Entorno local

``` bash
npm run dev
```

### Producción

``` bash
npm run build
```

------------------------------------------------------------------------

# ▶️ Ejecutar el servidor

``` bash
php artisan serve
```

El sistema estará disponible en:\
👉 **http://127.0.0.1:8000**

------------------------------------------------------------------------

# 👥 Usuarios iniciales (si usás seeders)

### **Administrador**

Email: `administrador@gmail.com`\
Contraseña: `admin123`

### **Escuela**

Email: `escuela@gmail.com`\
Contraseña: `escuela123`

------------------------------------------------------------------------

# 📁 Estructura principal

    /app                   → Controladores, modelos y lógica
    /resources/views       → Vistas Blade
    /public/img            → Imágenes del sistema
    /routes/web.php        → Rutas principales
    /storage/app/public    → PDFs subidos por los usuarios

------------------------------------------------------------------------

# 🛠️ Tecnologías utilizadas

-   Laravel 10\
-   MySQL\
-   Bootstrap 5\
-   Blade Templates\
-   Middleware de roles\
-   Upload de archivos PDF con Storage

------------------------------------------------------------------------

# 📄 Licencia

Proyecto de uso interno.\
Distribución permitida únicamente con autorización del autor.

------------------------------------------------------------------------

# 🥛 Gracias por usar el Sistema "Copa de Leche"
