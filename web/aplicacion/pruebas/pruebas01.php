<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    "Pruebas 01" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Pruebas de PHP");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Pruebas 01", $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera()
{
?>
    <!-- Esto es un comentario en HTML -->
<?php
}

function cuerpo()
{
?>
    <!-- comentario html -->
    Esto es Html

    <?php

    // ------------------------------------------
    // 29 / 09 / 2026
    // ------------------------------------------

    // Mostrar un mensaje por pantalla
    echo "<br>¿Hola que tal estas?<br>";

    // Crear una variable con el valor 25 y otra de tipo cadena
    $var1 = 25;
    $cadena = 'esto es una cadena';

    // Sumar 12 al valor de la variable y mostrar el valor final por pantalla
    $var1 += 12;
    echo $var1 . "<br>";

    // Restar 17 al valor de la variable y mostrar el valor final por pantalla
    $var1 -= 17;
    echo "$var1" . "<br>";

    // Crear una variable con una cadena de texto, luego cambiar el valor a 45 y mostrarlo por pantalla
    $unaCadena = "adios";
    $unaCadena = 45;
    echo $unaCadena . "<br>";

    // Comprobar si la variable existe y tiene un valor, si es asi la muestra por pantalla
    if (isset($cadena2)) {
        echo $cadena2;
    } else {
        echo "La variable no existe<br>";
    }

    // ------------------------------------------
    // 30 / 09 / 2026
    // ------------------------------------------

    // echo "El numero real es: $real"; // Da error por que la variable no eta inicializada

    // Los numeros reales (floats) no son exactos → siempre hay error.
    $real = 1234.345678901234567890; // al depurar nos pone que el valor es: 1234.3456789012346
    $real += 0.4321099;

    // ***********************************************************************************

    // PHP_EOL sirve para insertar el salto de línea apropiado para el sistema operativo donde se ejecuta PHP
    echo "el numero es $var1<br>" . PHP_EOL;
    echo 'el numero es $var1<br>' . PHP_EOL; // sale de forma literal todo lo que ponemos

    // ***********************************************************************************

    $real = null;
    echo "El numero real es: $real"; // No aparece nada por que la variable el null

    // ***********************************************************************************

    // Cambiar el tipo de la variable varias veces

    $var = 125;
    $tipo = gettype($var); // integer

    $var = (string)$var;
    $tipo = gettype($var); // string

    settype($var, "double"); // settype devuelve boolean
    $tipo = gettype($var); // double

    $var = intval($var);
    $tipo = gettype($var); // integer

    // ***********************************************************************************

    /*
    Valores que PHP considera “false” en un if
        false
        0
        0.0
        "" (cadena vacía)
        "0" (cadena con cero)
        null
        [] (array vacío)
        0 como resultado de una conversión
    */

    $var = "0";
    if ($var) { // false
        $cadena = "var no es false";
    }

    $var = "0";
    if (0) { // false
        $cadena = "var no es false";
    }

    $var = "";
    if ($var) { // false
        $cadena = "var no es false";
    }

    $var = 0;
    if ($var) { // false
        $cadena = "var no es false";
    }

    $var = 1;
    if ($var) { // true
        $cadena = "var no es false";
    }

    // ***********************************************************************************

    // $var = 1 + true;      // 2
    // $var = 1 + 1.5;       // 2.5
    // $var = 1 + "1hola";   // 2
    // $var = 1 + "1.5hola"; // 2.5
    // $var = 1 + "hola";    // Error
    // $var = 1 + [];        // Error

    // ***********************************************************************************

    $aux = 125;
    $var = "hola" . $aux; // "hola125"

    $aux = true;
    $var = "hola" . $aux; // "hola1"

    // $aux = [];
    // $var = "hola" . $aux;  // Error: Array to string conversion

    $aux = "adios";
    $var = "hola" . $aux; // "holaadios"

    // ***********************************************************************************

    // Variables por valor y por referencia

    $var1 = 100; // $var1 = 100
    $var2 = $var1; // $var2 = 100
    $var3 = &$var1; // $var3 referencia a $var1 → $var3 = 100

    $var2 = 150; // $var2 cambia → $var1 NO cambia → $var1 = 100
    // $var3 sigue referenciando a $var1 → $var3 = 100

    $var3 = 200; // $var3 cambia → cambia $var1 también → $var1 = 200
    // $var2 se queda igual → $var2 = 150

    unset($var1); // $var1 se elimina, pero $var3 sigue existiendo → $var3 = 200

    // ***********************************************************************************

    // Constantes en PHP

    // define("NUME", 25);     // Crea constante NUME = 25
    // $var1 += NUME;          // Suma 25 a $var1

    // const NUM1 = 56;        // Crea constante NUM1 = 56
    // $var1 + NUME;           // Suma pero NO asigna → inútil
    // $var1 += NUME1;         // Error: NUME1 no existe

    // ***********************************************************************************

    // Operadores

    $var = 15 / 2; // 7.5

    if ("25" == 25) {
        $var = "iguales";  // true
    }

    if ("25hola" == 25) {
        $var = "iguales";  // true
    }

    if ("25" === 25) {
        $var = "iguales"; // false
    }

    if ("25" != 25) {
        $var = "distintos"; // false
    }

    if ("25" !== 25) {
        $var = "iguales"; // true
    }

    // ***********************************************************************************

    $var = 14 > 25; // false
    $var = 14 < 25; // true
    $var = 14 <=> 25; // -1

    // ***********************************************************************************

    if (isset($var3)) {
        $var = $var3;       // Si $var3 existe → $var = $var3
    } else if (isset($mivar)) {
        $var = $mivar;      // Si $var3 NO existe pero $mivar sí → $var = $mivar
    } else {
        $var = 27;          // Si ninguno existe → $var = 27
    }

    $var = $var3 ?? $mivar ?? 27; // primer valor no null

    // ***********************************************************************************

    $var = 0b11111;     // 11111 (31)
    $var = $var >> 1;   // 01111 (15)
    $var = $var << 1;   // 11110 (30)

    $var = 0b1010 & 0b0101; // 0000 → 0
    /*
          1010
        & 0101
        ------
          0000
   */

    $var = 0b1010 | 0b0101; // 1111 → 15
    /*
          1010
        | 0101
        ------
          1111
    */

    /*
        AND → & → 1 solo si ambos son 1
        OR → | → 1 si alguno es 1
        XOR → ^ → 1 si son distintos
        NOT → ~ → invierte bits
        Shift left → << → desplaza a la izquierda (×2)
        Shift right → >> → desplaza a la derecha (÷2)
    */

    // ***********************************************************************************

    ?>
<?php
}
