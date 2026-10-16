<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 1";

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

// Creo una variable para poder añadirla a las cadenas
$cadena = "cadena";

// Creo una cadena con ""
$c1 = "Esto es una $cadena <b>normal</b> con \"comillas dobles\", caracteres: ‘, “, á, é, ñ<br>";

// Creo una cadena con ''
$c2 = 'Esto es una $cadena <b>normal</b> con \'comillas simples\', caracteres: ‘, “, á, é, ñ<br>';

// Creo una cadena con HEREDOC
$c3 = <<<fin
Esto es una $cadena con <b>HEREDOC</b>, caracteres: ‘, “, á, é, ñ<br>
fin;

// Creo una cadena con NOWDOC
$c4 = <<<'fin'
Esto es una $cadena con <b>NOWDOC</b>, caracteres: ‘, “, á, é, ñ<br>
fin;

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($c1, $c2, $c3, $c4);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 1.- Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC incluyendo variables,
 * etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y comprueba que
 * el código fuente es legible (no se tiene una sola línea con todo seguido). Haz que se muestren
 * las etiquetas html (no se ejecuten)
 */

function cabecera() {}

function cuerpo($c1, $c2, $c3, $c4)
{
    // Muestro todas las cadenas, utilizo htmlspecialchars para poder ver las etiquetas HTML
    echo htmlspecialchars($c1) . "<br>" . PHP_EOL;
    echo htmlspecialchars($c2) . "<br>" . PHP_EOL;
    echo htmlspecialchars($c3) . "<br>" . PHP_EOL;
    echo htmlspecialchars($c4) . "<br>" . PHP_EOL;
}
