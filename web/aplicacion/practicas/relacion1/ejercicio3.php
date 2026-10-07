<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// ---------------------------------------------------------
// 1. Crear y rellenar el array usando varias sentencias.
// ---------------------------------------------------------

// a) Crear una variable de tipo array.
$array1 = [];

// b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
$array1[1] = true;
$array1[16] = -0.7;
$array1[54] = 850;

// d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
$array1["uno"] = "cadena";
$array1["dos"] = true;
$array1["tres"] = 1.345;

// e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
$array1["ultima"] = [1, 34, "nueva"];

// c) Añadir el valor 34 al final
$array1[] = 34;

// ---------------------------------------------------------
// 2. Crear y rellenar el array usando una sola sentencia con array.
// ---------------------------------------------------------

// a) Crear una variable de tipo array.
$array2 = array(

    // b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
    1 => true,
    16 => -0.7,
    54 => 850,

    // d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,

    // e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
    "ultima" => array(1, 34, "nueva"),

    // c) Añadir el valor 34 al final
    34
);

// ---------------------------------------------------------
// 3. Crear y rellenar el array usando una sola sentencia con [].
// ---------------------------------------------------------

// a) Crear una variable de tipo array.
$array3 = [

    // b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
    1 => true,
    16 => -0.7,
    54 => 850,

    // d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,

    // e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
    "ultima" => [1, 34, "nueva"],

    // c) Añadir el valor 34 al final
    34
];

// Creo un array para guardar dentro todos los arrays creados antes
$arrays = [$array1, $array2, $array3];

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 3");
cuerpo($arrays);

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 3.- Se quiere:
 * a) Crear una variable de tipo array.
 * b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
 * c) Añadir el valor 34 al final
 * d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
 * e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
 *      - 1. Hacer lo anterior creando y rellenando el array usando varias sentencias.
 *      - 2. Hacer lo anterior usando una sola sentencia con array;
 *      - 3. Hacer lo anterior usando una sola sentencia con []
 *      - 4. Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados
 * Los arrays se definirán en el controlador y se visualizarán en la vista.
 */

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo($arrays)
{
    // ---------------------------------------------------------
    // 4. Recorrer los tres arrays usando foreach mostrando todos sus valores.
    // ---------------------------------------------------------

    // Recorro cada uno de los arrays para poder poder mostrar uno por uno sus valores internos
    for ($i = 0; $i < count($arrays); $i++) {

        // Pongo esto para separar entre arrays y quede mejor visualmente
        echo "Array " . ($i + 1) . ":<br>";

        // Empiezo a leer los valores internos del array
        foreach ($arrays[$i] as $v1) {

            // Si no es un array:
            if (!is_array($v1)) {
                // Muestro su valor
                echo $v1 . "<br>";

                // En el caso de que si sea un array:
            } else {

                // Recorro los valores de este nuevo array (este array esta dentro del array principal)
                foreach ($v1 as $v2) {
                    // Y los muestro
                    echo $v2 . "<br>";
                }
            }
        }
        echo "<br><br>";
    }
}
