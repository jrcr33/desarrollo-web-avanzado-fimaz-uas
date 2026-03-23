<?php

require_once 'Usuario.php';

$usuario = new Usuario("José Roberto Corona Ramírez", "jose@example.com");

echo "<h1>Práctica 1: Clase Usuario</h1>";
echo "<p><strong>Nombre:</strong> " . $usuario->getNombre() . "</p>";
echo "<p><strong>Correo:</strong> " . $usuario->getCorreo() . "</p>";