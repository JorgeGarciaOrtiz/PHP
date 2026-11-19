<?php

define("RUTABASE", dirname(__FILE__));
define("MODO_TRABAJO", "desarrollo");

if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);

spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else {
        throw new Exception("La clase $clase no se ha encontrado.");
    }
});

include(RUTABASE . "/aplicacion/plantilla/plantilla.php");
include(RUTABASE . "/scripts/librerias/validacion.php");
include(RUTABASE . "/scripts/librerias/imagenes.php");

// Creo un array con 3 puntos
$puntos = [
    new Punto(100, 100, "red", 1),
    new Punto(250, 250, "blue", 2),
    new Punto(400, 150, "green", 3),
];
