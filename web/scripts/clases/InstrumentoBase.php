<?php

// Clase abstracta base de todos los instrumentos
abstract class InstrumentoBase
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    // Descripción
    private string $_descripcion;

    // Edad, empieza en 10
    protected int $_edad = 10;

    // Total de elementos creados (compartido por todos)
    protected static int $_numeroElementosCreados = 0;

    // Número de orden de este elemento
    protected int $_ordenCreacion;

    // ------------------------------------------------
    // Constructor
    // ------------------------------------------------

    /**
     * Crea el instrumento con su descripción y edad (por defecto 10)
     *
     * @param string $descripcion Descripción del instrumento
     * @param integer $edad Edad del instrumento (por defecto 10)
     */
    public function __construct(string $descripcion, int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        // Aumentamos el contador de elementos creados
        self::$_numeroElementosCreados++;

        // Ese valor del contador lo asignamos a la variable que nos 
        // indique en qué orden fue creado, este valor se quedará así para siempre
        $this->_ordenCreacion = self::$_numeroElementosCreados;
    }

    // ------------------------------------------------
    // Métodos abstractos
    // ------------------------------------------------

    /**
     * Devuelve el sonido del instrumento
     *
     * @return string Sonido del instrumento
     */
    abstract public function sonido(): string;

    /**
     * Devuelve los pasos para afinar el instrumento
     *
     * @return string Pasos para afinar el instrumento
     */
    abstract public function afinar(): string;

    // ------------------------------------------------
    // Función envejecer
    // ------------------------------------------------

    /**
     * Aumenta en un año la edad del instrumento
     *
     * @return void No devuelve nada
     */
    public function envejecer(): void
    {
        $this->_edad++;
    }

    // ------------------------------------------------
    // Métodos get
    // ------------------------------------------------

    /**
     * Devuelve la descripción
     *
     * @return string Descripción del instrumento
     */
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    /**
     * Devuelve la edad
     *
     * @return int Edad del instrumento
     */
    public function getEdad(): int
    {
        return $this->_edad;
    }

    // ------------------------------------------------
    // Método set
    // ------------------------------------------------

    /**
     * Permite modificar la descripción
     *
     * @param string $descripcion Nueva descripción del instrumento
     * @return void No devuelve nada
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->_descripcion = $descripcion;
    }

    // ------------------------------------------------
    // Método toString
    // ------------------------------------------------

    /**
     * Permite mostrar la información del instrumento
     *
     * @return string Información completa del instrumento
     */
    public function __toString(): string
    {
        return "instrumento con descripción " . $this->_descripcion .
            ", instancia " . $this->_ordenCreacion .
            " de un total de " .   self::$_numeroElementosCreados .
            ". Tiene " . $this->_edad . " años. La clase es " . get_class($this);
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
