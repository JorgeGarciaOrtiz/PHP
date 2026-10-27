<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Relación 4";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    $titulo => "./index.php"
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo()
{
    echo "<h3>1. IntrumentoBase</h3>";

    echo "<h3>2. IFabricable</h3>";

    echo "<h3>3. InstrumentoViento</h3>";

    echo "<h3>4. Flauta</h3>";

    echo "<h3>5. EstadoCivil</h3>";

    echo "<h3>5. Persona</h3>";

    echo "<h3>6. SerieFibonacci</h3>";

    echo "<h3>7. ClaseMisPropiedades</h3>";
}
