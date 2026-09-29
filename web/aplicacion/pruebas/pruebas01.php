<?php

include_once(dirname(__FILE__) . "/../../cabecera.php"); // Incluye el archivo cabecera.php

// Controlador que se encarga de organizar la página

inicioCabecera("APLICACION PRIMER TRIMESTRE"); // Inicia la cabecera de la página
cabecera(); // Muestra el contenido de la cabecera
finCabecera(); // Finaliza la cabecera

inicioCuerpo("Pruebas basicas"); // Inicia el contenido principal de la página
cuerpo(); // Muestra el contenido de la vista
finCuerpo(); // Finaliza el contenido principal

// ***********************************************************************************
// Vista
// ***********************************************************************************

function cabecera() {}

function cuerpo()
{
?>
    <!-- comentario html -->
    <br><br>Esto es Html

    <?php

    // Mostrar un mensaje por pantalla
    echo "<br>¿Hola que tal estas?<br>";

    // Crear una variable con el valor 25 y otra de tipo cadena
    $var1 = 25;
    $cadena = 'esto es una cadena';

    // Sumar 12 al valor de la variable y mostrar el valor final por pantalla
    $var1 += 12;
    echo $var1 . "<br>";

    // Restar 17 al valor de la variable y mostrar el valor final por pantalla
    $var1 -= 17;
    echo "$var1" . "<br>";

    // Crear una variable con una cadena de texto, luego cambiar el valor a 45 y mostrarlo por pantalla
    $unaCadena = "adios";
    $unaCadena = 45;
    echo $unaCadena . "<br>";

    // Comprobar si la variable existe y tiene un valor, si es asi la muestra por pantalla
    if (isset($cadena2)) {
        echo $cadena2;
    } else {
        echo "La variable no existe";
    }

    ?>
<?php
}
