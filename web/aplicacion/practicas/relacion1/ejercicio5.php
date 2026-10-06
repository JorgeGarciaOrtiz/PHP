<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 1");
cuerpo();

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

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo()
{

?>
<?php
}
