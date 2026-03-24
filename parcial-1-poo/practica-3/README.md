Práctica 3: Sistema de usuarios con validaciones y excepciones
Descripción del sistema

En esta práctica desarrollé un sistema básico en PHP aplicando programación orientada a objetos. El sistema permite crear usuarios de distintos tipos, validar el correo electrónico y controlar errores mediante excepciones.

Flujo de clases

La clase principal es `Usuario`, que contiene los atributos nombre y correo. En esta clase se realiza la validación del correo usando `filter_var()`. Si el correo no tiene un formato válido, se lanza una excepción.

A partir de esta clase se derivan:

- `Admin`, que devuelve el rol de Administrador.
- `Alumno`, que agrega el atributo matrícula y devuelve el rol de Alumno.

En `index.php` se crean objetos válidos y también un caso inválido para demostrar el manejo de errores.

Evidencia del manejo de errores

Se utilizó un bloque `try/catch` para capturar excepciones. Cuando se intenta registrar un usuario con un correo no válido, el sistema muestra un mensaje de error sin detener abruptamente la ejecución.

 Conclusión
 
Esta práctica me ayudó a reforzar el uso de clases, herencia, validaciones y manejo de excepciones en PHP. También entendí mejor cómo organizar un sistema sencillo de forma más clara y segura.
