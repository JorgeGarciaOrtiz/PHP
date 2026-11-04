<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Incluimos las dos librerias
include_once(dirname(__FILE__) . "/apis/val_normal.php");
include_once(dirname(__FILE__) . "/apis/val_filter.php");

// Variable con el titulo
$titulo = "Ejercicio 1";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 1" => "./index.php",
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
    // ----------------------------------------------------------
    // function validaEntero
    // ----------------------------------------------------------

    $numero = 8;
    $resultadoCorrecto = \VALNORMAL\validaEntero($numero, 1, 10, 1000);
    $resultadoIncorrecto = \VALNORMAL\validaEntero($numero, 1, 10, 1000);

    echo $resultadoCorrecto == 1 ? "True" : "False";
    echo $resultadoIncorrecto == 1 ? "True" : "False";
    echo $numero;
}
