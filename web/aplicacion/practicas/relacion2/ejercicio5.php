<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 5";

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

// Creo una cadena con HEREDOC
$cadena = <<<fin
<h3>Información tienda</h3>
<p>Clientes: 12</p>
<b>Pedidos: 102</b>
<b>Empleados: 2</b>
Correo: jorge@mail.com
Correo: carlos@mail.com
fin;

// Defino las expresiones regulares
$expresionRegularEtiquetas = '/<\/{0,1}\w+>/';
$expresionRegularNumeros = '/(?<![h])[0-9]+/';
$expresionRegularEmails = '/\S*@\S*/';

$etiqueta = "";
$numero = "";
$email = "";

// Encuentro la primera etiqueta de la cadena
if (preg_match($expresionRegularEtiquetas, $cadena, $encontrado, PREG_OFFSET_CAPTURE)) {
    $etiqueta = $encontrado[0][0] . " en la posición: " . $encontrado[0][1];
}

// Encuentro el primer número de la cadena
if (preg_match($expresionRegularNumeros, $cadena, $encontrado, PREG_OFFSET_CAPTURE)) {
    $numero = $encontrado[0][0] . " en la posición: " . $encontrado[0][1];
}

// Encuentro el primer email de la cadena
if (preg_match($expresionRegularEmails, $cadena, $encontrado, PREG_OFFSET_CAPTURE)) {
    $email = $encontrado[0][0] . " en la posición: " . $encontrado[0][1];
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
cuerpo($etiqueta, $numero, $email);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 5.- Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe
 * aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias direcciones
 * de correo electrónico (formato aaaa@aaaa.aa).
 * Define expresiones regulares apropiadas para localizar los distintos elementos creados
 * (etiqueta, numero y dirección de email) en la cadena.
 * Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
 * función preg_match.
 */

function cabecera() {}

function cuerpo(string $etiqueta, string $numero, string $email)
{
    echo "<h3>Etiqueta HTML</h3>";
    echo (htmlspecialchars($etiqueta)) . "<br>" . PHP_EOL;

    echo "<h3>Número</h3>";
    echo $numero . "<br>" . PHP_EOL;

    echo "<h3>Correo electronico</h3>";
    echo $email . "<br>" . PHP_EOL;
}