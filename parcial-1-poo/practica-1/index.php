<?php

// Incluye la clase Usuario para poder utilizarla
require_once "Usuario.php";

// Se crea un objeto de la clase Usuario con datos iniciales
$usuario = new Usuario("José Roberto", "jose@email.com");

// Muestra los datos originales en el navegador
echo "<h2>Datos del Usuario</h2>";
echo "Nombre: " . $usuario->getNombre() . "<br>";
echo "Correo: " . $usuario->getCorreo() . "<br>";

// Se modifican los datos usando los métodos setter
$usuario->setNombre("JRCR");
$usuario->setCorreo("jrcr@email.com");

// Muestra los datos actualizados en el navegador
echo "<h3>Datos actualizados</h3>";
echo "Nombre: " . $usuario->getNombre() . "<br>";
echo "Correo: " . $usuario->getCorreo();

?>
