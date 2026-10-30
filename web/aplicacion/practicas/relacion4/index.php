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

// Creamos un instrumento de viento con los valores por defecto
$instrumentoViento1 = new InstrumentoViento();
// Creamos otro instrumento de viento con los valores que nosotros queramos
$instrumentoViento2 = new InstrumentoViento("metal", 2);

// ------------------------------------------------

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

// ------------------------------------------------

// Obtenemos un estado aleatorio
$estadosCiviles = EstadoCivil::cases();
$numeroAleatorio1 = random_int(0, count($estadosCiviles) - 1);
$numeroAleatorio2 = random_int(0, count($estadosCiviles) - 1);

// Creamos una persona con sus datos
$persona1 = Persona::registrarPersona(
    "Jorge García Ortiz",
    "19/03/2006",
    "Calle Juan Pablo II",
    "Antequera",
    $estadosCiviles[$numeroAleatorio1]
);

// Creamos otra persona con sus datos
$persona2 = Persona::registrarPersona(
    "Daily Nicolle Leiva Paz",
    "05/11/1995",
    "Avenida de la Estación 8",
    "Málaga",
    $estadosCiviles[$numeroAleatorio2]
);

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
    $persona1,
    $persona2
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
    Persona $persona1,
    Persona $persona2
) {
    echo "<h3>1. InstrumentoBase</h3>";
    echo "<p>Clase abstracta: se prueba a través de InstrumentoViento y Flauta.</p>" . PHP_EOL;

    // ------------------------------------------------

    echo "<h3>2. IFabricable</h3>";
    echo "<p>Interfaz: se prueba en Flauta.</p>" . PHP_EOL;

    // ------------------------------------------------

    echo "<h3>3. InstrumentoViento</h3>";
    echo $instrumentoViento1 . "<br><br>" . PHP_EOL;
    echo $instrumentoViento2;

    // ------------------------------------------------

    echo "<h3>4. Flauta</h3>";
    echo $flauta1 . "<br><br>" . PHP_EOL;
    echo $flauta2 . "<br><br>" . PHP_EOL;
    echo $flauta3 . "<br><br>" . PHP_EOL;
    echo $flauta4 . "<br><br>" . PHP_EOL;
    echo $flauta5 . "<br><br>" . PHP_EOL;
    echo $flauta6 . "<br><br>" . PHP_EOL;
    echo "Sonido: " . $flauta6->sonido() . "<br>" . PHP_EOL;
    echo "Afinar: " . $flauta6->afinar() . "<br>" . PHP_EOL;
    echo "Método de fabricación: " . $flauta6->metodoFabricacion() . "<br>" . PHP_EOL;
    echo "Método de reciclado: " . $flauta6->metodoReciclado();

    // ------------------------------------------------

    echo "<h3>5. EstadoCivil</h3>";
    echo "<p>Enumeración: se prueba en Persona, que usa casos() y descripcion().</p>" . PHP_EOL;

    echo "<h3>5. Persona</h3>";
    echo $persona1 . "<br>" . PHP_EOL;
    echo $persona2;

    // ------------------------------------------------

    echo "<h3>6. SerieFibonacci</h3>";

    foreach (new SerieFibonacci(10) as $valor) {
        echo $valor . "&nbsp";
    }

    echo "<br>" . PHP_EOL;

    foreach (SerieFibonacci::fFibonacci(10) as $valor) {
        echo $valor . "&nbsp";
    }

    // ------------------------------------------------

    echo "<h3>7. ClaseMisPropiedades</h3>";
}
