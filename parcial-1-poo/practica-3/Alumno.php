<?php

require_once "Usuario.php";

// Clase Alumno hereda de Usuario
class Alumno extends Usuario {

    private $matricula;

    // Constructor
    public function __construct($nombre, $correo, $matricula) {
        parent::__construct($nombre, $correo);
        $this->matricula = $matricula;
    }

    // Getter matrícula
    public function getMatricula() {
        return $this->matricula;
    }

    // Retorna rol
    public function getRol() {
        return "Alumno";
    }
}

?>