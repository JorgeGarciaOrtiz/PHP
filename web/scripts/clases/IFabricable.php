<?php

// Interfaz que indica cómo se fabrica y cómo se recicla un elemento
interface IFabricable
{
    /**
     * Devuelve los pasos para fabricar el elemento
     *
     * @return string Pasos para fabricar el elemento
     */
    public function metodoFabricacion(): string;

    /**
     * Devuelve el método de reciclado según su fabricación
     *
     * @return string Método de reciclado del elemento
     */
    public function metodoReciclado(): string;
}
