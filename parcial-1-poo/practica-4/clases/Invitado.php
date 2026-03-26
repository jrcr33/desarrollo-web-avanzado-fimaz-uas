<?php

// Se incluye la clase base Usuario para poder extenderla.
require_once "Usuario.php";

// Clase Invitado.
// Hereda de Usuario y agrega el nombre de la empresa.
class Invitado extends Usuario
{
    // Atributo privado exclusivo del invitado.
    private $empresa;

    // Constructor de la clase Invitado.
    // Reutiliza el constructor del padre y guarda la empresa.
    public function __construct($nombre, $correo, $empresa)
    {
        parent::__construct($nombre, $correo);
        $this->empresa = $empresa;
    }

    // Devuelve la empresa del invitado.
    public function getEmpresa()
    {
        return $this->empresa;
    }

    // Devuelve el rol correspondiente al invitado.
    public function getRol()
    {
        return "Invitado";
    }
}
?>