<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Inicio");
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo()
{
?>
    <a href="./aplicacion/pruebas/index.php">Pruebas</a>
    <br>
    <a href="./aplicacion/practicas">Ejercicios</a>
<?php
}
