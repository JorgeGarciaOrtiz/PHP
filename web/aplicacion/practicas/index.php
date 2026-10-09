<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../index.php",
    "Ejercicios" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Ejercicios", $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo()
{
?>
    <a href="./relacion1/">Relación 1</a>
<?php
}
