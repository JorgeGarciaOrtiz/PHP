<?php

// Incluyo la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el título
$titulo = "Ejercicios";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 7" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Obtengo la ip con "_"
$dirip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);
// Obtengo solo el nombre del navegador
$navegador = encontrarNavegador($_SERVER["HTTP_USER_AGENT"] ?? "");

// Ruta del fichero
$rutaFichero = __DIR__ . "/datos/puntos_" .  $dirip . "_" .  $navegador . ".dat";

// Creo un fichero con los puntos solo si no hay otro igual
if (!file_exists($rutaFichero)) {
    file_put_contents($rutaFichero, "");
}

// Leo el fichero y cargo sus puntos en el array de puntos
leerFichero($rutaFichero, $puntos);

// Ruta de la imagen
$ruta = "/imagenes/puntos/imagen_" .  $dirip . "_" .  $navegador . ".jpg";

// Creo una imagen solo si no hay otra igual
if (!file_exists(RUTABASE . $ruta)) {
    crearImagen($dirip, $navegador, $puntos);
}

// ----------------------------------------------------------

// Creo un array con los colores (es una copia)
$colores = Punto::COLORES;

// Creo un array con los grosores (es una copia)
$grosores = Punto::GROSORES;

// Creo un array con los datos del formulario
$datos = [
    "coordenadaX" => 0,
    "coordenadaY" => 0,
    "color" => "",
    "grosor" => 0
];

// Creo un array con los errores
$errores = [];

// Si se ha pulsado el botón para crear un punto:
if (isset($_POST["crearPunto"])) {

    // Creo la coordenada 'x' con el valor inicial del array de datos
    $coordenadaX = $datos["coordenadaX"];

    // Si la coordenada 'x' ha llegado desde el formulario y es un número:
    if (isset($_POST["coordenadaX"]) && is_numeric($_POST["coordenadaX"])) {
        // Asigno el valor del formulario convertido a int
        $coordenadaX = (int) $_POST["coordenadaX"];
        // Si no, dará error
    } else {
        $errores["coordenadaX"][] = "Debe de introducir el valor de x";
    }

    // Si la coordenada 'x' no está entre 0 y 500 dará error
    if (!validaEntero($coordenadaX, 0, 500, $coordenadaX)) {
        $errores["coordenadaX"][] = "La coordenada 'x' debe de ser mayor a cero 0 y menor de 500";
    }

    // Guardo la coordenada 'x' para mostrarla en el formulario
    $datos["coordenadaX"] = $coordenadaX;

    // ==========================================================

    // Creo la coordenada 'y' con el valor inicial del array de datos
    $coordenadaY = $datos["coordenadaY"];

    // Si la coordenada 'y' ha llegado desde el formulario y es un número:
    if (isset($_POST["coordenadaY"]) && is_numeric($_POST["coordenadaY"])) {
        // Asigno el valor del formulario convertido a int
        $coordenadaY = (int) $_POST["coordenadaY"];
        // Si no, dará error
    } else {
        $errores["coordenadaY"][] = "Debe de introducir el valor de y";
    }

    // Si la coordenada 'y' no está entre 0 y 500 dará error
    if (!validaEntero($coordenadaY, 0, 500, $coordenadaY)) {
        $errores["coordenadaY"][] = "La coordenada 'y' debe de ser mayor a cero 0 y menor de 500";
    }

    // Guardo la coordenada 'y' para mostrarla en el formulario
    $datos["coordenadaY"] = $coordenadaY;

    // ==========================================================

    // Creo el color con el valor inicial del array de datos
    $color = $datos["color"];

    // Si el color ha llegado desde el formulario:
    if (isset($_POST["color"])) {

        // Asigno el valor del formulario
        $color = $_POST["color"];
    }

    // Si no se ha elegido ningún color dará error
    if ($color === "") {
        $errores["color"][] = "Debes introducir un color";

        // Si el color no es una de las opciones dará error
    } else if (!validaRango($color, $colores, 2)) {
        $errores["color"][] = "El color seleccionado no existe";
    }

    // Guardo el color para mostrarlo en el formulario
    $datos["color"] = $color;

    // ==========================================================

    // Creo el grosor con el valor inicial del array de datos
    $grosor = $datos["grosor"];

    // Si el grosor ha llegado desde el formulario:
    if (isset($_POST["grosor"])) {

        // Asigno el valor del formulario convertido a int
        $grosor = (int) $_POST["grosor"];
    }

    // Si no se ha marcado ningún grosor dará error
    if ($grosor === 0) {
        $errores["grosor"][] = "Debes introducir un grosor";

        // Si el grosor no es una de las opciones dará error
    } else if (!validaRango($grosor, $grosores, 2)) {
        $errores["grosor"][] = "Debes introducir un grosor válido";
    }

    // Guardo el grosor para mostrarlo en el formulario
    $datos["grosor"] = $grosor;

    // ==========================================================

    // Si no hay ningún error, añado la información del punto al fichero, leo el fichero 
    // para actualizar el array de puntos y creo la imagen con todos los puntos
    if (!$errores) {

        // Guardo toda la información 
        $info = $coordenadaX . " ; " . $coordenadaY . " ; " . $color . " ; " . $grosor;

        // Modifico el fichero ya creado con la nueva información
        añadirLinea($rutaFichero, $info);

        // Leo el fichero
        leerFichero($rutaFichero, $puntos);

        // Creo la imagen con los puntos
        crearImagen($dirip, $navegador, $puntos);

        // Recargo la página para que, al pulsar F5, no se vuelva a enviar el formulario
        header("location: index.php");
        exit;
    }
}

