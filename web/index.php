<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Prácticas de PHP");
cuerpo();  //llamo a la vista
finCuerpo();

// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <a href="./aplicacion/pruebas/index.php">Pruebas</a>
    <br>
    <a href="./aplicacion/practicas/relacion1/index.php">Relación 1</a>
<?php
}
