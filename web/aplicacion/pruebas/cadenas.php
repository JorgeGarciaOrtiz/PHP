<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Variable con el titulo
$titulo = "Pruebas de cadenas";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

$cadena = "el día 26 de Octubre de 2026 Lamine Yamal será el ganador del balón de oro.       ";

// Ninguna de estas funciones cambia $cadena. Todas devuelven
// un resultado nuevo y dejan la original intacta.

// ==========================================================
// strlen: devuelve la longitud de una cadena en bytes
// ==========================================================

$strlen = "Con strlen: " . strlen($cadena) . "<br>";

// ==========================================================
// mb_strlen: devuelve la longitud de una cadena en caracteres
// ==========================================================

$mb_strlen = "Con mb_strlen: " . mb_strlen($cadena, 'UTF-8') . "<br>";

// ==========================================================
// ucfirst: convierte a mayúscula el primer carácter
// ==========================================================

$ucfirst = "";
$ucfirst = "Con ucfirst: " . ucfirst($cadena) . "<br>";

// ==========================================================
// strtolower: convierte una cadena a minúsculas
// ==========================================================

$strtolower = "Con strtolower: " . strtolower($cadena) . "<br>";

// ==========================================================
// strtoupper: convierte una cadena a mayúsculas
// ==========================================================

$strtoupper = "Con strtoupper: " . strtoupper($cadena) . "<br>";

// ==========================================================
// mb_strtolower: convierte una cadena a minúsculas 
// respetando UTF-8
// ==========================================================

$mb_strtolower = "Con mb_strtolower: " . mb_strtolower($cadena, 'UTF-8') . "<br>";

// ==========================================================
// mb_strtoupper: convierte una cadena a mayúsculas 
// respetando UTF-8
// ==========================================================

$mb_strtoupper = "Con mb_strtoupper: " . mb_strtoupper($cadena, 'UTF-8') . "<br>";

// ==========================================================
// strcmp: compara dos cadenas letra por letra (distingue mayúsculas de
// minúsculas) y se para en la primera diferencia.
//      0        --> son iguales
//      negativo --> $cadena va antes que $otraCadena en orden alfabético
//      positivo --> $cadena va después que $otraCadena en orden alfabético
// ==========================================================

$otraCadena = "El día 26...";

$strcmp = "Con strcmp: " . strcmp($cadena, $otraCadena) . "<br>";

// ==========================================================
// strpos: busca la posición de la primera coincidencia
// ==========================================================

$strpos = "";
$posicion = strpos($cadena, "Yamal");
if ($posicion !== false) {
    $strpos = "Con strpos: " . $posicion . "<br>";
}

// ==========================================================
// mb_strpos: busca la posición de la primera coincidencia
// respetando UTF-8 (empieza a contar desde 0 y cuenta letras)
// ==========================================================

$mb_strpos = "";
$posicion = mb_strpos($cadena, "Yamal", 0, 'UTF-8');
if ($posicion !== false) {
    $mb_strpos = "Con mb_strpos: " . $posicion . "<br>";
}

// ==========================================================
// str_replace: reemplaza texto dentro de una cadena
// ==========================================================

$str_replace = "Con str_replace: " . str_replace("Lamine Yamal", "Mbappe no ", $cadena) . "<br>";

// ==========================================================
// substr: extrae una parte de una cadena en bytes
// ==========================================================

$substr = "Con substr: " . substr($cadena, 0, 5) . "<br>";

// ==========================================================
// mb_substr: extrae una parte de una cadena respetando UTF-8
// ==========================================================

$mb_substr = "Con mb_substr: " . mb_substr($cadena, 0, 5, 'UTF-8') . "<br>";

// ==========================================================
// explode: convierte una cadena en un array
// ==========================================================

$partes = explode(" ", $cadena);
$explode = "Con explode: " . implode(" | ", $partes) . "<br>";

// ==========================================================
// implode: convierte un array en una cadena, uniendo sus
// elementos con un separador
// ==========================================================

$implode = "Con implode: " . implode(" ", $partes) . "<br>";

// ==========================================================
// trim: elimina espacios al principio y al final
// ==========================================================

$trim = "Con trim: [" . trim($cadena) . "]<br>" . PHP_EOL;

// ==========================================================
// strrev: invierte una cadena
// ==========================================================

$strrev = "";
$strrev = "Con strrev: " . strrev($cadena) . "<br>";

// ==========================================================
// strrev con UTF-8: invierte una cadena letra a letra
// respetando tildes y ñ
// ==========================================================

