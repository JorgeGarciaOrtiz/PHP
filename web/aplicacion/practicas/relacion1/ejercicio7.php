<?php

date_default_timezone_set('Europe/Madrid');

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Relacion 1" => "./index.php",
    "Ejercicio 7" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();

// Cuerpo de la página
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

function cabecera() {}

function cuerpo()
{

    // ----------------------------------------------------------
    // Mostrar la fecha actual en el formato “d/m/Y”
    // ----------------------------------------------------------

    // Creo un objeto DateTime con la fecha y hora actuales
    $fechaActual = new DateTime();

    // Muestro la fecha con el formato pedido 
    echo $fechaActual->format("d/m/Y") . "<br>";

    // ----------------------------------------------------------
    // Mostrar la fecha actual en el formato
    // “dia d, mes mmmm, año yyyy, dia de la semana dd”.
    // ----------------------------------------------------------

    // Creo otro objeto DateTime con la fecha y hora actuales
    $fechaActual2 = new DateTime();

    // Muestro el día, el mes, el año y el día de la semana con el formato pedido
    echo "día: " . $fechaActual2->format("j") . ", mes: " . $fechaActual2->format("F") . ", año: " . $fechaActual2->format("Y") . ", día de la semana: " . $fechaActual2->format("l") . "<br>";

    // ----------------------------------------------------------
    // Mostrar la hora actual en el formato “hh:mm:ss”
    // ----------------------------------------------------------

    // Creo otro objeto DateTime con la hora actual
    $horaActual = new DateTime();

    // Muestro la hora, los minutos y los segundos con el formato pedido 
    echo $horaActual->format("h:m:s") . "<br><br>";

    // ----------------------------------------------------------
    // Mostrar los tres apartados anteriores para la fecha
    // 29/3/2024 a 12:45.
    // ----------------------------------------------------------

    // Creo un objeto DateTime con esa fecha y hora concretas
    $fecha1 = new DateTime("2024/03/29 12:45");

    // Muestro la fecha con el formato “d/m/Y”
    echo $fecha1->format("d/m/Y") . "<br>";

    // Muestro el día, el mes, el año y el día de la semana con el formato pedido 
    echo "día: " . $fecha1->format("j") . ", mes: " . $fecha1->format("F") . ", año: " . $fecha1->format("Y") . ", día de la semana: " . $fecha1->format("l") . "<br>";
    
    // Muestro la hora con el formato “hh:mm:ss”
    echo $fecha1->format("h:m:s") . "<br><br>";

    // ----------------------------------------------------------
    // Mostrar los tres apartados anteriores para la fecha actual
    // menos 12 días y 4 horas
    // ----------------------------------------------------------

    // Creo un objeto DateTime con la fecha actual y le resto 12 días y 4 horas
    $fecha2 = new DateTime();
    $fecha2->sub(new DateInterval("P12DT4H")); // P = periodo, 12D = 12 días, T = separa fecha de hora, 4H = 4 horas
    
    // Muestro la fecha con el formato “d/m/Y”
    echo $fecha2->format("d/m/Y") . "<br>";

    // Muestro el día, el mes, el año y el día de la semana con el formato pedido 
    echo "día: " . $fecha2->format("j") . ", mes: " . $fecha2->format("F") . ", año: " . $fecha2->format("Y") . ", día de la semana: " . $fecha2->format("l") . "<br>";
    
    // Muestro la hora con el formato “hh:mm:ss”
    echo $fecha2->format("h:m:s") . "<br>";
}
