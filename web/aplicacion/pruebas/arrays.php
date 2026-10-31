<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Variable con el titulo
$titulo = "Arrays";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    $titulo => ""
];

/*
 * ==========================================================
 *  ARRAYS EN PHP (Tema 2, apartado 6.8)
 * ==========================================================
 *
 *  TIPOS
 *      Escalar          → ["a", "b", "c"]                 (claves 0, 1, 2...)
 *      Asociativo       → ["nombre" => "Ana", "edad" => 20]
 *      Multidimensional → ["notas" => [5, 7, 9]]
 *
 *  CREAR
 *      $a = array(1, 2, 3);
 *      $b = [1, 2, 3];
 *
 *  AÑADIR / MODIFICAR / QUITAR
 *      $a[] = 4;            → añade al final
 *      $c["z"] = 30;        → añade o modifica una clave
 *      unset($c["x"]);      → quita una clave
 *
 *  RECORRER
 *      foreach ($a as $valor) {...}
 *      foreach ($a as $clave => $valor) {...}
 *
 *  BÁSICAS
 *      count($a)            → número de elementos
 *      print_r($a)          → muestra claves y valores
 *      is_array($a)         → ¿es un array?
 *
 *  ORDENAR
 *      sort($a)             → ordena valores (pierde las claves)
 *      natsort($a)          → orden "humano", mantiene claves
 *      array_multisort(...) → ordena varios arrays a la vez
 *
 *  BUSCAR
 *      in_array(v, $a)          → ¿está el valor? (true/false)
 *      array_search(v, $a)      → clave del valor o false
 *      array_key_exists(k, $a)  → ¿existe la clave?
 *      isset($a[k])             → ¿existe la clave? (y no es null)
 *      array_filter($a, f)      → los que cumplen una condición
 *
 *  ALEATORIO
 *      shuffle($a)          → desordena el array
 *      array_rand($a)       → una clave al azar
 *
 *  MANIPULAR
 *      array_keys($a)           → array con las claves
 *      array_values($a)         → array con los valores
 *      array_flip($a)           → intercambia claves y valores
 *      array_combine($k, $v)    → une claves y valores
 *      array_fill(ini, n, v)    → n elementos con el mismo valor
 *      array_unique($a)         → quita repetidos
 *      array_pad($a, n, v)      → rellena hasta tamaño n
 *      array_slice($a, ini, f)  → devuelve un trozo (no cambia el original)
 *      array_splice($a, ini, n) → quita elementos (cambia el original)
 *      array_merge($a, $b)      → une dos arrays
 *      array_pop($a)            → quita el último
 *      array_shift($a)          → quita el primero
 * ==========================================================
 */

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo();

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo()
{
    // Creo un array y le meto valores
    $miArray[3] = 23;
    $miArray[7] = 123;
    $miArray[] = 54; // posición 8

    // Ahora el array es: posición 3 = 23, posición 7 = 123, posición 8 = 54
    // Las posiciones 0, 1, 2, 4, 5 y 6 NO existen (son "huecos")

    // Aquí iré sumando los números
    $totalNumeros = 0;

    // Cuenta cuántos elementos hay
    $final = count($miArray);

    // Repite mientras $i sea menor que $final
    for ($i = 0; $i < $final; $i++) {

        // isset pregunta: "¿existe algo en la posición $i?"
        if (isset($miArray[$i])) {
            // sí existe: lo sumo al total
            $totalNumeros += $miArray[$i];
        } else {
            // no existe: alargo el bucle una vuelta más
            $final++;
        }
    }

    // Al terminar el for, $total vale 1311 (23 + 123 + 54)

    // Muestro el resultado por pantalla
    echo "La suma de " . $miArray[3] . ", " . $miArray[7] . " y " . $miArray[8] . " es: " . $totalNumeros;
}
