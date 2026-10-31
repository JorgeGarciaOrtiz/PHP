<?php

// Persona --> persona con sus datos personales y su estado civil
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
        $this->_domicilio = "carrera 12";
        $this->_localidad = "antequera";
        $this->_estadoCivil = EstadoCivil::soltero;
    }

    // ------------------------------------------------
    // Constructor estático
    // ------------------------------------------------

    // Constructor estático que crea una persona con los datos recibidos
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

    // Devuelve el nombre
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    // Devuelve la fecha de nacimiento
    public function getFechaNacimiento(): string
    {
        return $this->_fechaNacimiento;
    }

    // Devuelve el domicilio
    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    // Devuelve la localidad
    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    // Devuelve el estado civil
    public function getEstadoCivil(): EstadoCivil
    {
        return $this->_estadoCivil;
    }

    // ------------------------------------------------
    // Métodos set
    // ------------------------------------------------

    // Permite modificar el nombre
    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    // Permite modificar la fecha de nacimiento
    public function setFechaNacimiento(string $fechaNacimiento): void
    {
        $this->_fechaNacimiento = $fechaNacimiento;
    }

    // Permite modificar el domicilio
    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }

    // Permite modificar la localidad
    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }

    // Permite modificar el estado civil
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

    // ------------------------------------------------
    // Métodos mágicos
    // ------------------------------------------------

    // Impide crear o modificar propiedades que no existen
    public function __set(string $nombre, mixed $valor)
    {
        throw new Exception("No existe la propiedad " . $nombre);
    }

    // Impide leer propiedades que no existen
    public function __get(string $nombre)
    {
        throw new Exception("No existe la propiedad " . $nombre);
    }

    // Indica que las propiedades que no existen no están definidas
    public function __isset(string $nombre): bool
    {
        return false;
    }

    // Impide borrar propiedades que no existen
    public function __unset(string $nombre)
    {
        throw new Exception("No existe la propiedad " . $nombre);
    }
}
