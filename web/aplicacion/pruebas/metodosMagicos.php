<?php
class ClaseNormal
{
    // Se ejecuta al ESCRIBIR en una propiedad que no existe o no es accesible
    // Ej: $inst->color = "rojo";  → lanza excepción
    public function __set(string $nombre, mixed $valor){
        throw new Exception('No existe la propiedad '.$nombre);
    }

    // Se ejecuta al LEER una propiedad que no existe o no es accesible
    // Ej: echo $inst->color;  → lanza excepción
    public function __get(string $nombre){
        throw new Exception('No existe la propiedad '.$nombre);
    }

    // Se ejecuta al usar isset() o empty() sobre una propiedad que no existe o no es accesible
    // Ej: isset($inst->color);  → devuelve false ("no existe")
    public function __isset(string $nombre):bool{
        return false;
    }

    // Se ejecuta al usar unset() sobre una propiedad que no existe o no es accesible
    // Ej: unset($inst->color);  → lanza excepción
    public function __unset(string $nombre){
        throw new Exception('No existe la propiedad '.$nombre);
    }
}