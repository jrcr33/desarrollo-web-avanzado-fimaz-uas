<?php

// Se importa la clase base Usuario
require_once "Usuario.php";

// Clase Alumno que hereda de Usuario
class Alumno extends Usuario {

    // Atributo adicional propio del alumno
    private $matricula;

    // Constructor: inicializa datos heredados y la matrícula
    public function __construct($nombre, $correo, $matricula) {
        parent::__construct($nombre, $correo); // Llama al constructor padre
        $this->matricula = $matricula;
    }

    // Devuelve la matrícula del alumno
    public function getMatricula() {
        return $this->matricula;
    }

    // Sobrescribe el método para definir el rol específico
    public function getRol() {
        return "Alumno";
    }
}

?>