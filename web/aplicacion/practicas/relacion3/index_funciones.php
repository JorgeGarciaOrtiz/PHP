<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

include_once("funciones.php");

// Variable con el titulo
$titulo = "Relación 3";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    $titulo => "./index.php"
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
    // ==========================================================

    echo "<h3>1 - Función cuentaVeces()</h3>";

    $vector = array(); // array vacío
    $numero = 0; // variable para el nº de la llamada

    // Probamos por primera vez la función
    echo "Resultado: " . (cuentaVeces($vector, "1osición", 7, $numero) == true ? "True" : "False");
    echo "<br>Número de veces: " . $numero . "<br>";
    print_r($vector);

    // Probamos por segunda vez la función
    echo "<br><br>Resultado: " . (cuentaVeces($vector, "otra", 2, $numero) == true ? "True" : "False");
    echo "<br>Número de veces: " . $numero . "<br>";
    print_r($vector);

    // ==========================================================

    echo "<h3>2 - Función generarCadena()</h3>";

    $cadena1 = generarCadena(7);
    echo "Resultado: " . ($cadena1 == true ?  $cadena1 : "No puede mostrarse la cadena");

    // ==========================================================

    echo "<h3>3 - Función operaciones()</h3>";

    echo "Resultado: " . operaciones(5, 2, 5, 7, 3, 4);

    // ==========================================================

    echo "<h3>4 - Función devuelve()</h3>";

    // ==========================================================

    echo "<h3>5 - Funciones suma(), resta() y multiplicacion()</h3>";

    // ==========================================================

    echo "<h3>6 - Función llamadaAFuncion()</h3>";

    // ==========================================================

    echo "<h3>7 - Función ordenar()</h3>";

    // ==========================================================
}
