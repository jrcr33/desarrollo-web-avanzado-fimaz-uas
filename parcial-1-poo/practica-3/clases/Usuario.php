<?php

// Clase base Usuario
// Representa a cualquier usuario del sistema
class Usuario {

    // Atributos protegidos (accesibles en clases hijas)
    protected $nombre;
    protected $correo;

    // Constructor: inicializa los datos del usuario
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        $this->setCorreo($correo); // Se valida el correo al crearlo
    }

    // Devuelve el nombre del usuario
    public function getNombre() {
        return $this->nombre;
    }

    // Devuelve el correo del usuario
    public function getCorreo() {
        return $this->correo;
    }

    // Asigna el correo validando su formato
    public function setCorreo($correo) {
        // Si el correo no es válido, se lanza una excepción
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo inválido: $correo");
        }

        // Si es válido, se guarda
        $this->correo = $correo;
    }

    // Método que devuelve el rol general (puede ser sobrescrito)
    public function getRol() {
        return "Usuario";
    }
}
?>