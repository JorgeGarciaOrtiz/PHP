<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

// Datos basicos
$nombre = "Jorge";
$edad = 30;

$basicos = [
    "nombre" => $nombre,
    "edad" => $edad
];

// Relleno otras
$otras = rellenarOtra();

// Dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($basicos, $otras); //llamo a la vista
finCuerpo();

// **********************************************************

// Vista
function cabecera()
{
?>
    <!-- Esto es un comentario en HTML -->
<?php
}

// Vista
function cuerpo($bas, $ot)
{
?>
    <br><br>
    <li><a href="/aplicacion/pruebas/index.php">Pruebas</a></li>
<?php
    echo "Mi nombre es {$bas['nombre']} de {$bas['edad']} años" . PHP_EOL;
    echo "Con otros datos {$ot}";
}

function rellenarOtra()
{
    return "de 2 DAW";
}
