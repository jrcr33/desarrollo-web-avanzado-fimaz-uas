<?php

// Clase base Usuario
// Representa un usuario general del sistema con validación de correo

class Usuario {

    protected $nombre;
    protected $correo;

    // Constructor
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        $this->setCorreo($correo); // Validamos desde aquí
    }

    // Getter nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Getter correo
    public function getCorreo() {
        return $this->correo;
    }

    // Setter correo con validación
    public function setCorreo($correo) {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo inválido: $correo");
        }
        $this->correo = $correo;
    }

    // Método genérico (se sobrescribe en clases hijas)
    public function getRol() {
        return "Usuario";
    }
}

?>