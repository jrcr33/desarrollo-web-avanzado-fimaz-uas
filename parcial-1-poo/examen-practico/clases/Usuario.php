<?php

// Clase base Usuario.
// Sirve para definir los datos generales que tendrá cualquier tipo de usuario.
class Usuario
{
    // Atributos protegidos para que puedan ser usados por las clases hijas.
    protected $nombre;
    protected $correo;

    // Constructor de la clase.
    // Inicializa nombre y correo, y además valida que el correo tenga formato correcto.
    public function __construct($nombre, $correo)
    {
        $this->nombre = $nombre;

        // Valida que el correo tenga un formato válido.
        // Si no cumple, se lanza una excepción para evitar crear un objeto incorrecto.
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo inválido: " . $correo);
        }

        $this->correo = $correo;
    }

    // Devuelve el nombre del usuario.
    public function getNombre()
    {
        return $this->nombre;
    }

    // Devuelve el correo del usuario.
    public function getCorreo()
    {
        return $this->correo;
    }
}
?>