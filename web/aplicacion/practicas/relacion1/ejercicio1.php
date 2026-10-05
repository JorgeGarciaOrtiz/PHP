<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 1");
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

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo()
{
    // ====================================================== 
    // FUNCIONES MATEMÁTICAS
    // ======================================================

    $numero = 5.7;

    echo "<h2>Funciones matemáticas</h2>";

    echo "round(5.7): " . round($numero) . "<br>"; // round() redondea el número al entero más cercano
    echo "floor(5.7): " . floor($numero) . "<br>"; // floor() redondea el número hacia abajo
    echo "ceil(5.2): " . ceil(5.2) . "<br><br>"; // ceil() redondea el número hacia arriba

    echo "pow(2, 3): " . pow(2, 3) . "<br>"; // pow() calcula una potencia
    echo "sqrt(25): " . sqrt(50) . "<br>"; // sqrt() calcula la raíz cuadrada de un número
    echo "abs(-7): " . abs(-7) . "<br>"; // abs() devuelve el valor absoluto de un número

    // ======================================================
    // VARIABLES EN BINARIO, OCTAL Y HEXADECIMAL
    // ======================================================

    echo "<h2>Variables en binario, octal y hexadecimal</h2>";

    $decimal = 50;
    $base4 = 1234;
    $base8 = 1234;

    echo "Número entero " . $numero . " -> binario: " . decbin($numero) . "<br>";
    echo "Número entero " . $numero . " -> octal: " . decoct($numero) . "<br>";
    echo "Número entero " . $numero . " -> hexadecimal: " . dechex($numero) . "<br><br>";

    $binario = 0b1010;
    $octal = 012;
    $hexadecimal = 0xA;

    echo "Número " . $binario . " -> binario: " . decbin($binario) . "<br>";
    echo "Número " . $octal . " -> octal: " . decoct($octal) . "<br>";
    echo "Número " . $hexadecimal . " -> hexadecimal: " . dechex($hexadecimal) . "<br>";
?>
<?php
}
