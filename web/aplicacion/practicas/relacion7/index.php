<?php

// Incluyo la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
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

// Ruta de la imagen
$ruta = "/imagenes/puntos/imagen_" .  $dirip . "_" .  $navegador . ".jpg";

// Creo una imagen solo si no hay otra igual
if (!file_exists(RUTABASE . $ruta)) {
    crearImagen($dirip, $navegador, $puntos);
}

// Ruta deL fichero
$rutaFichero = __DIR__ . "/datos/puntos_" .  $dirip . "_" .  $navegador . ".dat";

// Creo un fichero con los puntos solo si no hay otro igual
if (!file_exists($rutaFichero)) {
    file_put_contents($rutaFichero, "");
}

// Leo el fichero y creo un punto nuevo
leerFichero($rutaFichero, $puntos);

// ----------------------------------------------------------

// Creo un array con los colores
$colores = Punto::COLORES;

// Creo un array con los grosores
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

// Si se ha pulsado el botón de enviar:
if (isset($_POST["enviar"])) {

    // Creo un punto de prueba para comprobar los datos con sus set
    $auxiliar = new Punto(5, 20, "red", 2);

    // ==========================================================

    // Creo la coordenada 'x' con el valor inicial del array de datos
    $coordenadaX = $datos["coordenadaX"];

    // Si la coordenada 'x' ha llegado desde el formulario y es un número:
    if (isset($_POST["coordenadaX"]) && is_numeric($_POST["coordenadaX"])) {
        // Asigno el valor del formulario convertido a int
        $coordenadaX = (int) $_POST["coordenadaX"];
    }

    // Si la coordenada 'x' no está entre 0 y 500 dará error
    if (!validaEntero($coordenadaX, 0, 500, $coordenadaX)) {
        $errores["coordenadaX"][] = "La coordenada 'x' debe de ser mayor a cero 0 y menor de 500";
    }

    // Guardamos la coordenada 'x' para mostrarla en el formulario
    $datos["coordenadaX"] = $coordenadaX;

    // ==========================================================

    // Creo la coordenada 'y' con el valor inicial del array de datos
    $coordenadaY = $datos["coordenadaY"];

    // Si la coordenada 'y' ha llegado desde el formulario y es un número:
    if (isset($_POST["coordenadaY"]) && is_numeric($_POST["coordenadaY"])) {
        // Asigno el valor del formulario convertido a int
        $coordenadaY = (int) $_POST["coordenadaY"];
    }

    // Si la coordenada 'y' no está entre 0 y 500 dará error
    if (!validaEntero($coordenadaY, 0, 500, $coordenadaY)) {
        $errores["coordenadaY"][] = "La coordenada 'y' debe de ser mayor a cero 0 y menor de 500";
    }

    // Guardamos la coordenada 'y' para mostrarla en el formulario
    $datos["coordenadaY"] = $coordenadaY;

    // ==========================================================

    // Creo el color con el valor inicial del array de datos
    $color = $datos["color"];

    // Si el color ha llegado desde el formulario:
    if (isset($_POST["color"])) {

        // Asigno el valor del formulario
        $color = $_POST["color"];

        // Si el set no lo acepta, dará error
        if (!$auxiliar->setColor($color)) {
            $errores["color"][] = "El color seleccionado no existe";
        }
    }

    // Guardamos el color para mostrarlo en el formulario
    $datos["color"] = $color;

    // ==========================================================

    // Creo el grosor con el valor inicial del array de datos
    $grosor = $datos["grosor"];

    // Si el grosor ha llegado desde el formulario:
    if (isset($_POST["grosor"])) {

        // Asigno el valor del formulario
        $grosor = (int) $_POST["grosor"];
    }

    // Si no se ha marcado ningún estado dará error
    if ($grosor === 0) {
        $errores["grosor"][] = "Debes introducir un grosor";

        // Si el grosor no es una de las opciones dará error
    } else if (!validaRango($grosor, $grosores, 2)) {
        $errores["grosor"][] = "Debes introducir un grosor valido";
    }

    // Guardamos el grosor para mostrarlo en el formulario
    $datos["grosor"] = $grosor;

    // ==========================================================

    // Si no hay ningún error, añado la información del punto al fichero, leo el fichero 
    // para actualizar el array de puntos y creo la imagen con todos los puntos
    if (!$errores) {

        // Guardo toda la información 
        $info = $coordenadaX . " ; " . $coordenadaY . " ; " . $color . " ; " . $grosor;

        // Modifico el fichero ya creado con la nueva información
        $f = fopen($rutaFichero, "a");
        fputs($f,  $info . PHP_EOL);
        fclose($f);

        // Creo la imagen con los puntos
        crearImagen($dirip, $navegador, $puntos);
    }
}

