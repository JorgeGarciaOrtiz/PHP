<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relacion 1" => "./index.php"
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Relacion 1: Arrays y fechas");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Relacion 1: Arrays y fechas", $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo()
{
?>
    <a href="ejercicio1.php">Ejercicio 1</a>
    <br>
    <a href="ejercicio2.php">Ejercicio 2</a>
    <br>
    <a href="ejercicio3.php">Ejercicio 3</a>
    <br>
    <a href="ejercicio4.php">Ejercicio 4</a>
    <br>
    <a href="ejercicio5.php">Ejercicio 5</a>
    <br>
    <a href="ejercicio6.php">Ejercicio 6</a>
    <br>
    <a href="ejercicio7.php">Ejercicio 7</a>
<?php
}
