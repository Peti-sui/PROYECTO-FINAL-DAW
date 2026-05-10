# SWAGSCORD - Tienda online de streetwear y moda alternativa

## Descripcion

SWAGSCORD es una tienda online especializada en streetwear y moda alternativa con un modelo de negocio basado en catalogo bajo pedido. La plataforma permite a los usuarios explorar productos de marcas emergentes y consolidadas (BAPE, Supreme, Elixir, etc.) y contactar con el vendedor a traves de WhatsApp, telefono o correo electronico.

El sistema cuenta con un panel de administracion completo que permite gestionar el catalogo de productos: anadir, editar, eliminar y buscar productos, asi como gestionar las imagenes asociadas a cada uno.

## Tecnologias utilizadas

- PHP (backend, sesiones, CRUD)
- MySQL (base de datos)
- HTML5, CSS3, JavaScript (frontend)
- Bootstrap 5 (responsive)
- Splide.js (carruseles)
- Git y GitHub (control de versiones)

## Requisitos previos

- XAMPP / WAMP / MAMP
- PHP 7.4 o superior
- MySQL 5.7 o superior
- Navegador web moderno

## Instalacion

1. Clonar el repositorio en la carpeta htdocs de XAMPP

   git clone https://github.com/Peti-sui/PROYECTO-FINAL-DAW.git

2. Abrir phpMyAdmin y crear una base de datos llamada swagscord

3. Importar el archivo swagscord.sql

4. Configurar la conexion a la base de datos en includes/config.php

   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'swagscord';

5. Asegurar que la carpeta uploads tiene permisos de escritura

6. Acceder a la tienda a traves de

   http://localhost/PROYECTO-FINAL-DAW/index.php

## Credenciales de acceso al panel de administracion

- Usuario: admin
- Contrasena: swag123

El panel de administracion se encuentra en

   http://localhost/PROYECTO-FINAL-DAW/admin/login.php


## Funcionalidades

### Frontend (clientes)

- Visualizacion de catalogo de productos
- Carruseles de imagenes por producto con Splide.js
- Secciones separadas para ropa y accesorios
- Contacto a traves de WhatsApp, telefono o email
- Informacion de contacto y condiciones de venta
- Diseno responsive adaptable a dispositivos moviles
- WhatsApp flotante en todas las paginas

### Backend (administrador)

- Login con sesiones
- Listado de productos con stock, imagen y descripcion
- Buscador por nombre, descripcion o categoria
- Creacion de nuevos productos con subida multiple de imagenes
- Edicion de productos existentes
- Eliminacion de productos (borra tambien sus imagenes)
- Validacion de extensiones de imagen (jpg, jpeg, png, gif, webp, avif)
- Cierre de sesion

## Base de datos

La base de datos contiene tres tablas:

- categorias: almacena las categorias de productos (Ropa, Accesorios)
- admin: almacena el usuario y contrasena del administrador
- productos: almacena la informacion de cada producto (nombre, descripcion, precio, stock, carpeta de imagenes, categoria)

El archivo swagscord.sql incluye 39 productos de ejemplo con stock aleatorio.

## Autor

<div align="center">

| Peti-sui -- Scoo |
|       Kevin      |
| :---: |
|<img src="https://i.postimg.cc/nzBFHmZ0/kindpng-246018.png" width="220"> |

</>

