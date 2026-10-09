<?php
// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Pruebas de PHP");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Pruebas de PHP", $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo()
{
?>
    <a href="pruebas01.php">Pruebas 01</a>
    <br>
    <a href="pruebasCasa.php">Pruebas de casa</a>
    <br>
    <a href="./arrays.php">Prueba de Arrays</a>
<?php
}
