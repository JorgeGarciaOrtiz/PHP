<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Variable con el titulo
$titulo = "Pruebas de expresiones regulares";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

$cadena = "Hola 12, adiós 34 y hasta luego 56";

// ==========================================================
// preg_match: encuentra la primera coincidencia
// ==========================================================

$preg_match = "";
if (preg_match('/\d+/', $cadena, $numeros)) {
    $preg_match = "Con preg_match: " . $numeros[0] . "<br>";
}

// ==========================================================
// preg_match_all: encuentra todas las coincidencias
// ==========================================================

$preg_match_all = "";
if (preg_match_all('/\d+/', $cadena, $numeros)) {
    $preg_match_all = "Con preg_match_all: ";

    foreach ($numeros[0] as $numero) {
        $preg_match_all .= $numero . " ";
    }

    $preg_match_all .= "<br>";
}

// ==========================================================
// preg_replace: sustituye las coincidencias
// ==========================================================

$preg_replace = "";
$preg_replace = "Con preg_replace: " . preg_replace('/\d+/', 'XX', $cadena) . "<br>";

// ==========================================================
// preg_split: divide una cadena usando una expresión regular
// ==========================================================

$preg_split = "";
$palabras = preg_split('/\s+/', $cadena);
$preg_split = "Con preg_split: ";

foreach ($palabras as $palabra) {
    $preg_split .= $palabra . " | ";
}

$preg_split .= "<br>";

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($cadena, $preg_match, $preg_match_all, $preg_replace, $preg_split);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo(
    string $cadena,
    string $preg_match,
    string $preg_match_all,
    string $preg_replace,
    string $preg_split
) {
    echo "<h3>" . $cadena . "</h3>" . PHP_EOL;
    echo $preg_match . PHP_EOL;
    echo $preg_match_all . PHP_EOL;
    echo $preg_replace . PHP_EOL;
    echo $preg_split . PHP_EOL;
}
