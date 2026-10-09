<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    "Pruebas de arrays" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Prueba de arrays");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Prueba de arrays", $ubicacion);
cuerpo();

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo()
{
    // Creo un array y le meto valores
    $miArray[3] = 23;
    $miArray[7] = 123;
    $miArray[] = 54; // posición 8

    // Ahora el array es: posición 3 = 23, posición 7 = 123, posición 8 = 54
    // Las posiciones 0, 1, 2, 4, 5 y 6 NO existen (son "huecos")

    // Aquí iré sumando los números
    $totalNumeros = 0;

    // Cuenta cuántos elementos hay
    $final = count($miArray);

    // Repite mientras $i sea menor que $final
    for ($i = 0; $i < $final; $i++) {

        // isset pregunta: "¿existe algo en la posición $i?"
        if (isset($miArray[$i])) {
            // sí existe: lo sumo al total
            $totalNumeros += $miArray[$i];
        } else {
            // no existe: alargo el bucle una vuelta más
            $final++;
        }
    }

    // Al terminar el for, $total vale 1311 (23 + 123 + 54)

    // Muestro el resultado por pantalla
    echo "La suma de " . $miArray[3] . ", " . $miArray[7] . " y " . $miArray[8] . " es: " . $totalNumeros;
}
