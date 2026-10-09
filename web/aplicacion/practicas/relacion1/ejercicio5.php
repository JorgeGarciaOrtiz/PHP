<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Relacion 1" => "./index.php",
    "Ejercicio 5" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creo un array vacío
$vector = array();

// Lo relleno con los valores que nos piden
$vector[1] = "esto es una cadena";
$vector["posi1"] = 25.67;
$vector[] = false;
$vector["ultima"] = array(2, 5, 96);
$vector[56] = 23;

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Ejercicio 5", $ubicacion);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Ejercicio 5");
cuerpo($vector);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 5.- Rellenar un array con el siguiente contenido:
 *          $vector=array();
 *          $vector[1]="esto es una cadena";
 *          $vector["posi1"]=25.67;
 *          $vector[]=false;
 *          $vector["ultima"]=array(2,5,96);
 *          $vector[56]=23;
 * 
 * Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
 *    - posicion XXX contenido (tipo) YYYYY
 *    - Según el tipo del contenido
 *          o Si es un array mostrarlo mediante un foreach.
 *          o Si es un entero poner Entero con valor DDD, en binario BBB
 *          o Si es un real DDD que al cuadrado es DDD
 *          o Si es una cadena -CCCC-
 *          o Si es un booleano BBB y su opuesto XXX
 * 
 * Las palabras en mayúscula representan un valor concreto de lo pedido
 * 
 * El array se definirá en el controlador y se visualizará en la vista.
 */

function cabecera() {}

function cuerpo($vector)
{
    // Recorro los valores del array con su posición y su contenido
    foreach ($vector as $posicion => $contenido) {

        // Si el valor es un array, lo muestro por pantalla con su format
        if (is_array($contenido)) {

            // Muestro la posición y el tipo del contenido
            echo "posición " . $posicion . ", contenido (array): ";

            // Recorro todos los valores del array interno
            foreach ($contenido as $contenido2) {

                // Muestro cada valor seguido de un espacio
                echo $contenido2 . " ";
            }
            // Dejo un espacio antes del siguiente elemento
            echo "<br><br>";

            // Si el valor es un número entero, lo muestro por pantalla con su formato
        } else if (is_integer($contenido)) {
            echo "posición " . $posicion . ", contenido (" . gettype($contenido) . "): entero con valor " . $contenido . ", en binario " . decbin($contenido) . "<br><br>";

            // Si el valor es un número decimal, lo muestro por pantalla con su formato
        } else if (is_float($contenido)) {
            echo "posición " . $posicion . ", contenido (" . gettype($contenido) . "): real " . $contenido . " que al cuadrado es " . pow($contenido, 2) . "<br><br>";

            // Si el valor es una cadena, la muestro por pantalla con su formato
        } else if (is_string($contenido)) {
            echo "posición " . $posicion . ", contenido (" . gettype($contenido) . "): -" . $contenido . "-<br><br>";

            // Si el valor es un booleano, muestro true o false por pantalla en el formato pedido
        } else if (is_bool($contenido)) {
            echo "posición " . $posicion . ", contenido (" . gettype($contenido) . "): " . ($contenido === true ? "true" : "false") . " y su opuesto " . ($contenido === true ? "false" : "true") . "<br><br>";
        }
    }
}
