<?php

/**
 * Función que lee un fichero de puntos, crea un objeto Punto por cada línea y los guarda en el array
 * 
 * @param string $ruta Ruta del fichero
 * @param array $datos Array que se rellena con los puntos leidos
 * @return bool Devuelve true si se ha leido bien, false si no se pudo abrir el fichero
 */
function leerFichero(string $ruta, array &$datos): bool
{
    // Se abre el fichero para leer (tiene que existir)
    $fic = fopen($ruta, "r");

    // Si no se pudo abrir, se sale de la función con false
    if (!$fic) {
        return false;
    }

    // Se vacía el array antes de rellenarlo
    $datos = [];

    // Se lee el fichero línea a línea hasta que no queden más
    while ($linea = fgets($fic)) {

        // Se quitan los saltos de línea del final
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);

        // Si la línea no está vacía
        if ($linea != "") {

            // Se separa la línea en trozos
            $linea = explode(" ; ", $linea);

            // Creo un punto con los valores de la línea
            $nuevoPunto = new Punto((int) $linea[0], (int) $linea[1], $linea[2], (int) $linea[3]);

            // Añado el punto al array de puntos
            $datos[] = $nuevoPunto;
        }
    }

    // Se cierra el fichero
    fclose($fic);

    // Todo ha ido bien
    return true;
}

/**
 * Añade una línea al final del fichero
 *
 * @param string $rutaFichero Ruta del fichero
 * @param string $linea Línea que se va a añadir
 * @return void
 */
function añadirLinea(string $rutaFichero, string $linea): void
{
    // Abro el fichero para añadir al final sin borrar lo que ya tiene
    $f = fopen($rutaFichero, "a");

    // Escribo la línea con su salto de línea
    fputs($f,  $linea . PHP_EOL);

    // Cierro el fichero
    fclose($f);
}
