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

    // Crea la serie indicando hasta qué posición se generará
    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    // ------------------------------------------------
    // Método estático
    // ------------------------------------------------

    // Devuelve la serie de Fibonacci hasta el ultimo valor que indiquemos
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

    // Vuelve al principio de la serie
    public function rewind(): void
    {
        $this->_claveActual = 0;
    }

    // Indica si la posición actual es válida
    public function valid(): bool
    {
        return $this->_claveActual <= $this->_limite;
    }

    // Devuelve la clave de la posición actual
    public function key(): mixed // mixed --> cualquier tipo
    {
        return $this->_claveActual;
    }

    // Avanza a la siguiente posición
    public function next(): void
    {
        $this->_claveActual++;
    }

    // Devuelve el valor de Fibonacci de la posición actual
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
