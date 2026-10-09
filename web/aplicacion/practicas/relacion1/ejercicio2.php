<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Relacion 1" => "./index.php",
    "Ejercicio 2" => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creo una cosntante con el número de lanzamientos
const numeroLanzamientos = 1000;
// Creo una constante con el número de caras del dado
const carasDado = 6;

// Creo el array donde tendremos las veces que ha salido cada cara
$array = [0, 0, 0, 0, 0, 0];

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo("Ejercicio 2", $ubicacion);
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

function cabecera() {}

function cuerpo($array)
{
    // Añadimos un titulo
    echo "<h2>LANZAMIENTO DE UN DADO</h2>";

    // Recorro un bucle para tirar el dado 6 veces
    for ($i = 0; $i < carasDado; $i++) {

        // Creo un número aleatorio del 1 al 6 (el resultado es la cara que sale)
        $numeroAleatorio = mt_rand(1, carasDado);

        // Muestro los 6 resultados por pantalla
        echo "Lanzamiento " . ($i + 1) . " del dado: " . $numeroAleatorio . "<br>";
    }

    // Añadimos el número de veces que se ha lanzado el dado
    echo "<br>Lanzado el dado " . numeroLanzamientos . " veces<br>";

    // Creo una variable contador
    $contador = 1;

    // Mientras el contador sea menor que el numero de lanzamientos que vamos a realizar se seguira ejecuntado el codigo
    while ($contador <= numeroLanzamientos) {

        // Añadimos un uno al contador
        $contador++;

        // Creamos un número aleatorio del 1 al 6 (mt_rand() sin parametros)
        $numeroAleatorio = (mt_rand() % carasDado) + 1;

        /*
            En función de la cara que nos salga, sumamos 1 al contador de esa cara
            Ejemplo: si sale un 4, la posición 3 guarda las veces que sale el 4
        */
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

    // Recorro el array de contadores, una posición por cada cara del dado
    for ($i = 0; $i < carasDado; $i++) {
        
        // Muestro cuántas veces ha salido la cara y su porcentaje sobre el total de lanzamientos
        echo "El número " . $i+1 . " ha salido: " . $array[$i] . " veces con un porcentaje de "
            . number_format(($array[$i] / numeroLanzamientos) * 100, 2) . "%<br>";
    }
}
