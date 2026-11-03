<?php

// Persona --> persona con sus datos personales y su estado civil
class Persona
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    // Nombre de la persona
    private string $_nombre;

    // Fecha de nacimiento de la persona
    private string $_fechaNacimiento;

    // Domicilio de la persona
    private string $_domicilio;

    // Localidad de la persona
    private string $_localidad;

    // Estado civil de la persona (valor de la enumeración EstadoCivil)
    private EstadoCivil $_estadoCivil;

    // ------------------------------------------------
    // Constructor privado
    // ------------------------------------------------

    /**
     * Constructor privado que crea una persona con valores por defecto
     */
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

    /**
     * Constructor estático que crea una persona con los datos recibidos
     *
     * @param string $nombre Nombre de la persona
     * @param string $fechaNacimiento Fecha de nacimiento de la persona
     * @param string $domicilio Domicilio de la persona
     * @param string $localidad Localidad de la persona
     * @param EstadoCivil $estadoCivil Estado civil de la persona
     * @return static Objeto creado de la clase que llama al método
     */
    public static function registrarPersona(string $nombre, string $fechaNacimiento, string $domicilio, string $localidad, EstadoCivil $estadoCivil): static
    {
        // Creamos el objeto con los valores por defecto
        $persona = new static();

        // Sustituimos los valores por los recibidos
        $persona->_nombre = $nombre;
        $persona->_fechaNacimiento = $fechaNacimiento;
        $persona->_domicilio = $domicilio;
        $persona->_localidad = $localidad;
        $persona->_estadoCivil = $estadoCivil;

        // Devolvemos el objeto ya creado
        return $persona;
    }

    // ------------------------------------------------
    // Métodos get
    // ------------------------------------------------

    /**
     * Devuelve el nombre
     *
     * @return string Nombre de la persona
     */
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    /**
     * Devuelve la fecha de nacimiento
     *
     * @return string Fecha de nacimiento de la persona
     */
    public function getFechaNacimiento(): string
    {
        return $this->_fechaNacimiento;
    }

    /**
     * Devuelve el domicilio
     *
     * @return string Domicilio de la persona
     */
    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    /**
     * Devuelve la localidad
     *
     * @return string Localidad de la persona
     */
    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    /**
     * Devuelve el estado civil
     *
     * @return EstadoCivil Estado civil de la persona
     */
    public function getEstadoCivil(): EstadoCivil
    {
        return $this->_estadoCivil;
    }

    // ------------------------------------------------
    // Métodos set
    // ------------------------------------------------

    /**
     * Permite modificar el nombre
     *
     * @param string $nombre Nuevo nombre de la persona
     * @return void No devuelve nada
     */
    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    /**
     * Permite modificar la fecha de nacimiento
     *
     * @param string $fechaNacimiento Nueva fecha de nacimiento de la persona
     * @return void No devuelve nada
     */
    public function setFechaNacimiento(string $fechaNacimiento): void
    {
        $this->_fechaNacimiento = $fechaNacimiento;
    }

    /**
     * Permite modificar el domicilio
     *
     * @param string $domicilio Nuevo domicilio de la persona
     * @return void No devuelve nada
     */
    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }

    /**
     * Permite modificar la localidad
     *
     * @param string $localidad Nueva localidad de la persona
     * @return void No devuelve nada
     */
    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }

    /**
     * Permite modificar el estado civil
     *
     * @param EstadoCivil $estadoCivil Nuevo estado civil de la persona
     * @return void No devuelve nada
     */
    public function setEstadoCivil(EstadoCivil $estadoCivil): void
    {
        $this->_estadoCivil = $estadoCivil;
    }

    // ------------------------------------------------
    // Métodos toString
    // ------------------------------------------------

    /**
     * Permite mostrar la información de la persona
     *
     * @return string Información de la persona
     */
    public function __toString(): string
    {
        return $this->_nombre . " es una persona " . $this->_estadoCivil->descripcion() . " nacida en " . $this->_fechaNacimiento . " y que vive en " . $this->_localidad;
    }

    // ------------------------------------------------
    // Métodos mágicos
    // ------------------------------------------------

    /**
     * Impide crear o modificar propiedades que no existen
     *
     * @param string $nombre Nombre de la propiedad
     * @param mixed $valor Valor que se intenta asignar
     * @return void No devuelve nada
     * @throws Exception Si se intenta crear o modificar la propiedad
     */
    public function __set(string $nombre, mixed $valor)
    {
        throw new Exception("No existe la propiedad " . $nombre);
    }

    /**
     * Impide leer propiedades que no existen
     *
     * @param string $nombre Nombre de la propiedad
     * @return mixed No llega a devolver nada, siempre lanza una excepción
     * @throws Exception Si se intenta leer la propiedad
     */
    public function __get(string $nombre)
    {
        throw new Exception("No existe la propiedad " . $nombre);
    }

    /**
     * Indica que las propiedades que no existen no están definidas
     *
     * @param string $nombre Nombre de la propiedad
     * @return bool Siempre false
     */
    public function __isset(string $nombre): bool
    {
        return false;
    }

    /**
     * Impide borrar propiedades que no existen
     *
     * @param string $nombre Nombre de la propiedad
     * @return void No devuelve nada
     * @throws Exception Si se intenta borrar la propiedad
     */
    public function __unset(string $nombre)
    {
        throw new Exception("No existe la propiedad " . $nombre);
    }
}
