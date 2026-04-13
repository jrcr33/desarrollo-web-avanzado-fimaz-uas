# Sistema Web de Gestión de Torneos de Básquetbol

Alumno: José Roberto Corona Ramírez  
Materia: Desarrollo Web Avanzado  
Unidad: U3 - Evaluación Parcial  

---

## Descripción del proyecto

Este proyecto consiste en el desarrollo de una aplicación web utilizando PHP puro, MySQL y el patrón de arquitectura MVC (Modelo - Vista - Controlador).

El sistema permite la gestión de torneos de básquetbol, implementando las operaciones básicas de un CRUD (Crear, Leer, Actualizar y Eliminar), con el objetivo de organizar y administrar la información de cada torneo de manera eficiente.

---

## Objetivo

Desarrollar una aplicación web funcional que permita registrar, consultar, editar y eliminar torneos, aplicando buenas prácticas de programación y separación de responsabilidades mediante el uso del patrón MVC.

---

## Arquitectura utilizada (MVC)

El sistema está estructurado de la siguiente manera:

Modelo (Model):  
Encargado de la interacción con la base de datos mediante consultas SQL como INSERT, SELECT, UPDATE y DELETE.

Vista (View):  
Representa la interfaz gráfica del sistema, donde el usuario interactúa con formularios y tablas.

Controlador (Controller):  
Actúa como intermediario entre la vista y el modelo, procesando los datos y ejecutando la lógica del sistema.

---

## Estructura del proyecto
webappbasket/
│
├── config/
│ └── Database.php
│
├── controllers/
│ └── TorneosController.php
│
├── models/
│ └── TorneosModel.php
│
├── views/
│ ├── admin/
│ │ ├── admin.php
│ │ ├── frm_torneos.php
│ │ ├── torneos_insert.php
│ │ ├── read_all_torneos.php
│ │ ├── read_one_torneo.php
│ │ ├── update_torneo.php
│ │ ├── torneo_update.php
│ │ └── delete_torneo.php
│ │
│ └── template/
│ ├── header.php
│ └── footer.php
│
└── index.php 


---

## Funcionalidades principales

Crear torneo:  
Permite registrar un nuevo torneo mediante un formulario donde se capturan datos como nombre, organizador, sede, categoría y premios.

Listar torneos:  
Muestra todos los torneos registrados en la base de datos en forma de tabla.

Consultar torneo:  
Permite visualizar la información detallada de un torneo específico.

Editar torneo:  
Permite modificar los datos de un torneo previamente registrado.

Eliminar torneo:  
Permite eliminar un torneo de la base de datos mediante confirmación.

---

## Base de datos

Se utilizó MySQL con la siguiente tabla:

```sql
CREATE TABLE torneos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_torneo VARCHAR(100),
    organizador VARCHAR(100),
    patrocinadores TEXT,
    sede VARCHAR(100),
    categoria VARCHAR(100),
    premio_1 VARCHAR(100),
    premio_2 VARCHAR(100),
    premio_3 VARCHAR(100),
    otro_premio VARCHAR(100),
    usuario VARCHAR(100),
    contrasena VARCHAR(255)
);
Seguridad

Las contraseñas se almacenan utilizando la función password_hash(), lo que evita guardar información sensible en texto plano.

Tecnologías utilizadas
PHP sin frameworks
MySQL
HTML5
Bootstrap 5
PDO para conexión segura a la base de datos
Cómo ejecutar el proyecto
Instalar XAMPP
Iniciar Apache y MySQL
Colocar el proyecto en la carpeta:
C:\xampp\htdocs\
Crear la base de datos en phpMyAdmin
Crear la tabla torneos

Acceder desde el navegador:

http://localhost/webappbasket/

