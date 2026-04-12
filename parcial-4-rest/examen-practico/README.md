 Evaluación Parcial - API REST en PHP

Descripción del proyecto

Este proyecto consiste en el desarrollo de una **API REST funcional en PHP puro**, sin el uso de frameworks, para la gestión de información de futbolistas.

La API permite realizar operaciones CRUD completas (**Crear, Leer, Actualizar y Eliminar**), utilizando una base de datos MySQL y conexión mediante PDO.

Además, se implementan respuestas en formato JSON, validaciones de datos y manejo básico de errores, siguiendo una estructura organizada basada en el modelo RESTful.

 Autor
**José Roberto Corona Ramírez**

Tecnologías utilizadas

* PHP 8
* MySQL
* PDO (PHP Data Objects)
* XAMPP
* Postman
* GitHub

 Estructura del proyecto
evaluacion-api-rest-futbol/
├── config/
│   └── Database.php
├── models/
│   └── Futbolista.php
├── api/
│   ├── index.php
│   └── .htaccess
├── script_bd.sql
└── README.md


Descripción de carpetas

* **config/** → Contiene la conexión a la base de datos mediante PDO
* **models/** → Contiene la lógica del CRUD (modelo Futbolista)
* **api/** → Contiene el archivo principal de la API y configuración de rutas
* **script_bd.sql** → Script para crear la base de datos y tabla
* **README.md** → Documentación del proyecto


Base de datos

 Nombre:
futbolistas


Tabla:
futbolistas


Campos:

* id
* nombre
* posicion
* numero
* edad
* equipo
* created_at
* updated_at

 Obtener todos los futbolistas
GET /futbolistas

 Obtener futbolista por ID
GET /futbolistas/{id}

Crear futbolista
POST /futbolistas


 Actualizar futbolista
PUT /futbolistas/{id}

Eliminar futbolista
DELETE /futbolistas/{id}

Ejecución del proyecto
Ruta local

Colocar el proyecto en:
C:\xampp\htdocs\desarrollo-web-avanzado-fimaz-uas\parcial-4-api-rest\evaluacion-api-rest-futbol

URL base
http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-4-api-rest/evaluacion-api-rest-futbol/api/futbolistas

 Requisitos

* PHP 8 o superior
* XAMPP (Apache y MySQL activos)
* Navegador web
* Postman

 Pruebas realizadas

Se realizaron pruebas completas del CRUD utilizando Postman:

* Consulta de todos los registros (GET)
* Consulta por ID (GET)
* Inserción de nuevos datos (POST)
* Actualización de registros (PUT)
* Eliminación de registros (DELETE)
* Validación de errores (datos incorrectos)

Validaciones implementadas

* Todos los campos son obligatorios
* La edad no puede ser negativa
* El número del jugador debe ser mayor que cero
* Validación de JSON vacío o incorrecto
* Verificación de existencia antes de actualizar o eliminar

 Consideraciones técnicas

* Se utilizó PDO para mejorar la seguridad y evitar inyección SQL
* Se implementó arquitectura RESTful basada en métodos HTTP
* Se utilizaron rutas con segmentos (`/futbolistas/{id}`) en lugar de parámetros
* Las respuestas se manejan en formato JSON para facilitar la comunicación cliente-servidor



Evidencia

El proyecto incluye:

* Código fuente funcional en GitHub
* Archivo comprimido (.ZIP)
* Video demostrativo mostrando:

  * Funcionamiento completo de la API
  * Pruebas en Postman
  * Estructura del proyecto
  * Explicación del funcionamiento


Conclusión

En este proyecto se logró desarrollar una API REST completamente funcional utilizando PHP puro y PDO, implementando operaciones CRUD, validaciones de datos y manejo de errores.

La estructura del sistema permite una clara separación de responsabilidades, facilitando su mantenimiento y escalabilidad, además de cumplir con los principios básicos de una arquitectura RESTful.

