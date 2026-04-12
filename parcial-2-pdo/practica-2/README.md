Práctica: Try/Catch y Transacciones (PDO + MySQL)
Alumno
José Roberto Corona Ramírez
Materia
Desarrollo Web Avanzado

Objetivo

El objetivo de esta práctica es implementar el uso de transacciones en PHP utilizando PDO y MySQL, aplicando el manejo de errores con try/catch para asegurar la integridad de los datos.

Se busca comprobar cómo funcionan las operaciones de COMMIT y ROLLBACK, garantizando que los datos solo se guarden cuando todo el proceso se ejecuta correctamente.

Tecnologías utilizadas
PHP (PDO)
MySQL
XAMPP
HTML + CSS
Programación Orientada a Objetos (POO)
 Estructura del proyecto
practica-transacciones/
│── index.php
└── clases/
    │── Conexion.php
    │── Alumno.php
    │── AlumnoDAO.php
Descripción del funcionamiento

El sistema permite registrar alumnos mediante un formulario web.

Cuando se envían los datos, se ejecuta una transacción que realiza dos operaciones:

Insertar el alumno en la tabla alumnos
Registrar un log en la tabla logs_alumnos
Flujo de ejecución:
Se inicia la transacción con beginTransaction()
Se insertan los datos del alumno
Se registra el log de la operación
Si todo sale bien → COMMIT
Si ocurre un error → ROLLBACK

Además, el sistema incluye una opción para simular errores, lo que permite comprobar el funcionamiento del rollback.

Pruebas realizadas
Prueba 1: COMMIT
Pasos:
Llenar el formulario con datos válidos
No marcar la opción de "Simular error"
Presionar "Registrar alumno"

Resultado esperado:
Se muestra mensaje de éxito (COMMIT)
El alumno se guarda en la tabla alumnos
Se genera un registro en logs_alumnos

Prueba 2: ROLLBACK (error simulado)
Pasos:

Llenar el formulario con datos válidos
Activar la opción "Simular error"
Presionar "Registrar alumno"

Resultado esperado:

Se muestra mensaje de rollback
No se guarda el alumno
No se genera ningún log

Prueba 3: ROLLBACK (correo duplicado)
Pasos:
Intentar registrar un alumno con un correo ya existente

Resultado esperado:
Se genera un error por restricción UNIQUE
Se ejecuta rollback automáticamente
No se guarda información duplicada

Conclusión
En esta práctica se logró implementar correctamente el uso de transacciones en PHP con PDO, aplicando el manejo de errores con try/catch.
Se comprobó que el sistema mantiene la integridad de los datos, ya que solo guarda la información cuando todas las operaciones se ejecutan correctamente, y en caso contrario revierte los cambios.
Además, se aplicó programación orientada a objetos para organizar mejor el código y hacerlo más claro y reutilizable.
