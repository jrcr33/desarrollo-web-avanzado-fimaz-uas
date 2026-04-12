<?php
/*
-------------------------------------------------------
Alumno: José Roberto Corona Ramírez
Materia: Desarrollo Web Avanzado
Actividad: U2 ATC 2
Archivo: Alumno.php
Descripción: Clase que representa la entidad Alumno
con sus atributos principales.
-------------------------------------------------------
*/

// Clase que representa a un alumno como objeto
class Alumno {

    // Atributos privados del alumno
    private $idAlumno;
    private $nombre;
    private $apellido;
    private $correo;

    // Constructor que inicializa los datos del alumno al crear el objeto
    public function __construct($nombre, $apellido, $correo, $idAlumno = null) {
        $this->idAlumno = $idAlumno;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
    }

    // Devuelve el ID del alumno
    public function getIdAlumno() {
        return $this->idAlumno;
    }

    // Devuelve el nombre del alumno
    public function getNombre() {
        return $this->nombre;
    }

    // Devuelve el apellido del alumno
    public function getApellido() {
        return $this->apellido;
    }

    // Devuelve el correo del alumno
    public function getCorreo() {
        return $this->correo;
    }
}
?>