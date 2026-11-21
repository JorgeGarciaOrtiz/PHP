<?php

/**
 * Clase que representa un punto con sus coordenadas, su color y su grosor
 */
class Punto
{
    // -------------------------------------------------------------
    // Propiedades
    // -------------------------------------------------------------

    // Constante con todos los colores posibles
    public const COLORES = [
        "red" => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "green" => ["nombre" => "verde", "rgb" => [0, 255, 0]],
        "blue" => ["nombre" => "azul", "rgb" => [0, 0, 255]],
        "yellow" => ["nombre" => "amarillo", "rgb" => [255, 255, 0]],
    ];

    // Constante con todos los grosores disponibles
    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso",
    ];

    // Coordenada x (0 - 20.000)
    private int $_x;
    // Coordenada y (0 - 20.000)
    private int $_y;
    // Color del punto
    private string $_color;
    // Grosor del punto
    private int $_grosor;

    // -------------------------------------------------------------
    // Métodos get
    // -------------------------------------------------------------

    /**
     * Devuelve la coordenada x
     *
     * @return int Coordenada x del punto
     */
    public function getX(): int
    {
        return $this->_x;
    }

    /**
     * Devuelve la coordenada y
     *
     * @return int Coordenada y del punto
     */
    public function getY(): int
    {
        return $this->_y;
    }

    /**
     * Devuelve el color
     *
     * @return string Color del punto
     */
    public function getColor(): string
    {
        return $this->_color;
    }

    /**
     * Devuelve el grosor
     *
     * @return int Grosor del punto
     */
    public function getGrosor(): int
    {
        return $this->_grosor;
    }

    // -------------------------------------------------------------
    // Métodos set
    // -------------------------------------------------------------

    /**
     * Guarda el valor de x si está comprendido entre 0 y 20000
     *
     * @param int $x Número de la coordenada x
     * @return boolean Si está comprendido entre 0 y 20000 dará true, si no dará false
     */
    public function setX(int $x): bool
    {
        if (validaEntero($x, 0, 20000, 0)) {
            $this->_x = $x;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Guarda el valor de y si está comprendido entre 0 y 20000
     *
     * @param int $y Número de la coordenada y
     * @return boolean Si está comprendido entre 0 y 20000 dará true, si no dará false
     */
    public function setY(int $y): bool
    {
        if (validaEntero($y, 0, 20000, 0)) {
            $this->_y = $y;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Guarda el color del punto
     *
     * @param string $color Color del punto
     * @return boolean Si el color existe en la constante COLORES dará true, si no dará false
     */
    public function setColor(string $color): bool
    {
        if (validaRango($color, self::COLORES, 2)) {
            $this->_color = $color;
            return true;
        }
        return false;
    }

    /**
     * Guarda el grosor del punto
     *
     * @param int $grosor Grosor del punto
     * @return boolean Si el grosor existe en la constante GROSORES dará true, si no dará false
     */
    public function setGrosor(int $grosor): bool
    {
        if (validaRango($grosor, self::GROSORES, 2)) {
            $this->_grosor = $grosor;
            return true;
        }
        return false;
    }

    // -------------------------------------------------------------
    // Constructor
    // -------------------------------------------------------------

    /**
     * Constructor que recibe las propiedades del punto
     *
     * @param integer $x Coordenada x del punto
     * @param integer $y Coordenada y del punto
     * @param string $color Color del punto
     * @param int $grosor Grosor del punto
     */
    public function __construct(
        int $x,
        int $y,
        string $color,
        int $grosor
    ) {
        // Si la coordenada x no es válida, se lanza una excepción
        if (!$this->setX($x)) {
            throw new Exception("La coordenada x no es válida");
        }

        // Si la coordenada y no es válida, se lanza una excepción
        if (!$this->setY($y)) {
            throw new Exception("La coordenada y no es válida");
        }

        // Si el color no es válido, se lanza una excepción
        if (!$this->setColor($color)) {
            throw new Exception("El color no es válido");
        }

        // Si el grosor no es válido, se lanza una excepción
        if (!$this->setGrosor($grosor)) {
            throw new Exception("El grosor no es válido");
        }
    }

    // -------------------------------------------------------------
    // Métodos mágicos 
    // -------------------------------------------------------------

    /**
     * Impide crear propiedades nuevas que no existen en la clase
     * 
     * @param string $nombre Nombre de la propiedad
     * @param mixed $valor Valor que se intenta asignar
     * @return void
     */
    public function __set(string $nombre, mixed $valor): void
    {
        throw new Exception("No existe la propiedad: " . $nombre);
    }

    /**
     * Impide leer propiedades que no existen o no son accesibles
     * 
     * @param string $nombre Nombre de la propiedad
     * @return mixed
     */
    public function __get(string $nombre): mixed
    {
        throw new Exception("No existe la propiedad: " . $nombre);
    }

    /**
     * Indica que no existe ninguna propiedad dinámica
     * 
     * @param string $nombre Nombre de la propiedad
     * @return boolean Siempre false
     */
    public function __isset(string $nombre): bool
    {
        return false;
    }

    /**
     * Impide borrar propiedades que no existen o no son accesibles
     * 
     * @param string $nombre Nombre de la propiedad
     * @return void
     */
    public function __unset(string $nombre): void
    {
        throw new Exception("No existe la propiedad: " . $nombre);
    }
}
