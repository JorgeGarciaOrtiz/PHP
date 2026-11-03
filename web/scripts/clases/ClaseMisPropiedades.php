<?php

// ClaseMisPropiedades --> permite añadir propiedades dinámicas a sus instancias
class ClaseMisPropiedades implements Iterator
{
    // ------------------------------------------------
    // Propiedades
    // ------------------------------------------------

    // Guarda las propiedades dinámicas
    private array $_propiedades = [];

    // Propiedad pública, accesible desde fuera de la clase
    public mixed $propPublica;

    // Propiedad privada, solo accesible desde dentro de la clase (empieza en 25)
    private mixed $_propPrivada = 25;

    // Propiedad para almacenar la posición en la que estamos a la hora de iterar
    private int $_posicion = 0;

    // ------------------------------------------------
    // Métodos mágicos
    // ------------------------------------------------

    /**
     * Añade o modifica una propiedad dinámica, si se añade _propPrivada lanza una excepción
     *
     * @param string $nombre Nombre de la propiedad
     * @param mixed $valor Valor que se asigna a la propiedad
     * @return void No devuelve nada
     * @throws Exception Si se intenta asignar _propPrivada
     */
    public function __set(string $nombre, mixed $valor)
    {
        if ($nombre == "_propPrivada") {
            throw new Exception("No se puede asignar la propiedad");
        }
        $this->_propiedades[$nombre] = $valor;
    }

    /**
     * Devuelve el valor de una propiedad dinámica, si no existe lanza una excepción
     *
     * @param string $nombre Nombre de la propiedad
     * @return mixed Valor de la propiedad
     * @throws Exception Si la propiedad no existe
     */
    public function __get(string $nombre): mixed
    {
        if (isset($this->_propiedades[$nombre])) {
            return $this->_propiedades[$nombre];
        } else {
            throw new Exception("No existe la propiedad");
        }
    }

    /**
     * Indica si una propiedad dinámica existe en el array
     *
     * @param string $nombre Nombre de la propiedad
     * @return bool True si la propiedad existe, false si no existe
     */
    public function __isset(string $nombre): bool
    {
        if (isset($this->_propiedades[$nombre])) {
            return true;
        }
        return false;
    }

    /**
     * Elimina una propiedad dinámica del array, si no existe lanza una excepción
     *
     * @param string $nombre Nombre de la propiedad
     * @return void No devuelve nada
     * @throws Exception Si la propiedad no existe
     */
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

    /**
     * Vuelve al principio del array
     *
     * @return void No devuelve nada
     */
    public function rewind(): void
    {
        $this->_posicion = 0;
    }

    /**
     * Indica si la posición actual es válida
     *
     * @return bool True si la posición es válida, false si no lo es
     */
    public function valid(): bool
    {
        return $this->_posicion < count($this->_propiedades) + 2;
    }

    /**
     * Devuelve la clave de la posición actual
     *
     * @return mixed Nombre de la propiedad con el prefijo "oi_"
     */
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

    /**
     * Avanza a la siguiente posición
     *
     * @return void No devuelve nada
     */
    public function next(): void
    {
        $this->_posicion++;
    }

    /**
     * Devuelve el valor del array de la posición actual
     *
     * @return mixed Valor de la propiedad de la posición actual
     */
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
