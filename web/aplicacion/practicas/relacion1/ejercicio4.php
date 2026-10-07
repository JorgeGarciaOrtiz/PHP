<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creo el array
$array = [];

// Variable con el número de filas
const numeroFilas = 5;

// Añado los valores al array creado
for ($i = 0; $i < numeroFilas + 1; $i++) {

    // Creo un array con el numero de indices que yo quiero --> array_fill(indice inicial, tamaño, valores);
    $fila = array_fill(0, $i, $i);

    // Añado la fila a nuestro array principal
    $array[$i] = $fila;
}

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 4");
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

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo($array)
{
    // Recorro cada fila del array
    foreach ($array as $fila) {

        // Recorro cada valor de cada fila
        foreach ($fila as $valor) {

            // Muestro el valor
            echo $valor . " ";
        }
        echo "<br>";
    }
}
