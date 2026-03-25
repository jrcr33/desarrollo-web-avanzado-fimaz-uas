<?php

// Se importan las clases desde la carpeta "clases"
require_once "clases/Usuario.php";
require_once "clases/Admin.php";
require_once "clases/Alumno.php";

try {

    echo "<h2>Usuarios válidos</h2>";

    // Se crea un administrador con datos correctos
    $admin = new Admin("José Roberto", "correo@ejemplo.com");

    // Se muestran sus datos
    echo "Nombre: " . $admin->getNombre() . "<br>";
    echo "Rol: " . $admin->getRol() . "<br><br>";

    // Se crea un alumno con datos correctos
    $alumno = new Alumno("Juan Pérez", "juan@gmail.com", "20230001");

    // Se muestran sus datos
    echo "Nombre: " . $alumno->getNombre() . "<br>";
    echo "Rol: " . $alumno->getRol() . "<br>";
    echo "Matrícula: " . $alumno->getMatricula() . "<br><br>";

    echo "<h2>Prueba con error</h2>";

    // Se intenta crear un usuario con correo inválido
    // Esto generará una excepción
    $error = new Usuario("Error User", "correo-invalido");

} catch (Exception $e) {

    // Se captura el error y se muestra de forma controlada
    echo "<b>Error detectado:</b> " . $e->getMessage();

}

?>