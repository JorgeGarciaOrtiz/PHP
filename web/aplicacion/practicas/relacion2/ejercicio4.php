<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 4";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 2" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Declaro mis dos valores float
$float1 = 17.5;
$float2 = 379987.24;

// Formateo el primer float y lo relleno con 15 ceros a la izquierda
$valor1 = str_pad(number_format($float1, 1, ',', '.'), 15, '0', STR_PAD_LEFT);

// Formateo el segundo float
$valor2 = number_format($float2, 2, ',', '.');

// Uno los textos con los valores ya formateados
$cadenaFinal = "el primer valor -" . $valor1 . "-, el segundo valor -" . $valor2 . "-";

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($cadenaFinal);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 4.- Tengo unas variables con valores 17.5 (float), 379987.24 (float)
 * Mostrarlas de forma que resulte "el primer valor -0000000000017,5-, el segundo valor -
 * 379.987,24-" (usar number format para obtener el formateo de los números, los números se
 * muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe
 * aparecer el espacio))
 */

function cabecera() {}

function cuerpo(string $cadenaFinal)
{
    echo $cadenaFinal;
}