$mb_strrev = "";
$mb_strrev = "Con strrev UTF-8: " . implode('', array_reverse(mb_str_split($cadena, 1, 'UTF-8'))) . "<br>";

// ==========================================================
// str_word_count: cuenta las palabras de una cadena
// ==========================================================

$str_word_count = "";
$str_word_count = "Con str_word_count: " . str_word_count($cadena, 0, 'áéíóúñÁÉÍÓÚÑ') . "<br>";

// ==========================================================
// str_pad: rellena una cadena hasta una longitud determinada
// ==========================================================

$str_pad = "";
$str_pad = "Con str_pad: " . str_pad($cadena, strlen($cadena) + 5, "0", STR_PAD_LEFT) . "<br>";

// ==========================================================
// str_repeat: repite una cadena un número de veces
// ==========================================================

$str_repeat = "";
$str_repeat = "Con str_repeat: " . str_repeat("Hola ", 3) . "<br>";

// ==========================================================
// number_format: formatea un número
// ==========================================================

$number_format = "";
$number_format = "Con number_format: " . number_format(1234.56, 2, ',', '.') . "<br>";

// ==========================================================
// ctype_alnum: comprueba si una cadena contiene solo letras
// y números
// ==========================================================

$ctype_alnum = "";
$ctype_alnum = "Con ctype_alnum: " . (ctype_alnum("Hola123") ? "true" : "false") . "<br>";

// ==========================================================
// chr: convierte un código ASCII en un carácter
// ==========================================================

$chr = "";
$chr = "Con chr: " . chr(65) . "<br>";

// ==========================================================
// ord: convierte un carácter en su código ASCII
// (contrario de chr)
// ==========================================================

$ord = "";
$ord = "Con ord: " . ord("A") . "<br>";

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo(
    $cadena,
    $strlen,
    $mb_strlen,
    $ucfirst,
    $strtolower,
    $strtoupper,
    $mb_strtolower,
    $mb_strtoupper,
    $strcmp,
    $strpos,
    $mb_strpos,
    $str_replace,
    $substr,
    $mb_substr,
    $explode,
    $implode,
    $trim,
    $strrev,
    $mb_strrev,
    $str_word_count,
    $str_pad,
    $str_repeat,
    $number_format,
    $ctype_alnum,
    $chr,
    $ord
);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo(
    string $cadena,
    string $strlen,
    string $mb_strlen,
    string $ucfirst,
    string $strtolower,
    string $strtoupper,
    string $mb_strtolower,
    string $mb_strtoupper,
    string $strcmp,
    string $strpos,
    string $mb_strpos,
    string $str_replace,
    string $substr,
    string $mb_substr,
    string $explode,
    string $implode,
    string $trim,
    string $strrev,
    string $mb_strrev,
    string $str_word_count,
    string $str_pad,
    string $str_repeat,
    string $number_format,
    string $ctype_alnum,
    string $chr,
    string $ord
) {
    echo "<h4>" . $cadena . "</h4>";
    echo $strlen . "<br>" . PHP_EOL;
    echo $mb_strlen . "<br>" . PHP_EOL;
    echo $ucfirst . "<br>" . PHP_EOL;
    echo $strtolower . "<br>" . PHP_EOL;
    echo $strtoupper . "<br>" . PHP_EOL;
    echo $mb_strtolower . "<br>" . PHP_EOL;
    echo $mb_strtoupper . "<br>" . PHP_EOL;
    echo $strcmp . "<br>" . PHP_EOL;
    echo $strpos . "<br>" . PHP_EOL;
    echo $mb_strpos . "<br>" . PHP_EOL;
    echo $str_replace . "<br>" . PHP_EOL;
    echo $substr . "<br>" . PHP_EOL;
    echo $mb_substr . "<br>" . PHP_EOL;
    echo $explode . "<br>" . PHP_EOL;
    echo $implode . "<br>" . PHP_EOL;
    echo $trim . "<br>" . PHP_EOL;
    echo $strrev . "<br>" . PHP_EOL;
    echo $mb_strrev . "<br>" . PHP_EOL;
    echo $str_word_count . "<br>" . PHP_EOL;
    echo $str_pad . "<br>" . PHP_EOL;
    echo $str_repeat . "<br>" . PHP_EOL;
    echo $number_format . "<br>" . PHP_EOL;
    echo $ctype_alnum . "<br>" . PHP_EOL;
    echo $chr . "<br>" . PHP_EOL;
    echo $ord . "<br>" . PHP_EOL;
}
