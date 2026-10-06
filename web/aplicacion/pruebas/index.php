<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <a href="pruebas01.php">Pruebas01 de clase</a>
    <br>
    <a href="pruebasCasa.php">Pruebas de casa</a>
    <br>
    <a href="pasopar.php">Comunicación controlador</a>
    <br>
    <a href="./arrays.php">Prueba de Arrays</a>
<?php
}