// Si se ha pulsado el botón de eliminar
if (isset($_POST["eliminar"])) {

    // Si ha llegado una posición del combo y es un número:
    if (isset($_POST["selectPuntos"]) && is_numeric($_POST["selectPuntos"])) {

        // Guardo la posición del punto a borrar como número entero
        $posicionPuntoBorrar = (int) $_POST["selectPuntos"];

        // Si la posición existe en el array de puntos:
        if ($posicionPuntoBorrar >= 0 && $posicionPuntoBorrar < count($puntos)) {

            // Como la posición elegida en el combo es la misma que la del array,
            // quito ese punto del array de puntos
            array_splice($puntos, $posicionPuntoBorrar, 1);

            // Borro todas las líneas del fichero
            file_put_contents($rutaFichero, "");

            // Ahora como está todo vacío vuelvo a añadir todos los puntos menos el que acabamos de quitar (pues ya no está en el array)
            for ($i = 0; $i < count($puntos); $i++) {
                $info = $puntos[$i]->getX() . " ; " . $puntos[$i]->getY() . " ; " . $puntos[$i]->getColor() . " ; " . $puntos[$i]->getGrosor();
                añadirLinea($rutaFichero, $info);
            }

            // Creo la imagen sin el punto eliminado
            crearImagen($dirip, $navegador, $puntos);

            // Recargo la página para que, al pulsar F5, no se vuelva a enviar el formulario.
            // Al recargar se vuelve a llamar a leerFichero (al principio del controlador) y se actualiza toda la página
            header("location: index.php");
            exit;
        }
    }
}

