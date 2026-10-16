<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Variable con el titulo
$titulo = "Pruebas de cadenas";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
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
?>
    El ni�o me ha escrito una carta en un cami�n <br>
    El ni&ntilde;o me ha escrito una carta en un cami&oacute;n
<?php

    // Creamos la cadena que nos piden
    $cadena = "Está la niña en casa";

    // Obtengo todos los caracteres de la cadena en un array
    $caracteres = mb_str_split($cadena, 1, 'UTF-8');

    // Creo una variable para dar el espacio delantero a cada caracter
    $espacio = "";

    // Recorremos cada uno de los caracteres del array y los mostramos, un caracter por linea
    for ($i = 0; $i < count($caracteres); $i++) {
        echo $espacio . $caracteres[$i] . "<br>" . PHP_EOL;
        $espacio = $espacio . "&nbsp;";
    }
}
