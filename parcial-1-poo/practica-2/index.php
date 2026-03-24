<?php

// Importamos la clase Admin
require_once "Admin.php";

// Creamos un objeto Admin
$admin = new Admin("José Roberto", "jrcr@email.com");

// Mostramos los datos usando los métodos heredados
echo "<h2>Datos del Administrador</h2>";
echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: " . $admin->getRol();

?>