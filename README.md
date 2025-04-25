# mi-api-imagenes - API REST para Gestión de Imágenes

Este proyecto es una API REST construida con Laravel para la gestión de imágenes, incluyendo autenticación de usuarios y funcionalidades CRUD básicas (cargar y ver imágenes).

## Funcionalidades

* **Autenticación de Usuarios:** Sistema de login basado en usuario y contraseña, que genera un bearer token para las siguientes solicitudes autenticadas.
* **Carga de Imágenes:** Endpoint para que los usuarios autenticados suban imágenes. Las imágenes se guardan en el sistema de archivos (storage).
* **Visualización de Imágenes:** Endpoint para que los usuarios autenticados obtengan una lista de sus imágenes asociadas.
* **Seguridad:** Protección de rutas de carga y visualización de imágenes mediante bearer tokens.

## Tecnologías Utilizadas

* [Laravel](https://laravel.com/) - El framework PHP para la API.
* [PHP](https://www.php.net/) - El lenguaje de programación del backend.
* [MySQL](https://www.mysql.com/) o [PostgreSQL](https://www.postgresql.org/) - El sistema de gestión de bases de datos.
* [Laravel Sanctum](https://laravel.com/docs/current/sanctum) - Para la autenticación con bearer tokens.
* [Composer](https://getcomposer.org/) - Gestor de dependencias de PHP.
* [fruitcake/laravel-cors](https://github.com/fruitcake/laravel-cors) - Para el manejo de CORS.
