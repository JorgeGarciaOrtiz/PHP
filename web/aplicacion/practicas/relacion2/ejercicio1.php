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

$cadena = "cadena";

$c1 = "Esto es una $cadena normal con comillas dobles";
$c2 = 'Esto es una $cadena normal con comillas simples';
$c3 = <<<EOT
Esto es una $cadena con nowdoc
EOT;
$c4 = <<<'EOT'
Esto es una $cadena con nowdoc
EOT;

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

function cuerpo($c1, $c2, $c3, $c4) {
    echo $c1 . $c2 . $c3 . $c4;
}
