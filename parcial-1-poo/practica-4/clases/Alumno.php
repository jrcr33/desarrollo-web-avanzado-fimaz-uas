<?php

// Se incluye la clase base Usuario para reutilizar sus atributos y métodos.
require_once "Usuario.php";

// Clase Alumno.
// Hereda de Usuario y agrega una matrícula.
class Alumno extends Usuario
{
    // Atributo privado exclusivo del alumno.
    private $matricula;

    // Constructor de la clase Alumno.
    // Reutiliza el constructor del padre para nombre y correo, y además guarda la matrícula.
    public function __construct($nombre, $correo, $matricula)
    {
        parent::__construct($nombre, $correo);
        $this->matricula = $matricula;
    }

    // Devuelve la matrícula del alumno.
    public function getMatricula()
    {
        return $this->matricula;
    }

    // Devuelve el rol correspondiente al alumno.
    public function getRol()
    {
        return "Alumno";
    }
}
?>