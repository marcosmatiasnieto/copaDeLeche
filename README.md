# 🥛 Sistema "Copa de Leche" – Laravel

Sistema de gestión desarrollado en Laravel para administrar Escuelas, Solicitudes, Estados y Registros relacionados al programa **Copa de Leche**.  
Incluye ABM completo, roles (Administrador/Escuela), carga de archivos PDF y un diseño simple y profesional.

---

## 🚀 Requisitos del sistema

Asegurate de tener instalado:

- **PHP 8.1 o superior**
- **Composer**
- **MySQL o MariaDB**
- **Node.js 18+**
- **Laravel 10 o superior**
- Extensión PHP: `fileinfo`, `openssl`, `pdo`, etc.

---

## 📥 Instalación del proyecto

### 1️⃣ Clonar el repositorio

git clone https://github.com/marcosmatiasnieto/copaDeLeche.git


### 2️⃣ Entrar al proyecto

cd copaDeLeche

### 3️⃣ Instalar dependencias de PHP

composer install

### 4️⃣ Instalar dependencias de JS
npm install


## ⚙️ Configuración del entorno

### 5️⃣ Crear el archivo .env

cp .env.example .env

### 6️⃣ Generar la key de Laravel

php artisan key:generate

### 7️⃣ Configurar la base de datos en .env
dentro de .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_copa_de_leche_app
DB_USERNAME=root
DB_PASSWORD=

## 🗄️ Migraciones y datos

### 8️⃣ Crear la base de datos en MySQL

CREATE DATABASE db_copa_de_leche_app;

### 9️⃣ Ejecutar migraciones

-php artisan migrate

(Si tenés seeders)

-php artisan db:seed

## 🖼️ Assets y estilos

### 🔟 Compilar assets

#### Para entorno local:

npm run dev

#### Para producción:

npm run build

## ▶️ Ejecutar el servidor

php artisan serve

#### El sistema estará disponible en:

http://127.0.0.1:8000


## 👥 Usuarios iniciales (opcional)

Si agregaste un seeder, poner por ejemplo:

Administrador:
Email: admin@example.com
Contraseña: admin123

Escuela:
Email: escuela@example.com
Contraseña: escuela123

## 📁 Estructura principal del proyecto

/app → Lógica del sistema

/resources/views → Vistas Blade (escuelas, solicitudes, etc.)

/public/img → Logos e imágenes del sistema

/routes/web.php → Rutas principales

## 🛠️ Tecnologías utilizadas

- Laravel
- Bootstrap 5
- MySQL
- Blade Templates
- Middleware para control de roles
- Storage para archivos PDF

## 📄 Licencia

Proyecto de uso interno. Distribución restringida salvo permiso de su creador.

## 🥛 ¡Gracias por utilizar el "sistema Copa de Leche"!

