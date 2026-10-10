<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 6";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 1" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creamos un array y le metemos unos valores
$vector = array(
    "primera" => 12.56,
    24 => true,
    67 => 23.76
);

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
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

function cabecera() {}

function cuerpo($vector)
{
    // Añadimos un titulo
    echo "Funciones de recorrido: <br>";

    // Mientras la posición actual del puntero exista, sigo recorriendo
    while (key($vector) != NULL) {

        // Guardo el valor de la posición actual
        $contenido = current($vector);

        // Muestro la posición y su valor; si es booleano lo escribo como "true" o "false"
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posición " . key($vector) . ": " .  ($contenido === true ? "true" : (($contenido === false) ? "false" : $contenido)) . "<br>";

        // Muevo el puntero a la siguiente posición
        next($vector);
    }

    // Añadimos un titulo
    echo "<br>Funciones con array_keys y array_values: <br>";

    // Obtengo un array con todas las posiciones y otro con todos los valores
    $indices = array_keys($vector);
    $valores = array_values($vector);

    // Recorro los dos arrays a la vez
    for ($i = 0; $i < count($indices); $i++) {

        // Muestro la posición y su valor; si es booleano lo escribo como "true" o "false"
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posición " . $indices[$i] . ": " . ($valores[$i] === true ? "true" : (($valores[$i] === false) ? "false" : $valores[$i])) . "<br>";
    }
}
