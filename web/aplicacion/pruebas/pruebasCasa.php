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
    <?php

    // ***********************************************************************************
    // Cómo escribir PHP
    // ***********************************************************************************

    echo "Hola";

    // Generar HTML desde PHP
    echo "<br><span>Esto es HTML</span><br>";

    // ***********************************************************************************
    // Las variables
    // ***********************************************************************************

    // No es necesario declarar las variables

    $edad = 15;

    // PHP cambia el tipo de la variable según el valor:

    $cadena = 15;       // entero
    $cadena = 12.7;     // decimal
    $cadena = "hola";   // cadena
    $cadena = 100;      // entero

    // ***********************************************************************************
    // Variables Superglobales
    // ***********************************************************************************

    // $_SERVER --> Información del servidor y cliente
    // $_GET --> Datos enviados mediante GET
    // $_POST --> Datos enviados mediante POST
    // $_REQUEST --> Datos de GET, POST y otros
    // $_COOKIE	Cookies del cliente
    // $_FILES	Archivos subidos
    // $_ENV	Variables de entorno

    // ***********************************************************************************
    // isset($x);
    // ***********************************************************************************

    // Comprueba si una variable tiene un valor asignado.

    $galletas = 12;

    if (isset($galletas)) {
        echo "<br>true";
    }

    // ***********************************************************************************
    // unset();
    // ***********************************************************************************

    // Elimina la variable por completo

    unset($galletas);

    // ***********************************************************************************
    // error_reporting()
    // ***********************************************************************************

    // Muestra todos los errores y avisos relevantes.

    error_reporting(E_ALL);

    // ***********************************************************************************
    // Variable-variable
    // ***********************************************************************************

    // $$var ($var = "nombre") --> $nombre --> "Profesor";

    $nombre = "Profesor";
    $var = "nombre";

    echo "<br>" . $$var . "<br>";

    // ***********************************************************************************
    // Variable-función
    // ***********************************************************************************

    // Una variable contiene el nombre de una función y podemos ejecutarla

    // Creamos una función
    function funcionParaSaludar($nombre1, $nombre2)
    {
        echo "Hola a " . $nombre1 . " y a " . $nombre2;
    }

    // Asignamos la función a nuestra variable
    $nombresPersonas = "funcionParaSaludar";
    $alumnos = "funcionParaSaludar";

    // Ejecutamos la función a traves del nombre de nuestra variable
    $nombresPersonas("Jorge", "Nicky"); // Resultado: Hola a Jorge y a Nicky
    $alumnos("Jorge", "Nicky"); // Resultado: Hola a Jorge y a Nicky

    // ***********************************************************************************
    // Variable-clase
    // ***********************************************************************************

    // Una variable contiene el nombre de una clase

    class MiClase
    {
        // ...
    }

    $var = "MiClase";

    ?>
<?php
}
