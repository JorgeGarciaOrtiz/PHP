<?php

class Persona
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    private string $_nombre;
    private string $_fechaNacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estadoCivil;

    // ------------------------------------------------
    // Constructor privado
    // ------------------------------------------------

    // Constructor privado que crea una persona con valores por defecto
    private function __construct()
    {
        $this->_nombre = "prueba";
        $this->_fechaNacimiento = "01/01/2000";
        $this->_domicilio = "carrera12";
        $this->_localidad = "antequera";
        $this->_estadoCivil = EstadoCivil::soltero;
    }

    // ------------------------------------------------
    // Constructor estático
    // ------------------------------------------------

    public static function registrarPersona(string $nombre, string $fechaNacimiento, string $domicilio, string $localidad, EstadoCivil $estadoCivil): Persona
    {
        // Creamos la persona con los valores por defecto
        $persona = new Persona();

        // Sustituimos los valores por los recibidos
        $persona->_nombre = $nombre;
        $persona->_fechaNacimiento = $fechaNacimiento;
        $persona->_domicilio = $domicilio;
        $persona->_localidad = $localidad;
        $persona->_estadoCivil = $estadoCivil;

        // Devolvemos la persona ya creada
        return $persona;
    }

    // ------------------------------------------------
    // Métodos get
    // ------------------------------------------------

    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function getFechaNacimiento(): string
    {
        return $this->_fechaNacimiento;
    }

    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    public function getEstadoCivil(): EstadoCivil
    {
        return $this->_estadoCivil;
    }

    // ------------------------------------------------
    // Métodos set
    // ------------------------------------------------

    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    public function setFechaNacimiento(string $fechaNacimiento): void
    {
        $this->_fechaNacimiento = $fechaNacimiento;
    }

    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }

    public function setEstadoCivil(EstadoCivil $estadoCivil): void
    {
        $this->_estadoCivil = $estadoCivil;
    }

    // ------------------------------------------------
    // Métodos toString
    // ------------------------------------------------

    // Permite mostrar la información de la persona
    public function __toString(): string
    {
        return $this->_nombre . " es una persona " . $this->_estadoCivil->descripcion() . " nacida en " . $this->_fechaNacimiento . " y que vive en " . $this->_localidad;
    }
}
