<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Relación 4";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    $titulo => "./index.php"
];

// ==========================================================
// CONTROLADOR
// ==========================================================

$instrumentoViento1 = new InstrumentoViento();

// Creamos un instrumento de viento con los valores por defecto
$instrumentoViento1 = new InstrumentoViento();
// Creamos otro instrumento de viento con los valores que nosotros queramos
$instrumentoViento2 = new InstrumentoViento("metal", "2");

// ================================

// Creamos una flauta con los valores por defecto
$flauta1 = Flauta::CrearDesdeArray();
// Creamos una flauta indicando solo el material, la edad será por defecto
$flauta2 = Flauta::CrearDesdeArray(["material" => "metal"]);
// Creamos una flauta indicando solo la edad, el material será por defecto
$flauta3 = Flauta::CrearDesdeArray(["edad" => 2]);
// Creamos una flauta con los valores que nosotros queramos
$flauta4 = Flauta::CrearDesdeArray(["material" => "metal", "edad" => 2]);

// Clonamos dos flautas
$flauta5 = clone $flauta1;
$flauta6 = clone $flauta4;

// ================================

$persona1 = Persona::registrarPersona("Jorge", "19/03/2006", "Antequera", "Antequera", EstadoCivil::pareja);

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
    $instrumentoViento1,
    $instrumentoViento2,
    $flauta1,
    $flauta2,
    $flauta3,
    $flauta4,
    $flauta5,
    $flauta6,
    $persona1
);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo(
    InstrumentoViento $instrumentoViento1,
    InstrumentoViento $instrumentoViento2,
    Flauta $flauta1,
    Flauta $flauta2,
    Flauta $flauta3,
    Flauta $flauta4,
    Flauta $flauta5,
    Flauta $flauta6,
    Persona $persona1
) {
    echo "<h3>1. InstrumentoBase</h3>";
    echo "<p>No muestra nada</p>";

    echo "<h3>2. IFabricable</h3>";
    echo "<p>No muestra nada</p>";

    echo "<h3>3. InstrumentoViento</h3>";
    echo $instrumentoViento1 . "<br><br>" . PHP_EOL;
    echo $instrumentoViento2;

    echo "<h3>4. Flauta</h3>";
    echo $flauta1 . "<br><br>" . PHP_EOL;
    echo $flauta2 . "<br><br>" . PHP_EOL;
    echo $flauta3 . "<br><br>" . PHP_EOL;
    echo $flauta4 . "<br><br>" . PHP_EOL;
    echo $flauta5 . "<br><br>" . PHP_EOL;
    echo $flauta6;

    // Métodos de la interfaz IFabricable
    // Métodos heredados de InstrumentoViento

    echo "<h3>5. EstadoCivil</h3>";
    echo "<p>No muestra nada</p>";

    echo "<h3>5. Persona</h3>";
    echo $persona1 . "<br><br>" . PHP_EOL;

    echo "<h3>6. SerieFibonacci</h3>";

    echo "<h3>7. ClaseMisPropiedades</h3>";
}
