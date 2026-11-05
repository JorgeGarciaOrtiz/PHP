<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Incluimos las dos librerias
include_once(dirname(__FILE__) . "/apis/val_normal.php");
include_once(dirname(__FILE__) . "/apis/val_filter.php");

// Hora actual
date_default_timezone_set('Europe/Madrid');

// Variable con el titulo
$titulo = "Ejercicio 1";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 5" => "./index.php",
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
    // ----------------------------------------------------------
    // function validaEntero
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaEntero()</h3>";

    $enteros1 = [8, 67];
    $enteros2 = [8, 67];

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($enteros1); $i++) {
        $resultado = \VALNORMAL\validaEntero($enteros1[$i], 1, 10, 1000);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $enteros1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($enteros2); $i++) {
        $resultado = \VALFILTER\validaEntero($enteros2[$i], 1, 10, 1000);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $enteros2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaReal
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaReal()</h3>";

    $reales1 = [8.5, 67.67];
    $reales2 = [8.5, 67.67];

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($reales1); $i++) {
        $resultado = \VALNORMAL\validaReal($reales1[$i], 1, 10, 1000);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $reales1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($reales2); $i++) {
        $resultado = \VALFILTER\validaReal($reales2[$i], 1, 10, 1000);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $reales2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaFecha
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaFecha()</h3>";

    $hoy = date('d/m/Y');
    $fechas1 = ["25/12/2023", "1/2/2023", "29/02/2023", "2023/12/25"];
    $fechas2 = ["25/12/2023", "1/2/2023", "29/02/2023", "2023/12/25"];

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($fechas1); $i++) {
        $resultado = \VALNORMAL\validaFecha($fechas1[$i], $hoy);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $fechas1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($fechas2); $i++) {
        $resultado = \VALFILTER\validaFecha($fechas2[$i], $hoy);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $fechas2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaHora
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaHora()</h3>";

    $horaHoy = date('H:i:s');
    $horas1 = ["14:30:45", "0:5:1", "24:00:00", "12:60:00", "hola"];
    $horas2 = ["14:30:45", "0:5:1", "24:00:00", "12:60:00", "hola"];

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($horas1); $i++) {
        $resultado = \VALNORMAL\validaHora($horas1[$i], $horaHoy);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $horas1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($horas2); $i++) {
        $resultado = \VALFILTER\validaHora($horas2[$i], $horaHoy);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $horas2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaEmail
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaEmail()</h3>";

    $emails1 = ["jorge@correo.com", "  jorge@correo.es  ", "jorge sanz@correo.com", "jorge.correo.com", "jorge@correo"];
    $emails2 = ["jorge@correo.com", "  jorge@correo.es  ", "jorge sanz@correo.com", "jorge.correo.com", "jorge@correo"];
    $emailPorDefecto = "correo@defecto.com";

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($emails1); $i++) {
        $resultado = \VALNORMAL\validaEmail($emails1[$i], $emailPorDefecto);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $emails1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($emails2); $i++) {
        $resultado = \VALFILTER\validaEmail($emails2[$i], $emailPorDefecto);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $emails2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaCadena
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaCadena()</h3>";

    $cadenas1 = ["España", "1234567890", "12345678901"];
    $cadenas2 = ["España", "1234567890", "12345678901"];
    $cadenaPorDefecto = "cadena por defecto";

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($cadenas1); $i++) {
        $resultado = \VALNORMAL\validaCadena($cadenas1[$i], 10, $cadenaPorDefecto);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $cadenas1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($cadenas2); $i++) {
        $resultado = \VALFILTER\validaCadena($cadenas2[$i], 10, $cadenaPorDefecto);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $cadenas2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaExpresion
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaExpresion()</h3>";

    $expresion = '#^[0-9]{3}$#';
    $cadenaPorDefecto = "cadena por defecto";
    $textos1 = ["123", "12", "abc"];
    $textos2 = ["123", "12", "abc"];

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($textos1); $i++) {
        $resultado = \VALNORMAL\validaExpresion($textos1[$i], $expresion, $cadenaPorDefecto);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $textos1[$i] . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($textos2); $i++) {
        $resultado = \VALFILTER\validaExpresion($textos2[$i], $expresion, $cadenaPorDefecto);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . ", " . $textos2[$i] . "<br>" . PHP_EOL;
    }

    // ----------------------------------------------------------
    // function validaRango
    // ----------------------------------------------------------

    echo "<br><hr><h3>Función validaRango()</h3>";

    $posibles = ["a" => "rojo", "b" => "azul"];
    $pruebas = [["rojo", 1], ["a", 1], ["a", 2], ["rojo", 2]];

    echo "<h4>Validación normal</h4>";

    for ($i = 0; $i < count($pruebas); $i++) {
        $resultado = \VALNORMAL\validaRango($pruebas[$i][0], $posibles, $pruebas[$i][1]);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . "<br>" . PHP_EOL;
    }

    echo "<h4>Validación con filter</h4>";

    for ($i = 0; $i < count($pruebas); $i++) {
        $resultado = \VALFILTER\validaRango($pruebas[$i][0], $posibles, $pruebas[$i][1]);
        echo "Resultado " . ($i + 1) . ": " . ($resultado ? "True" : "False") . "<br>" . PHP_EOL;
    }
}
