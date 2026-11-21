<?php

// Incluyo la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Obtengo la ip con "_"
$dirip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);
// Obtengo solo el nombre del navegador
$navegador = encontrarNavegador($_SERVER["HTTP_USER_AGENT"] ?? "");

// Creo el nombre de la imagen
$nombre = "imagen_" .  $dirip . "_" .  $navegador . ".jpg";

// Ruta del fichero con los puntos
$rutaFichero = __DIR__ . "/datos/puntos_" .  $dirip . "_" .  $navegador . ".dat";

// Cargo los puntos del fichero en el array, porque esta página empieza con el array de puntos vacío
leerFichero($rutaFichero, $puntos);

// Indico que lo que envío es una imagen jpg
header('Content-Type: image/jpeg');
// Indico que se descargue como un fichero con ese nombre
header('Content-Disposition: attachment; filename="' . $nombre . '"');

// Creo la imagen con los puntos y la envío al navegador sin guardarla
// (false: no se guarda en /imagenes/puntos, se descarga directamente)
crearImagen($dirip, $navegador, $puntos, false);