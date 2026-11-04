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
    "Relación 1" => "./index.php",
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

    $numeros1 = [8, 67, 8, 67];

    $resultadoCorrectoNormal = \VALNORMAL\validaEntero($numeros1[0], 1, 10, 1000);
    $resultadoIncorrectoNormal = \VALNORMAL\validaEntero($numeros1[1], 1, 10, 1000);
    $resultadoCorrectoFilter = \VALFILTER\validaEntero($numeros1[2], 1, 10, 1000);
    $resultadoIncorrectoFilter = \VALFILTER\validaEntero($numeros1[3], 1, 10, 1000);

    echo "<h3>Función validaEntero()</h3>";
    echo "<h4>Validación normal</h4>";
    echo "Resultado 1: " . ($resultadoCorrectoNormal ? "True" : "False") . ", " . $numeros1[0] .  "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($resultadoIncorrectoNormal ? "True" : "False") . ", " . $numeros1[1] .  "<br>" . PHP_EOL;
    echo "<h4>Validación con filter</h4>";
    echo "Resultado 1: " . ($resultadoCorrectoFilter ? "True" : "False") . ", " . $numeros1[2] .  "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($resultadoIncorrectoFilter ? "True" : "False") . ", " . $numeros1[3] .  "<br>" . PHP_EOL;

    // ----------------------------------------------------------
    // function validaReal
    // ----------------------------------------------------------

    $numeros2 = [8.5, 67.67, 8.5, 67.67];

    $resultadoCorrectoNormal = \VALNORMAL\validaReal($numeros2[0], 1, 10, 1000);
    $resultadoIncorrectoNormal = \VALNORMAL\validaReal($numeros2[1], 1, 10, 1000);
    $resultadoCorrectoFilter = \VALFILTER\validaReal($numeros2[2], 1, 10, 1000);
    $resultadoIncorrectoFilter = \VALFILTER\validaReal($numeros2[3], 1, 10, 1000);

    echo "<h3>Función validaReal()</h3>";
    echo "<h4>Validación normal</h4>";
    echo "Resultado 1: " . ($resultadoCorrectoNormal ? "True" : "False") . ", " . $numeros2[0] .  "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($resultadoIncorrectoNormal ? "True" : "False") . ", " . $numeros2[1] .  "<br>" . PHP_EOL;
    echo "<h4>Validación con filter</h4>";
    echo "Resultado 1: " . ($resultadoCorrectoFilter ? "True" : "False") . ", " . $numeros2[2] .  "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($resultadoIncorrectoFilter ? "True" : "False") . ", " . $numeros2[3] .  "<br>" . PHP_EOL;

    // ----------------------------------------------------------
    // function validaFecha
    // ----------------------------------------------------------

    echo "<h3>Función validaFecha()</h3>";

    $fechas = ["25/12/2023", "1/2/2023", "29/02/2023", "2023/12/25"];
    $hoy = date('d/m/Y');

    $resultado1 = \VALNORMAL\validaFecha($fechas[0], $hoy);
    $resultado2 = \VALNORMAL\validaFecha($fechas[1], $hoy);
    $resultado3 = \VALNORMAL\validaFecha($fechas[2], $hoy);
    $resultado4 = \VALNORMAL\validaFecha($fechas[3], $hoy);


    echo "<h4>Validación normal</h4>";
    echo "Resultado 1: " . ($resultado1 ? "True" : "False") . ", " . $fechas[0] . "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($resultado2 ? "True" : "False") . ", " . $fechas[1] . "<br>" . PHP_EOL;
    echo "Resultado 3: " . ($resultado3 ? "True" : "False") . ", " . $fechas[2] . "<br>" . PHP_EOL;
    echo "Resultado 4: " . ($resultado4 ? "True" : "False") . ", " . $fechas[3] . "<br>" . PHP_EOL;

    echo "<h4>Validación con filter</h4>";

    $fechasFilter = ["25/12/2023", "1/2/2023", "29/02/2023", "2023/12/25"];

    $resultadoFilter1 = \VALFILTER\validaFecha($fechasFilter[0], $hoy);
    $resultadoFilter2 = \VALFILTER\validaFecha($fechasFilter[1], $hoy);
    $resultadoFilter3 = \VALFILTER\validaFecha($fechasFilter[2], $hoy);
    $resultadoFilter4 = \VALFILTER\validaFecha($fechasFilter[3], $hoy);

    echo "Resultado 1: " . ($resultadoFilter1 ? "True" : "False") . ", " . $fechasFilter[0] . "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($resultadoFilter2 ? "True" : "False") . ", " . $fechasFilter[1] . "<br>" . PHP_EOL;
    echo "Resultado 3: " . ($resultadoFilter3 ? "True" : "False") . ", " . $fechasFilter[2] . "<br>" . PHP_EOL;
    echo "Resultado 4: " . ($resultadoFilter4 ? "True" : "False") . ", " . $fechasFilter[3] . "<br>" . PHP_EOL;

    // ----------------------------------------------------------
    // function validaHora
    // ----------------------------------------------------------

    echo "<h3>Función validaHora()</h3>";

    $horaHoy = date('H:i:s');
    $horas1 = ["14:30:45", "0:5:1", "24:00:00", "12:60:00", "hola"];

    $validarNormalHora1 = \VALNORMAL\validaHora($horas1[0], $horaHoy);
    $validarNormalHora2 = \VALNORMAL\validaHora($horas1[1], $horaHoy);
    $validarNormalHora3 = \VALNORMAL\validaHora($horas1[2], $horaHoy);
    $validarNormalHora4 = \VALNORMAL\validaHora($horas1[3], $horaHoy);
    $validarNormalHora5 = \VALNORMAL\validaHora($horas1[4], $horaHoy);

    echo "<h4>Validación normal</h4>";

    echo "Resultado 1: " . ($validarNormalHora1 ? "True" : "False") . ", " . $horas1[0] . "<br>" . PHP_EOL;
    echo "Resultado 3: " . ($validarNormalHora2 ? "True" : "False") . ", " . $horas1[1] . "<br>" . PHP_EOL;
    echo "Resultado 4: " . ($validarNormalHora3 ? "True" : "False") . ", " . $horas1[2] . "<br>" . PHP_EOL;
    echo "Resultado 5: " . ($validarNormalHora4 ? "True" : "False") . ", " . $horas1[3] . "<br>" . PHP_EOL;
    echo "Resultado 6: " . ($validarNormalHora5 ? "True" : "False") . ", " . $horas1[4] . "<br>" . PHP_EOL;

    echo "<h4>Validación con filter</h4>";

    $horas2 = ["14:30:45", "0:5:1", "24:00:00", "12:60:00", "hola"];

    $validarFilterHora1 = \VALFILTER\validaHora($horas2[0], $horaHoy);
    $validarFilterHora2 = \VALFILTER\validaHora($horas2[1], $horaHoy);
    $validarFilterHora3 = \VALFILTER\validaHora($horas2[2], $horaHoy);
    $validarFilterHora4 = \VALFILTER\validaHora($horas2[3], $horaHoy);
    $validarFilterHora5 = \VALFILTER\validaHora($horas2[4], $horaHoy);

    echo "Resultado 1: " . ($validarFilterHora1 ? "True" : "False") . ", " . $horas2[0] . "<br>" . PHP_EOL;
    echo "Resultado 3: " . ($validarFilterHora2 ? "True" : "False") . ", " . $horas2[1] . "<br>" . PHP_EOL;
    echo "Resultado 4: " . ($validarFilterHora3 ? "True" : "False") . ", " . $horas2[2] . "<br>" . PHP_EOL;
    echo "Resultado 5: " . ($validarFilterHora4 ? "True" : "False") . ", " . $horas2[3] . "<br>" . PHP_EOL;
    echo "Resultado 6: " . ($validarFilterHora5 ? "True" : "False") . ", " . $horas2[4] . "<br>" . PHP_EOL;

    // ----------------------------------------------------------
    // function validaEmail
    // ----------------------------------------------------------

    echo "<h3>Función validaEmail()</h3>";

    echo "<h4>Validación normal</h4>";

    $emails1 = [
        "ana@correo.com",
        "  ana@correo.es  ",
        "ana sanz@correo.com",
        "ana.correo.com",
        "ana@correo"
    ];

    $emails2 = $emails1;

    $validarNormalEmail1 = \VALNORMAL\validaEmail($emails1[0], "correo@defecto.com");
    $validarNormalEmail2 = \VALNORMAL\validaEmail($emails1[1], "correo@defecto.com");
    $validarNormalEmail3 = \VALNORMAL\validaEmail($emails1[2], "correo@defecto.com");
    $validarNormalEmail4 = \VALNORMAL\validaEmail($emails1[3], "correo@defecto.com");
    $validarNormalEmail5 = \VALNORMAL\validaEmail($emails1[4], "correo@defecto.com");

    echo "Resultado 1: " . ($validarNormalEmail1 ? "True" : "False") . ", " . $emails1[0] . "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($validarNormalEmail2 ? "True" : "False") . ", " . $emails1[1] . "<br>" . PHP_EOL;
    echo "Resultado 3: " . ($validarNormalEmail3 ? "True" : "False") . ", " . $emails1[2] . "<br>" . PHP_EOL;
    echo "Resultado 4: " . ($validarNormalEmail4 ? "True" : "False") . ", " . $emails1[3] . "<br>" . PHP_EOL;
    echo "Resultado 5: " . ($validarNormalEmail5 ? "True" : "False") . ", " . $emails1[4] . "<br>" . PHP_EOL;

    echo "<h4>Validación con filter</h4>";

    $validarFilterEmail1 = \VALFILTER\validaEmail($emails2[0], "correo@defecto.com");
    $validarFilterEmail2 = \VALFILTER\validaEmail($emails2[1], "correo@defecto.com");
    $validarFilterEmail3 = \VALFILTER\validaEmail($emails2[2], "correo@defecto.com");
    $validarFilterEmail4 = \VALFILTER\validaEmail($emails2[3], "correo@defecto.com");
    $validarFilterEmail5 = \VALFILTER\validaEmail($emails2[4], "correo@defecto.com");

    echo "Resultado 1: " . ($validarFilterEmail1 ? "True" : "False") . ", " . $emails2[0] . "<br>" . PHP_EOL;
    echo "Resultado 2: " . ($validarFilterEmail2 ? "True" : "False") . ", " . $emails2[1] . "<br>" . PHP_EOL;
    echo "Resultado 3: " . ($validarFilterEmail3 ? "True" : "False") . ", " . $emails2[2] . "<br>" . PHP_EOL;
    echo "Resultado 4: " . ($validarFilterEmail4 ? "True" : "False") . ", " . $emails2[3] . "<br>" . PHP_EOL;
    echo "Resultado 5: " . ($validarFilterEmail5 ? "True" : "False") . ", " . $emails2[4] . "<br>" . PHP_EOL;

    // ----------------------------------------------------------
    // function validaCadena
    // ----------------------------------------------------------

    // ----------------------------------------------------------
    // function validaExpresion
    // ----------------------------------------------------------

    // ----------------------------------------------------------
    // function validaRango
    // ----------------------------------------------------------
}
