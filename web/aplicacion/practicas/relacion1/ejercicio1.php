<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relacion 1" => "./index.php",
    "Ejercicio 1" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Ejercicio 1", $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 1.- Mostrar el funcionamiento de diversas funciones Matemáticas (round, floor, pow, sqrt, entero a
 * hexadecimal, de base 4 a base 8 y al menos dos funciones mas distintas de las anteriores) (buscar la
 * información sobre las funciones matemáticas en http://php.net/manual/es/book.math.php). Definir
 * variables inicializadas con valores en binario, octal y hexadecimal. Mostrar el valor de esas variables
 * tanto en decimal como en la base en la que se han definido.
 * Hacer este ejercicio directamente en la vista (definiciones de las variables y visualización de las
 * mismas)
 */

function cabecera() {}

function cuerpo()
{
    // Añadimos un titulo
    echo "<h2>Funciones matemáticas</h2>";

    // round() --> redondea el número al entero más cercano
    echo "round(5.7): " . round(5.7) . "<br>";
    // floor() --> redondea el número hacia abajo
    echo "floor(5.7): " . floor(5.7) . "<br>";
    // ceil() --> ceil() redondea el número hacia arriba
    echo "ceil(5.2): " . ceil(5.2) . "<br><br>";

    // pow() --> calcula una potencia
    echo "pow(2, 3): " . pow(2, 3) . "<br>";
    // sqrt() --> calcula la raíz cuadrada de un número
    echo "sqrt(25): " . sqrt(25) . "<br>";
    // abs() --> devuelve el valor absoluto de un número
    echo "abs(-7): " . abs(-7) . "<br>";

    // dechex() --> convierte un entero a hexadecimal
    echo "dechex(255): " . dechex(255) . "<br>";
    // base_convert() --> convierte de base 4 a base 8
    echo "base_convert('123', 4, 8): " . base_convert('123', 4, 8) . "<br>";
    
    // Añadimos un titulo
    echo "<h2>Variables en binario, octal y hexadecimal</h2>";

    // Creamos las variables con valores en binario, octal y hexadecimal
    $binario = 0b1010;
    $octal = 012;
    $hexadecimal = 0xA;

    // decbin() --> convierte un entero a binario
    echo "Binario: 0b1010 -> en decimal: " . $binario . ", en binario: " . decbin($binario) . "<br>";
    // decoct() --> convierte un entero a octal
    echo "Octal: 012 -> en decimal: " . $octal . ", en octal: " . decoct($octal) . "<br>";
    // dechex() --> convierte un entero a hexadecimal
    echo "Hexadecimal: 0xA -> en decimal: " . $hexadecimal . ", en hexadecimal: " . dechex($hexadecimal) . "<br>";
}
