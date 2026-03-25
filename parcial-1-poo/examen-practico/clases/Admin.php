<?php

// Se incluye la clase base Usuario para poder heredar de ella.
require_once "Usuario.php";

// Clase Admin.
// Representa a un usuario con rol de administrador.
class Admin extends Usuario
{
    // Devuelve el rol correspondiente al administrador.
    public function getRol()
    {
        return "Administrador";
    }
}
?>