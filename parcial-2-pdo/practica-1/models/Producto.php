<?php

// Clase que representa un producto
class Producto {

    // Atributos privados (encapsulamiento)
    private $id;           // Identificador del producto
    private $nombre;       // Nombre del producto
    private $descripcion;  // Descripción del producto
    private $existencia;   // Cantidad disponible
    private $precio;       // Precio del producto

    // Constructor para inicializar valores
    public function __construct($id = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = 0.00) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    // Getter para obtener el id
    public function getId() {
        return $this->id;
    }

    // Setter para asignar el id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter para obtener el nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para asignar el nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter para obtener la descripción
    public function getDescripcion() {
        return $this->descripcion;
    }

    // Setter para asignar la descripción
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    // Getter para obtener la existencia
    public function getExistencia() {
        return $this->existencia;
    }

    // Setter para asignar la existencia
    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    // Getter para obtener el precio
    public function getPrecio() {
        return $this->precio;
    }

    // Setter para asignar el precio
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>