// Si se ha pulsado el botón de eliminar
if (isset($_POST["eliminar"])) {

    // Empiezo sin ninguna posición elegida
    $posicionPuntoBorrar = 0;

    // Si ha llegado una posición del combo y es un número:
    if (isset($_POST["selectPuntos"]) && is_numeric($_POST["selectPuntos"])) {

        // Guardo la posición del punto a borrar como número entero
        $posicionPuntoBorrar = (int) $_POST["selectPuntos"];

        // Quito el punto del array de puntos
        array_splice($puntos, $posicionPuntoBorrar, 1);
    }
}

// leerFichero($rutaFichero, $puntos);

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

function cabecera() {}

/**
 * Muestra el cuerpo de la página
 *
 * @param array $datos Datos introducidos por el usuario
 * @param array $colores Todos los colores
 * @param array $errores Errores encontrados al validar
 * @return void
 */
function cuerpo(
    array $datos,
    array $colores,
    array $errores,
    array $puntos,
    string $ruta,
) {
    // Mestro el formulario con los datos y los errores
    formulario($datos, $colores, $errores, $puntos, $ruta,);
}

/**
 * Muestra los errores, si los hay, y el formulario con los datos introducidos.
 *
 * @param array $datos Datos introducidos por el usuario
 * @param array $colores Todos los colores
 * @param array $errores Errores encontrados al validar
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
    <form action="" method="post">

        <!-- Input para introducir la coordenada X -->
        <label for="coordenadaX">Coordenada X: </label>
        <input type="number" name="coordenadaX" id="coordenadaX" min="0" max="500"
            value="<?php echo $datos["coordenadaX"]; ?>">

        <!-- Errores de la cordenada x -->
        <?php
        if (isset($errores["coordenadaX"])) {
            echo "<div class='error'>";
            for ($i = 0; $i < count($errores["coordenadaX"]); $i++) {
                echo $errores["coordenadaX"][$i] . PHP_EOL;
            }
            echo "</div>";
        }
        ?>

        <!-- Input para introducir la coordenada Y -->
        <br><label for="coordenadaY">Coordenada Y: </label>
        <input type="number" name="coordenadaY" id="coordenadaY" min="0" max="500"
            value="<?php echo $datos["coordenadaY"]; ?>">

        <!-- Errores de la cordenada y -->
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

        <!-- Combo con todos los puntos -->
        <br><select name="selectPuntos">
            <?php for ($i = 0; $i < count($puntos); $i++) { ?>
                <option value=" <?php echo $i ?> " ?>
                    <?php echo $puntos[$i]->getX() . ";" . $puntos[$i]->getY() . ";" . $puntos[$i]->getColor() . ";" . $puntos[$i]->getGrosor() ?>
                </option>
            <?php } ?>
        </select>

        <!-- Botón borrar boton -->
        <br><br><input type="submit" name="eliminar" value="Eliminar">

        <!-- Botón -->
        <br><br><input type="submit" name="enviar" value="Enviar">

        <!-- Textarea -->
        <br><br><textarea readonly name="texto" rows="6" cols="40"><?php foreach ($puntos as $clave => $valor) { ?><?php echo $valor->getX() . ", " . $valor->getY() . ", " . $valor->getColor() . ", " . $valor->getGrosor() . "\n" ?><?php } ?></textarea>

        <!-- Imagen -->
        <br><img src=<?php echo $ruta ?> alt="Imagen">
    </form>
<?php
}

/**
 * Funcion que lee un fichero y crea puntos a partir de el
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
    foreach ($datos as $pos => $valor) {
        unset($datos[$pos]);
    }

    // Se lee el fichero línea a línea hasta que no queden más
    while ($linea = fgets($fic)) {

        // Se quitan los saltos de línea del final
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);

        // Si la línea no está vacía
        if ($linea != "") {
            // Se separa la línea en trozos
            $linea = explode(" ; ", $linea);

            $nuevoPunto = new Punto((int) $linea[0], (int) $linea[1], $linea[2], (int) $linea[3]);
            $datos[] = $nuevoPunto;
        }
    }

    // Se cierra el fichero
    fclose($fic);
    // Todo ha ido bien
    return true;
}

/**
 * Undocumented function
 *
 * @param string $ruta
 * @param array $datos
 * @return boolean
 */
function editarFichero(string $ruta, array $datos): bool
{
    $fic = fopen($ruta, "w");
    if (!$fic) {
        return false;
    }

    foreach ($datos as $fila) {
        $linea = "";
        foreach ($fila as $columna) {
            $linea .= $columna . ",";
        }
        $linea .= "\r\n";
        fputs($fic, $linea);
    }

    fclose($fic);
    return true;
}
