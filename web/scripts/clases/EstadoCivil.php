<?php

// Enumeración con los tipos de estados civiles
enum EstadoCivil: int
{
    case soltero = 10;
    case casado = 20;
    case pareja = 30;
    case viudo = 40;

    /**
     * Método que devuelve el nombre
     *
     * @return string Nombre del estado civil
     */
    function descripcion(): string
    {
        return $this->name;
    }

    /**
     * Método que devuelve el valor del estado civil
     *
     * @return int Valor del estado civil
     */
    function valor(): int
    {
        return $this->value;
    }

    /**
     * Método que devuelve todos los estados civiles
     *
     * @return array Lista con todos los estados civiles
     */
    static function casos(): array
    {
        return self::cases();
    }
}
