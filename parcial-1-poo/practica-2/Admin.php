<?php

// Importamos la clase Usuario
require_once "Usuario.php";

// Clase Admin que HEREDA de Usuario
class Admin extends Usuario {

    // Método que define el rol del administrador
    public function getRol() {
        return "Administrador";
    }
}
?>