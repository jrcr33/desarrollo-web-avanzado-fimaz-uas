<?php

// Se importa la clase base Usuario
require_once "Usuario.php";

// Clase Admin que hereda de Usuario
class Admin extends Usuario {

    // Sobrescribe el método para definir el rol específico
    public function getRol() {
        return "Administrador";
    }
}

?>