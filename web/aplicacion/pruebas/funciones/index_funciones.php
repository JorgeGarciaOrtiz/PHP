<?php
// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

include_once("funciones.php");

// Variable con el titulo
$titulo = "Funciones";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../../index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

$numero = doble(25);

if ($numero === false) {
    $numero = 10;
}

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($numero);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo(int $numero)
{
    echo $numero;
}
