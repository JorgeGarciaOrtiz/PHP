<?php

// Enumeración con los tipos de estados civiles
enum EstadoCivil: int
{
    case soltero = 10;
    case casado = 20;
    case pareja = 30;
    case viudo = 40;

    // Método que devuelve el nombre
    function descripcion(): string
    {
        return $this->name;
    }

    // Método que devuelve el valor del estado civil
    function valor(): int
    {
        return $this->value;
    }

    // Método que devuelve todos los estados civiles
    static function casos(): array
    {
        return self::cases();
    }
}
