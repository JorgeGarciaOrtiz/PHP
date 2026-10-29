<?php

// Instrumento de viento que hereda todo lo común de InstrumentoBase
class InstrumentoViento extends InstrumentoBase
{
    // ------------------------------------------------
    // Propiedad
    // ------------------------------------------------

    // Material del instrumento (de madera por defecto)
    protected string $_material = "madera";

    // ------------------------------------------------
    // Constructor
    // ------------------------------------------------

    // Constructor que nos permite crear un intrumento de viento (de madera por defecto y con una edad de 15 años)
    public function __construct(string $material = "madera", int $edad = 15)
    {
        // La descripción siempre es la misma
        parent::__construct("instrumento de viento", $edad);
        $this->_material = $material;
    }

    // ------------------------------------------------
    // Métodos heredados de InstrumentoBase
    // ------------------------------------------------

    // Devuelve los pasos para afinar
    final public function afinar(): string
    {
        return "1. Calentar el instrumento.\n" .
        "2. Tocar la nota de referencia.\n" .
        "3. Ajustar el tubo.";
    }

    // Devuelve el sonido del instrumento
    public function sonido(): string
    {
        return "Fuuu fuuu";
    }

    // ------------------------------------------------
    // Método toString
    // ------------------------------------------------

    // Permite mostrar la información del instrumento más el tipo de metirial
    public function __toString(): string
    {
        return parent::__toString() . ". Instrumento de material " . $this->_material . ".";
    }
}
