<?php

// Clase abstracta base de todos los instrumentos
abstract class InstrumentoBase
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    private string $_descripcion;
    protected int $_edad = 10;
    protected static int $_numeroElementosCreados = 0;
    protected int $_ordenCreacion;

    // ------------------------------------------------
    // Constructor
    // ------------------------------------------------

    // Crea el instrumento con su descripción y edad (por defecto 10)
    public function __construct(string $descripcion, int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        // Aumentamos el contador de elementos creados
        self::$_numeroElementosCreados++;

        // Ese valor del contador lo asignamos a la variable que nos 
        // indique en qué orden fue creado, este valor se quedara así para siempre
        $this->_ordenCreacion = self::$_numeroElementosCreados;
    }

    // ------------------------------------------------
    // Métodos abstractos
    // ------------------------------------------------

    // Devuelve el sonido del instrumento
    abstract public function sonido(): string;

    // Devuelve los pasos para afinar el instrumento
    abstract public function afinar(): string;

    // ------------------------------------------------
    // Función envejecer
    // ------------------------------------------------

    // Aumenta en un año la edad del instrumento
    public function envejecer(): void
    {
        $this->_edad++;
    }

    // ------------------------------------------------
    // Métodos get
    // ------------------------------------------------

    // Devuelve la descripción
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    // Devuelve la edad
    public function getEdad(): int
    {
        return $this->_edad;
    }

    // ------------------------------------------------
    // Método set
    // ------------------------------------------------

    // Permite modificar la descripción
    public function setDescripcion(string $descripcion): void
    {
        $this->_descripcion = $descripcion;
    }

    // ------------------------------------------------
    // Método toString
    // ------------------------------------------------

    // Permite mostrar la información del instrumento
    public function __toString(): string
    {
        return "Instrumento con descripción \"" . $this->_descripcion  . "\"" .
            ", instancia " . $this->_ordenCreacion .
            " de un total de " .   self::$_numeroElementosCreados .
            ". Tiene " . $this->_edad . " años. La clase es " . get_class($this);
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
