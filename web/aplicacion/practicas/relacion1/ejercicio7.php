<?php

date_default_timezone_set('Europe/Madrid');

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

$ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 1"=> "./index.php",
 "Ejercicio 3"=>"Ejercicio3.php"
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 7", $ubicacion);
cuerpo();

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones
 * para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime.
 * 
 *      - Mostrar la fecha actual en el formato “d/m/Y”
 *      - Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
 *      - Mostrar la hora actual en el formato “hh:mm:ss”
 *      - Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
 *      - Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
 * 
 *      Se definirán las fechas y se visualizarán directamente en la vista (no se definirán en el
 *      controlador)
 */

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo()
{
    // Mostrar la fecha actual en el formato “d/m/Y”.
    $fechaActual = new DateTime();
    echo $fechaActual->format("d/m/Y") . "<br>";

    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
    $fechaActual2 = new DateTime();
    echo "día: " . $fechaActual2->format("j") . ", mes: " . $fechaActual2->format("F") . ", año: " . $fechaActual2->format("Y") . ", día de la semana: " . $fechaActual2->format("l") . "<br>";

    // Mostrar la hora actual en el formato “hh:mm:ss”.
    $horaActual = new DateTime();
    echo $horaActual->format("h:m:s") . "<br><br>";

    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
    $fecha1 = new DateTime("2024/03/29 12:45");

    echo $fecha1->format("d/m/Y") . "<br>";
    echo "día: " . $fecha1->format("j") . ", mes: " . $fecha1->format("F") . ", año: " . $fecha1->format("Y") . ", día de la semana: " . $fecha1->format("l") . "<br>";
    echo $fecha1->format("h:m:s") . "<br><br>";

    // Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas.
    $fecha2 = new DateTime();
    $fecha2 ->sub(new DateInterval("P12DT4H")); // P = periodo, 12D = 12 días, T = separa fecha de hora, 4H = 4 horas

    echo $fecha2->format("d/m/Y") . "<br>";
    echo "día: " . $fecha2->format("j") . ", mes: " . $fecha2->format("F") . ", año: " . $fecha2->format("Y") . ", día de la semana: " . $fecha2->format("l") . "<br>";
    echo $fecha2->format("h:m:s") . "<br>";
}
