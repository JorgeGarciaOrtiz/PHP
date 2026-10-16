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
<h1>Información tienda</h1>
<p>aaClientes: 12</p>
<b>Pedidos: 102</b>aa
Empleados: 2aa
Correo: jorge@mail.com
Correo: carlos@mail.comaa
fin;

// Define expresiones regulares apropiadas para localizar los distintos elementos creados
// (etiqueta, numero y dirección de email) en la cadena.

$etiquetas = "";

// Obtengo el número total de etiquetas html
$numeroEtiquetas = preg_match_all('/aa/', $cadena, $r);

for ($i = 0; $i < $numeroEtiquetas; $i++) {
    if (preg_match('/aa/', $cadena, $r)) {
        $etiquetas = $etiquetas . $r[$i];
    }
}

// Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
// función preg_match.

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($etiquetas);
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

function cuerpo(string $etiquetas)
{
    echo $etiquetas;
}
