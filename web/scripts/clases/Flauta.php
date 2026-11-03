<?php

// Flauta --> instrumento de viento fabricable del que no se puede heredar
final class Flauta extends InstrumentoViento implements IFabricable
{
    // ------------------------------------------------
    // Métodos de la interfaz IFabricable
    // ------------------------------------------------

    /**
     * Devuelve el método de reciclaje del instrumento
     *
     * @return string Método de reciclaje del instrumento
     */
    public function metodoReciclado(): string
    {
        return "Separar las piezas y llevarlas al punto limpio.";
    }

    /**
     * Devuelve el método de fabricación del instrumento
     *
     * @return string Pasos para fabricar el instrumento
     */
    public function metodoFabricacion(): string
    {
        return "1. Cortar el tubo.\n" .
            "2. Hacer los agujeros.\n" .
            "3. Pulir la boquilla.\n" .
            "4. Montar las piezas.\n" .
            "5. Comprobar el sonido.";
    }

    // ------------------------------------------------
    // Constructor
    // ------------------------------------------------

    /**
     * Constructor privado que nos permite crear una flauta
     *
     * @param string $material Material de la flauta
     * @param int $edad Edad de la flauta
     */
    private function __construct(string $material, int $edad)
    {
        parent::__construct($material, $edad);
    }

    // ------------------------------------------------
    // Métodos
    // ------------------------------------------------

    /**
     * Método que nos permite crear una flauta a través de un array
     *
     * @param array $datos Material y edad de la flauta
     * @return static Flauta creada
     */
    public static function CrearDesdeArray(array $datos = ["material" => "madera", "edad" => 15]): static
    {
        $flauta = new Flauta($datos["material"] ?? "madera", $datos["edad"] ?? 15);
        return $flauta;
    }

    /**
     * Método clone, copia los valores de otro objeto sin pasar por el constructor
     *
     * @return void No devuelve nada
     */
    public function __clone()
    {
        // La edad será de 0
        $this->_edad = 0;
        // Como es otro instrumento más subimos el contador de elementos
        self::$_numeroElementosCreados++;
        // Y establecemos el orden de creación
        $this->_ordenCreacion = self::$_numeroElementosCreados;
    }
}
