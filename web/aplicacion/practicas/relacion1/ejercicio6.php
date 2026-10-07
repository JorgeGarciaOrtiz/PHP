<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creamos un array y le metemos valores
$vector = array(
    "primera" => 12.56,
    24 => true,
    67 => 23.76
);

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 6");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 6");
cuerpo($vector);

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 6.- Con el array $vector=array("primera" => 12.56, 24 => true, 67 => 23.76);
 * 
 *     - Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de
 *     recorrido para mostrar tanto los índices como los valores del array anterior.
 * 
 *     - Simular el funcionamiento de foreach usando las funciones array_keys y array_values para
 *     mostrar tanto los índices como los valores del array anterior.
 * 
 *     El array se definirá en el controlador y se realizarán las operaciones en la vista.
 */

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo($vector)
{
    // Funciones de recorrido

    echo "Funciones de recorrido: <br>";

    while (key($vector) != NULL) {

        $contenido = current($vector);

        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posición " . key($vector) . ": " .  ($contenido === true ? "true" : (($contenido === false) ? "false" : $contenido)) . "<br>";
        next($vector);
    }

    // Funciones con array_keys y array_values

    echo "<br>Funciones con array_keys y array_values: <br>";

    $indices = array_keys($vector);
    $valores = array_values($vector);

    for ($i = 0; $i < count($indices); $i++) {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posición " . $indices[$i] . ": " . ($valores[$i] === true ? "true" : (($valores[$i] === false) ? "false" : $valores[$i])) . "<br>";
    }
}
