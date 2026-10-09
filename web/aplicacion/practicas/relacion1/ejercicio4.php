<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relacion 1" => "./index.php",
    "Ejercicio 4" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creo el array principal
$array = [];

// Creo una constante con el número de filas
const numeroFilas = 5;

// Añado las filas al array principal
for ($i = 1; $i < numeroFilas + 1; $i++) {

    /*
        Creo un array con el número de indices que yo quiero --> array_fill(indice inicial, tamaño, valores);
        Ejemplo: si $i = 3 → array_fill crea [3, 3, 3]
    */
    $fila = array_fill(0, $i, $i);

    // Añado la fila a nuestro array principal
    $array[$i] = $fila;
}

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Ejercicio 4", $ubicacion);
cuerpo($array);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
 * debe generar usando bucles for.
 *      1
 *      2 2
 *      3 3 3
 *      4 4 4 4
 *      5 5 5 5 5
 * Declarar la constante FILAS que se rellenará con el número de filas que se deben crear. Repetir
 * lo anterior usando FILAS para crear el array y visualizarlo.
 * Los datos se definirán en el controlador y se visualizarán en la vista.
 */

function cabecera() {}

function cuerpo($array)
{
    // Recorro cada fila del array
    foreach ($array as $fila) {

        // Recorro cada valor de cada fila
        foreach ($fila as $valor) {

            // Muestro el valor seguido de un espacio
            echo $valor . " ";
        }
        // Salto de línea para que cada fila se muestre en su propia línea
        echo "<br>";
    }
}
