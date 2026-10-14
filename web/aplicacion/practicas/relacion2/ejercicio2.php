<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 2";

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

// Creamos la cadena que nos piden
$cadena = "Está la niña en casa";

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($cadena);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 2.- Dada la cadena "Está la niña en casa" se pide:
 *      - Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me
 *      indica la posición del carácter mostrado. (quedaría algo así)
 *      NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si
 *      puedes hacerlo con substr para obtener los caracteres correctos. Prueba si puedes
 *      hacerlo con mb_substr para obtener los caracteres correctos. Comenta las formas no
 *      válidas para que pueda comprobar que lo has hecho.
 *      
 *      - Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena)
 *      con cada carácter en una línea distinta y con los espacios en blanco
 *      correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en
 *      mayúscula (0, 2, ...) y los impares en minúscula (1, 3, 5, ...), y extrayendo los
 *      caracteres con mb_substr.
 * 
 *      - Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea
 *      distinta
 * 
 *      - Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el
 *      espacio en blanco) por "/mujer "
 */

function cabecera() {}

function cuerpo($cadena)
{
    // ==========================================================
    // FORMA 0
    // ==========================================================

    // Obtengo todos los caracteres de la cadena en un array
    $caracteres = mb_str_split($cadena, 1, 'UTF-8');

    // Creo una variable para dar el espacio delantero a cada caracter
    $espacio = "";

    // Recorremos cada uno de los caracteres del array y los mostramos, un caracter por linea
    for ($i = 0; $i < count($caracteres); $i++) {
        echo $espacio . $caracteres[$i] . "<br>" . PHP_EOL;
        $espacio = $espacio . "&nbsp;";
    }

    // ==========================================================
    // FORMA 1 --> []
    // ==========================================================

    $espacio = "";

    for ($i = 0; $i < count($caracteres); $i++) {
        echo $espacio . $cadena[$i] . "<br>" . PHP_EOL;
        $espacio = $espacio . "&nbsp;";
    }

  

    // ==========================================================
    // FORMA 2 --> substr
    // ==========================================================

    

    // ==========================================================
    // FORMA 3 --> mb_substr
    // ==========================================================

    // // [] : primer carácter
    // $palabra = "Hola";
    // echo $palabra[0]; // H

    // // substr : 3 caracteres desde la posición 1
    // echo substr("Mundo", 1, 3); // und

    // // mb_substr : un carácter con tilde
    // echo mb_substr("camión", 4, 1, 'UTF-8'); // ó
}
