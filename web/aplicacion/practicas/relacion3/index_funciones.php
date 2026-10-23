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
    echo "<br>Número de veces: " . $numero . "<br>" . PHP_EOL;
    print_r($vector);

    // Probamos por segunda vez la función
    echo "<br><br>Resultado: " . (cuentaVeces($vector, "otra", 2, $numero) == true ? "True" : "False");
    echo "<br>Número de veces: " . $numero . "<br>" . PHP_EOL;
    print_r($vector);

    // ==========================================================

    echo "<h3>2 - Función generarCadena()</h3>";

    // Mostramos el resultado de la función generarCadena()
    $cadena1 = generarCadena(7);
    echo "Resultado: " . ($cadena1 == true ?  $cadena1 : "No puede mostrarse la cadena");

    // ==========================================================

    echo "<h3>3 - Función operaciones()</h3>";

    // Mostramos el resultado de la función operaciones()
    echo "Resultado: " . operaciones(5, 2, 5, 7, 3, 4) . "<br>" . PHP_EOL;

    // ==========================================================

    echo "<h3>4 - Función devuelve()</h3>";

    // Mostramos el resultado de la función devuelve() con 3 parametros
    $valor = 7;
    echo "Resultado con los 3 parametros: " . devuelve($valor, 2, 3) . ", valor: " . $valor . "<br>" . PHP_EOL;

    // Mostramos el resultado de la función devuelve() con el primer parametro unicamente
    $valor = 7;
    echo "Resultado con el primer parametro: " . devuelve($valor) . ", valor: " . $valor . "<br>" . PHP_EOL;

    // Mostramos el resultado de la función devuelve() con el primer y el segundo parametro
    $valor = 7;
    echo "Resultado con el primer y segundo parametro: " . devuelve($valor, 2) . ", valor: " . $valor . "<br>" . PHP_EOL;

    // Mostramos el resultado de la función devuelve() con el primer y el tercer parametro
    $valor = 7;
    echo "Resultado con el primer y tercer parametro: " . devuelve($valor, num2: 3) . ", valor: " . $valor . "<br>" . PHP_EOL;

    // ==========================================================

    echo "<h3>5 - Función hacerOperacion()</h3>";

    $resultado = hacerOperacion("resta", 3, 1);
    echo "Resultado: " . ($resultado == true ? $resultado : "False");

    // ==========================================================

    echo "<h3>6 - Función llamadaAFuncion()</h3>";

    $funcionAnonima1 = llamadaAFuncion(1, 2, fn($a, $b) => $a - $b);
    $funcionAnonima2 = llamadaAFuncion(1, 2, fn($a, $b) => $a * $b);
    $funcionAnonima3 = llamadaAFuncion(1, 2, fn($a, $b) => ($a * $b) + $a);

    echo "Resultado: " . $funcionAnonima1 . "<br>" . PHP_EOL;
    echo "Resultado: " . $funcionAnonima2 . "<br>" . PHP_EOL;
    echo "Resultado: " . $funcionAnonima3 . "<br>" . PHP_EOL;

    // ==========================================================

    echo "<h3>7 - Función ordenar()</h3>";

    $vector = array("uno", "grande", "caminos", "a");
    print_r($vector);
    ordenar($vector);
    echo "<br>";
    print_r($vector);
    echo " --> " . (ordenar($vector) == true ? "Si se ha podido ordenar" : "No se ha podido ordenar");
}
