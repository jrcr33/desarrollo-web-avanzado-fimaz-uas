<?php

require_once "Usuario.php";

// Clase Admin hereda de Usuario
class Admin extends Usuario {

    // Retorna el rol específico
    public function getRol() {
        return "Administrador";
    }
}

?>