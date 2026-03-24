<?php

// Importamos las clases (misma carpeta)
require_once "Usuario.php";
require_once "Admin.php";
require_once "Alumno.php";

try {

    echo "<h2>Usuarios válidos</h2>";

    // Admin válido
    $admin = new Admin("José Roberto", "correo@ejemplo.com");
    echo "Nombre: " . $admin->getNombre() . "<br>";
    echo "Rol: " . $admin->getRol() . "<br><br>";

    // Alumno válido
    $alumno = new Alumno("Juan Pérez", "juan@gmail.com", "20230001");
    echo "Nombre: " . $alumno->getNombre() . "<br>";
    echo "Rol: " . $alumno->getRol() . "<br>";
    echo "Matrícula: " . $alumno->getMatricula() . "<br><br>";

    echo "<h2>Prueba con error</h2>";

    // Esto debe fallar (correo inválido)
    $error = new Usuario("Error User", "correo-invalido");

} catch (Exception $e) {

    echo "<b>Error detectado:</b> " . $e->getMessage();

}

?>