<?php

// ClaseMisPropiedades --> permite añadir propiedades dinámicas a sus instancias
class ClaseMisPropiedades implements Iterator
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    // Guarda las propiedades dinámicas
    private array $_propiedades = [];

    public mixed $propPublica;
    private mixed $_propPrivada = 25;

    // Propiedad para almacenar la posición en la que estamos a la hora de iterar
    private int $_posicion = 0;

    // ------------------------------------------------
    // Métodos mágicos
    // ------------------------------------------------

    // Añade o modifica una propiedad dinámica, si se añade _propPrivada lanza una excepción
    public function __set(string $nombre, mixed $valor)
    {
        if ($nombre == "_propPrivada") {
            throw new Exception("No se puede asignar la propiedad");
        }
        $this->_propiedades[$nombre] = $valor;
    }

    // Devuelve el valor de una propiedad dinámica, si no existe lanza una excepción
    public function __get(string $nombre): mixed
    {
        if (isset($this->_propiedades[$nombre])) {
            return $this->_propiedades[$nombre];
        } else {
            throw new Exception("No existe la propiedad");
        }
    }

    // Indica si una propiedad dinámica existe en el array
    public function __isset(string $nombre): bool
    {
        if (isset($this->_propiedades[$nombre])) {
            return true;
        }
        return false;
    }

    // Elimina una propiedad dinámica del array, si no existe lanza una excepción
    public function __unset(string $nombre): void
    {
        if (!isset($this->_propiedades[$nombre])) {
            throw new Exception("No se puede borrar la propiedad");
        }
        unset($this->_propiedades[$nombre]);
    }

    // ------------------------------------------------
    // Métodos que implementamos de Iterator
    // ------------------------------------------------

    // Vuelve al principio del array
    public function rewind(): void
    {
        $this->_posicion = 0;
    }

    // Indica si la posición actual es válida
    public function valid(): bool
    {
        return $this->_posicion < count($this->_propiedades) + 2;
    }

    // Devuelve la clave de la posición actual
    public function key(): mixed
    {
        $todasLasPropiedades = [];
        foreach ($this->_propiedades as $clave => $valor) {
            $todasLasPropiedades[] = $clave;
        }

        $todasLasPropiedades[] = "propPublica";
        $todasLasPropiedades[] = "_propPrivada";

        return "oi_" .  $todasLasPropiedades[$this->_posicion];
    }

    // Avanza a la siguiente posición
    public function next(): void
    {
        $this->_posicion++;
    }

    // Devuelve el valor del array de la posición actual
    public function current(): mixed
    {
        $todasLosValores = [];
        foreach ($this->_propiedades as $valor) {
            $todasLosValores[] = $valor;
        }

        $todasLosValores[] = $this->propPublica;
        $todasLosValores[] = $this->_propPrivada;

        return $todasLosValores[$this->_posicion];
    }
}
