# Proyecto Final - Hoteleria - REST API

## Descripción:

Aplicación creada con la finalidad de tener una conexión a una Base de Datos creada con PostgreSQL.

La cual provee de datos a cualquier aplicación externa que tenga la posibilidad de realizar peticiones a la misma.

En este caso, la Base de Datos fue creada bajo el contexto de un sistema de Hoteleria propuesto durante el curso.

En resumen, es un CRUD Básico, que maneja Roles para los usuarios y maneja Autenticación para protejer las diferentes rutas.

## Tecnologías:

* PHP, version 8.2

<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" width="300"/>

* Laravel, version 10.10

<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300"/>

* Laravel Sanctum, version 3.3

<img src="https://res.cloudinary.com/redfern-web/image/upload/v1598516539/redfern-dev/png/laravel-sanctum.png" width="300"/>

* PostgreSQL, version 15.4

<img src="https://www.postgresql.org/media/img/about/press/elephant.png" width="100"/>

## Descripción Tecnologías:

* PHP:

Es el lenguaje que usamos para la creación de este proyecto, que contiene metodos, paquetes, directivas y extensiones propias del lenguaje. De las cuales nos apoyamos para la implementación del codigo.

* Laravel Framework:

Se utilizó por su facilidad para mapear base de datos y los metodos ORM que implementa, para poder realizar consultas a las tablas de manera sencilla. Así mismo, es uno de los Frameworks más populares de PHP.

* Laravel Sanctum: 

Su función principal es la Autenticación y creación de tokens para los usuarios, de esta manera podemos mantener sesiones activas y podemos proteger nuestras rutas, esto otorga una capa de seguridad a nuestro sistema.

* PostgreSQL:

Es uno de los motores de Bases de Datos más populares en la actualidad, ya que se puede instalar en cualquier OS y contiene funcionalidades poderosas, que permiten realizar sistemas escalables.

## Creacion de Base de Datos:

* Pueden crear la base de datos usando el dump que se encuentra dentro de la carpeta "SQL Script" dentro de la carpeta raiz.

* Luego será necesario que corran los siguietes comandos:

    * php artisan migrate --path=Database/Migrations/2014_10_12_100000_create_password_reset_tokens_table.php
    * php artisan migrate --path=Database/Migrations/2019_12_14_000001_create_personal_access_tokens_table.php

Esto lo haremos para crear las tablas que son necesarias para tener el token de autenticacion de nuestra API y asi poder acceder a los Endpoints protegidos.

## Rutas de la REST API:

Por defecto contamos con los siguientes Endpoints para poder interactuar con las tablas de nuestra base de datos:

* v1/employee
* v1/employee-role
* v1/reservation
* v1/room
* v1/room-type
* v1/task
* v1/transaction
* v1/transaction-type
* v1/user
* v1/user-role

Ejemplos de Endpoints que pueden consumir con su metodo HTTP:

* get: 'v1/user' -> Sirve para obtener todos los usuarios en los registros
* get: 'v1/user/{id}' -> Sirve para obtener un usuario en especifico
* post: 'v1/user' -> sirve para crear un nuevo usuario
* put: 'v1/user/{id}' -> sirve para actualizar un usuario que se encuentra dentro del sistema
* delete: 'v1/user/{id}' -> sirve para eliminar un usuario que se encuentra en los registros

Estas se encuentran dentro de la version 1 de nuestra API, esto se hizo asi para poder tener un sistema escalable, y poder crear una version 2 en un futuro mejorando el comportamiento de nuestro sistema con nuevos requerimientos. Estas rutas se encuentran protegidas, ya que requieren Autenticación del usuario para interactuar con ellas.

* login
* register

Estas últimas dos rutas vienen por defecto para cualquier version de nuestra API. No se encuentra protegidas por Autenticación, por lo cual, cualquier puede interactuar con ellas.

En este momento todo se maneja en un entorno de desarrollo local, por lo cual el acceso a nuestros Endpoints seria de la siguiente manera: 

* http://127.0.0.1:8000/[Endpoint]

Con esto deberian poder consumir la API, siempre y cuando este corriendo.

## Comando para iniciar proyecto:

* php artisan serve

Con este comando pueden iniciar el servidor de laravel localmente.


