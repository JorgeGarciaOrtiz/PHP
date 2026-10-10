<?php
// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Variable con el titulo
$titulo = "Pruebas";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    $titulo => ""
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
?>
    <a href="pruebas01.php">Pruebas 01</a>
    <br>
    <a href="pruebas02.php">Pruebas 02</a>
    <br>
    <a href="arrays.php">Arrays</a>
    <br>
    <a href="fechas.php">Fechas</a>
<?php
}
