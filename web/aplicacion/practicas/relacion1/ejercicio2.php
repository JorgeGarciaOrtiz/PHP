<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creo una cosntante con el numero de lanzamientos
const numeroLanzamientos = 1000;
// Creo una constante con el numero de caras del dado
const carasDado = 6;

// Creo el array
$array = [0, 0, 0, 0, 0, 0];

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo("Ejercicio 2");
cuerpo($array);

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * 2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for, mt_rand con parametros). Además
 * contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo (N lo
 * definiremos como constante) (usar un bucle while, mt_rand sin parametros).
 * Se deben usar arrays para almacenar los datos de las tiradas. Los arrays deben obtenerse en la
 * parte del controlador y visualizarse los resultados en la vista. Los arrays se pasarán como parámetros a la
 * vista (nunca como variables globales)
 */

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo($array)
{
    // Pongo un titulo
    echo "<h2>LANZAMIENTO DE UN DADO</h2>";

    for ($i = 0; $i < carasDado; $i++) {

        $numeroAleatorio = mt_rand(1, carasDado);

        echo "Lanzamiento " . ($i + 1) . " del dado: " . $numeroAleatorio . "<br>";
    }

    echo "<br>Lanzado el dado " . numeroLanzamientos . " veces<br>";

    $contador = 1;
    while ($contador <= numeroLanzamientos) {

        $contador++;

        // $numeroAleatorio = mt_rand(1, carasDado); // Forma normal
        $numeroAleatorio = (mt_rand() % carasDado) + 1; // Como lo pide el enunciado

        switch ($numeroAleatorio) {
            case 1:
                $array[0] += 1;
                break;

            case 2:
                $array[1] += 1;
                break;

            case 3:
                $array[2] += 1;
                break;

            case 4:
                $array[3] += 1;
                break;

            case 5:
                $array[4] += 1;
                break;

            case 6:
                $array[5] += 1;
                break;

            default:
                break;
        }
    }

    for ($i = 0; $i < carasDado; $i++) {

        echo "El número 1 ha salido: " . $array[0] . " veces con un porcentaje de "
            . number_format(($array[0] / numeroLanzamientos) * 100, 2) . "%<br>";
    }
}