// Si se ha pulsado el botón de subir:
if (isset($_POST["subir"])) {

    // Guardo la información (nombre, ruta temporal, tamaño y error) del fichero subido 
    $fichero = $_FILES["archivo"];

    if (
        // La subida ha ido bien
        $fichero["error"] === 0 &&
        // El fichero no está vacío
        $fichero["size"] > 0 &&
        // La extensión es txt
        // Saco la extensión del nombre del fichero con PATHINFO_EXTENSION
        pathinfo($fichero["name"], PATHINFO_EXTENSION) === "txt"
    ) {
        // Abro el fichero en modo lectura
        // $fichero["tmp_name"] es la ruta temporal donde PHP guarda el fichero subido
        $fic = fopen($fichero["tmp_name"], "r");

        // Leo el fichero línea a línea
        while ($linea = fgets($fic)) {

            // Quito el retorno de carro del final de la línea
            $linea = str_replace("\r", "", $linea);
            // Quito el salto de línea del final de la línea
            $linea = str_replace("\n", "", $linea);

            // Si la línea no está vacía:
            if ($linea != "") {

                // Separo la línea en partes
                $linea = explode(" ; ", $linea);

                // Empiezo dando por mala la línea
                $añadir = false;

                // Si la línea tiene 4 partes es válida, si no no hago nada
                if (count($linea) === 4) {

                    // Doy la línea por buena y la marco como mala si después falla alguna comprobación
                    $añadir = true;

                    // Si 'x' no es un número entre 0 y 500, no es válida
                    if (!is_numeric($linea[0]) || $linea[0] > 500 || $linea[0] < 0) {
                        $añadir = false;
                    }

                    // Si 'y' no es un número entre 0 y 500, no es válida
                    if (!is_numeric($linea[1]) || $linea[1] > 500 || $linea[1] < 0) {
                        $añadir = false;
                    }

                    // Si el color no existe, no es válida
                    if (!array_key_exists($linea[2], PUNTO::COLORES)) {
                        $añadir = false;
                    }

                    // Si el grosor no existe, no es válida
                    if (!array_key_exists($linea[3], PUNTO::GROSORES)) {
                        $añadir = false;
                    }
                }

                // Si todo está bien guardo la nueva línea en el fichero que ya teníamos
                if ($añadir) {
                    // Guardo toda la información 
                    $info = $linea[0] . " ; " . $linea[1] . " ; " . $linea[2] . " ; " . $linea[3];
                    añadirLinea($rutaFichero, $info);
                }
            }
        }

        // Cierro el fichero
        fclose($fic);

        // Leo el fichero para actualizar el array de puntos
        leerFichero($rutaFichero, $puntos);

        // Creo la imagen con los puntos nuevos
        crearImagen($dirip, $navegador, $puntos);

        // Recargo la página para que, al pulsar F5, no se vuelva a enviar el formulario
        header("location: index.php");
        exit;
    }
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
cuerpo($datos, $colores, $errores, $puntos, $ruta);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

/**
 * Muestra la cabecera de la página
 *
 * @return void
 */
function cabecera() {}

/**
 * Muestra el cuerpo de la página
 *
 * @param array $datos Datos introducidos por el usuario
 * @param array $colores Todos los colores
 * @param array $errores Errores encontrados al validar
 * @param array $puntos Todos los puntos guardados
 * @param string $ruta Ruta de la imagen con los puntos
 * @return void
 */
function cuerpo(
    array $datos,
    array $colores,
    array $errores,
    array $puntos,
    string $ruta,
) {
    // Muestro el formulario con los datos y los errores
    formulario($datos, $colores, $errores, $puntos, $ruta,);
}

/**
 * Muestra los errores, si los hay, y el formulario con los datos introducidos.
 *
 * @param array $datos Datos introducidos por el usuario
 * @param array $colores Todos los colores
 * @param array $errores Errores encontrados al validar
 * @param array $puntos Todos los puntos guardados
 * @param string $ruta Ruta de la imagen con los puntos
 * @return void
 */
function formulario(
    array $datos,
    array $colores,
    array $errores,
    array $puntos,
    string $ruta,
) {
?>
    <!-- Formulario -->
    <form action="" method="post" enctype="multipart/form-data"> <!-- multipart/form-data permite subir ficheros -->

        <h2>Formulario</h2>

        <!-- Input para introducir la coordenada 'x' -->
        <label for="coordenadaX">Coordenada X: </label>
        <input type="number" name="coordenadaX" id="coordenadaX" min="0" max="500"
            value="<?php echo $datos["coordenadaX"]; ?>">

        <!-- Errores de la coordenada 'x' -->
        <?php
        if (isset($errores["coordenadaX"])) {
            echo "<div class='error'>";
            for ($i = 0; $i < count($errores["coordenadaX"]); $i++) {
                echo $errores["coordenadaX"][$i] . PHP_EOL;
            }
            echo "</div>";
        }
        ?>

        <!-- Input para introducir la coordenada 'y' -->
        <br><label for="coordenadaY">Coordenada Y: </label>
        <input type="number" name="coordenadaY" id="coordenadaY" min="0" max="500"
            value="<?php echo $datos["coordenadaY"]; ?>">

        <!-- Errores de la coordenada 'y' -->
        <?php
        if (isset($errores["coordenadaY"])) {
            echo "<div class='error'>";
            for ($i = 0; $i < count($errores["coordenadaY"]); $i++) {
                echo $errores["coordenadaY"][$i] . PHP_EOL;
            }
            echo "</div>";
        }
        ?>

        <!-- ComboBox para elegir el color -->
        <br><label for="color">Color: </label>
        <select name="color">
            <?php foreach ($colores as $clave => $valor) { ?>
                <option value="<?php echo $clave ?>" <?php if ($datos["color"] == $clave) { ?> selected <?php } ?>>
                    <?php echo $valor["nombre"] ?>
                </option>
            <?php } ?>
        </select>

        <!-- Errores del color -->
        <?php
        if (isset($errores["color"])) {
            echo "<div class='error'>";
            for ($i = 0; $i < count($errores["color"]); $i++) {
                echo $errores["color"][$i] . PHP_EOL;
            }
            echo "</div>";
        }
        ?>

        <!-- Radio buttons para elegir el grosor -->
        <br><label for="grosor">Grosor: </label>
        <br><input type="radio" name="grosor" id="fino" value=1
            <?php if ($datos["grosor"] == 1) echo "checked"; ?>>
        <label for="fino">Fino</label>
        <input type="radio" name="grosor" id="medio" value=2
            <?php if ($datos["grosor"] == 2) echo "checked"; ?>>
        <label for="medio">Medio</label>
        <input type="radio" name="grosor" id="grueso" value=3
            <?php if ($datos["grosor"] == 3) echo "checked"; ?>>
        <label for="grueso">Grueso</label>

        <!-- Errores del grosor -->
        <?php
        if (isset($errores["grosor"])) {
            echo "<div class='error'>";
            for ($i = 0; $i < count($errores["grosor"]); $i++) {
                echo $errores["grosor"][$i] . PHP_EOL;
            }
            echo "</div>";
        }
        ?>

        <!-- Botón -->
        <br><br><input type="submit" name="crearPunto" value="Añadir punto">

        <!-- ========================================================== -->

        <h2>Borrar punto</h2>
        <!-- Combo con todos los puntos -->

        <select name="selectPuntos">
            <?php for ($i = 0; $i < count($puntos); $i++) { ?>
                <option value="<?php echo $i ?>">
                    <?php echo $puntos[$i]->getX() . ";" . $puntos[$i]->getY() . ";" . $puntos[$i]->getColor() . ";" . $puntos[$i]->getGrosor() ?>
                </option>
            <?php } ?>
        </select>

        <!-- Botón para eliminar el punto elegido -->
        <input type="submit" name="eliminar" value="Eliminar">

        <!-- ========================================================== -->

        <h2>Resumen de puntos</h2>
        <!-- Textarea con el resumen de todos los puntos -->
        <textarea readonly name="texto" rows="6" cols="40"><?php foreach ($puntos as $clave => $valor) { ?><?php echo $valor->getX() . ", " . $valor->getY() . ", " . $valor->getColor() . ", " . $valor->getGrosor() . "\n" ?><?php } ?></textarea>

        <!-- ========================================================== -->
        
        <h2>Subir ficheros de puntos</h2>

        <label for="archivo">Fichero: </label>

        <!-- Input para elegir el fichero de puntos (solo deja elegir ficheros .txt) -->
        <input type="file" name="archivo" id="archivo" accept=".txt">
        
        <!-- Botón para subir el fichero -->
        <br><input type="submit" name="subir" value="Subir">

        <!-- ========================================================== -->

        <h2>Imagen</h2>

        <!-- Imagen con los puntos (añado ?time() a la ruta para que el navegador no use una copia guardada y la pida siempre de nuevo) -->
        <img src="<?php echo $ruta . "?" . time() ?>" alt="Imagen">
        
        <!-- Enlace para descargar la imagen -->
        <br><a href="imagen.php">Descargar imagen</a>

    </form>
<?php
}
