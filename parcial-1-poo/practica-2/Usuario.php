<?php

// Clase que representa a un usuario con nombre y correo
class Usuario {

    // Atributos privados para proteger los datos (encapsulamiento)
    private $nombre;
    private $correo;

    // Constructor: inicializa los valores al crear el objeto
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Método getter: devuelve el nombre del usuario
    public function getNombre() {
        return $this->nombre;
    }

    // Método getter: devuelve el correo del usuario
    public function getCorreo() {
        return $this->correo;
    }

    // Método setter: permite modificar el nombre del usuario
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método setter: permite modificar el correo del usuario
    public function setCorreo($correo) {
        $this->correo = $correo;
    }
}
?>