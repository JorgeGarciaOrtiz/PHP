<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas basicas");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>Esto es Html <!-- comentario html -->

    <?php
    echo "<br>¿Hola que tal estas?<br>"; // comentario de ejemplo

    $var1 = 25;
    $cadena = 'esto es una cadena';

    $var1 += 12;
    echo $var1 . "<br>";

    $unaCadena = "adios";

    $var1 -= 17;

    echo "$var1" . "<br>";

    $unaCadena = 45;
    echo $unaCadena . "<br>";

    if (isset($cadena2)) {
        echo $cadena2;
    } else {
        echo "No existe";
    }

    ?>
<?php
}
