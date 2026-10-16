<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 3";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 2" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Variable con el número de caracteres que tendrá la cadena
const numeroCaracteresCadena = 20;

// ----------------------------------------------------------

// Array con todos los caracteres que se pueden usar
$caracteres = [
    "q",
    "w",
    "e",
    "r",
    "t",
    "y",
    "u",
    "i",
    "o",
    "p",
    "a",
    "s",
    "d",
    "f",
    "g",
    "h",
    "j",
    "k",
    "l",
    "ñ",
    "z",
    "x",
    "c",
    "v",
    "b",
    "n",
    "m",
    "Q",
    "W",
    "E",
    "R",
    "T",
    "Y",
    "U",
    "I",
    "O",
    "P",
    "A",
    "S",
    "D",
    "F",
    "G",
    "H",
    "J",
    "K",
    "L",
    "Ñ",
    "Z",
    "X",
    "C",
    "V",
    "B",
    "N",
    "M",
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "0"
];

$cadenaAleatoria1 = "";

// Bucle que se repite tantas veces como caracteres queramos que tenga la cadena
for ($i = 0; $i < numeroCaracteresCadena; $i++) {

    // Número aleatorio entre 0 y la última posición del array
    $numeroAleatorio = mt_rand(0, count($caracteres) - 1);

    // Cogemos el carácter de esa posición y lo añadimos a la cadena
    $cadenaAleatoria1 = $cadenaAleatoria1 . $caracteres[$numeroAleatorio];
}

// ----------------------------------------------------------

$cadenaAleatoria2 = "";

// Contador de los caracteres válidos que llevamos añadidos
$cont = 0;

// Repetimos mientras no tengamos al número de caracteres que queremos
while ($cont < numeroCaracteresCadena) {

    // Número aleatorio del código ASCII
    $numeroAleatorio = mt_rand(0, 255);

    // Comprobamos si ese código corresponde a una letra o a un número
    if (ctype_alnum(chr($numeroAleatorio))) {
        $cont++;

        // Convertimos el número en su carácter ASCII y lo añadimos a la cadena
        $cadenaAleatoria2 = $cadenaAleatoria2 . chr($numeroAleatorio);
    }
}

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($cadenaAleatoria1, $cadenaAleatoria2);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
 * minúsculas, letras mayúsculas y números)
 *      a) A partir de un array en el que están todos los caracteres posibles que cumplen la
 *      condición. (tienes que rellenar el array con todos los caracteres validos)
 *      b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
 *      caracteres que no lo cumplan).
 */

function cabecera() {}

function cuerpo(string $cadenaAleatoria1, string $cadenaAleatoria2)
{
    echo $cadenaAleatoria1 . "<br>" . PHP_EOL;
    echo $cadenaAleatoria2;
}
