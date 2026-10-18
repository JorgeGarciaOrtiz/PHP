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

function cuerpo(string $cadena)
{
    // ==========================================================
    // FORMA 1 --> []
    // No es valida por que "á" y "ñ" ocupan 2 bytes en UTF-8,
    // así que se parten en dos y se muestran caracteres rotos.
    // ==========================================================

    // $espacio = "";
    // for ($i = 0; $i < strlen($cadena); $i++) {
    //     echo $espacio . $cadena[$i] . "<br>" . PHP_EOL;
    //     $espacio = $espacio . "&nbsp;";
    // }

    // ==========================================================
    // FORMA 2 --> substr($cadena, desde, cuantos)
    // No es valida por que "á" y "ñ" ocupan 2 bytes en UTF-8,
    // así que se parten en dos y se muestran caracteres rotos.
    // ==========================================================

    // $espacio = "";
    // for ($i = 0; $i < strlen($cadena); $i++) {
    //     echo $espacio . substr($cadena, $i, 1) . "<br>" . PHP_EOL;
    //     $espacio = $espacio . "&nbsp;";
    // }

    // ==========================================================
    // FORMA 3 --> mb_substr($cadena, desde, cuantos)
    // VÁLIDA: trabaja con caracteres.
    // ==========================================================

    // Mostramos los caracteres uno por uno en el formato pedido
    $espacio = "";
    for ($i = 0; $i < mb_strlen($cadena); $i++) {
        echo $espacio . mb_substr($cadena, $i, 1, 'UTF-8') . "<br>" . PHP_EOL;
        $espacio = $espacio . "&nbsp;";
    }

    echo "<hr>";

    // Mostramos los mismos caracteres pero de forma inversa
    $espacio = "";
    for ($i = mb_strlen($cadena) - 1; $i >= 0; $i--) {

        // Si la posición es par muestro el carácter en mayúscula y si es impar en minúscula
        echo $espacio . ($i % 2 == 0 ?
            mb_strtoupper(mb_substr($cadena, $i, 1, 'UTF-8')) :
            mb_strtolower(mb_substr($cadena, $i, 1, 'UTF-8'))) . "<br>" . PHP_EOL;

        $espacio = $espacio . "&nbsp;";
    }

    echo "<hr>";

    // Cortamos la cadena cuando encontremos el caracter "a"
    $espacio = "";
    for ($i = 0; $i < strlen($cadena); $i++) {

        $cadenaCortada = "";

        // Muestro el carácter de la posición $i
        echo $cadenaCortada = $cadenaCortada . mb_substr($cadena, $i, 1, 'UTF-8');

        // Si es una "a", muestro un salto de línea
        if (mb_substr($cadena, $i, 1, 'UTF-8') == "a") {
            echo $cadenaCortada = "<br>";
        }
    }

    echo "<hr>";

    // Intercambiamos el caracter vacio que hay despues de "niña" por "/mujer"
    $nuevaCadena = str_replace("niña ", "niña/mujer ", $cadena);
    echo $nuevaCadena;
}
