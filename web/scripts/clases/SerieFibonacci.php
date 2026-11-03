<?php

// SerieFibonacci --> serie de Fibonacci que se puede recorrer con foreach
class SerieFibonacci implements Iterator
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    // Indica hasta qué valor se generará la serie
    private int $_limite;
    // Indica cuál es el elemento actual
    private int $_claveActual;

    // ------------------------------------------------
    // Constructor
    // ------------------------------------------------

    /**
     * Crea la serie indicando hasta qué posición se generará
     *
     * @param int $limite Última posición que se generará
     */
    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    // ------------------------------------------------
    // Método estático
    // ------------------------------------------------

    /**
     * Devuelve la serie de Fibonacci hasta el último valor que indiquemos
     *
     * @param int $ultimo Última posición de la serie que se generará
     * @return Generator Valores de la serie de Fibonacci
     */
    public static function fFibonacci(int $ultimo): Generator
    {
        $primero = 0;
        $segundo = 1;

        for ($i = 0; $i <= $ultimo; $i++) {
            yield $primero;
            $aux = $primero + $segundo;
            $primero = $segundo;
            $segundo = $aux;
        }
    }

    // ------------------------------------------------
    // Métodos que implementamos de Iterator
    // ------------------------------------------------

    /**
     * Vuelve al principio de la serie
     *
     * @return void No devuelve nada
     */
    public function rewind(): void
    {
        $this->_claveActual = 0;
    }

    /**
     * Indica si la posición actual es válida
     *
     * @return bool True si la posición es válida, false si no lo es
     */
    public function valid(): bool
    {
        return $this->_claveActual <= $this->_limite;
    }

    /**
     * Devuelve la clave de la posición actual
     *
     * @return mixed Clave de la posición actual
     */
    public function key(): mixed // mixed --> cualquier tipo
    {
        return $this->_claveActual;
    }

    /**
     * Avanza a la siguiente posición
     *
     * @return void No devuelve nada
     */
    public function next(): void
    {
        $this->_claveActual++;
    }

    /**
     * Devuelve el valor de Fibonacci de la posición actual
     *
     * @return mixed Valor de Fibonacci de la posición actual
     */
    public function current(): mixed
    {
        $primero = 0;
        $segundo = 1;

        $numero = $primero;

        for ($i = 0; $i < $this->_claveActual; $i++) {
            $aux = $primero + $segundo;
            $primero = $segundo;
            $segundo = $aux;

            $numero = $primero;
        }

        return $numero;
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
