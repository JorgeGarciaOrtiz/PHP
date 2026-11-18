<?php

// Incluyo la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");
// Incluyo la clase del punto
include_once(RUTABASE . "/../../scripts/clases/Punto.php");

// Variable con el titulo
$titulo = "Ejercicio 1";

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

// Creo un array con los colores
$colores = Punto::COLORES;

// Creo un array con los grosores
$grosores = Punto::GROSORES;

// Creo un array con los datos del formulario
$datos = [
    "coordenadaX" => "",
    "coordenadaY" => "",
    "color" => "",
    "grosor" => ""
];

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo($datos, $colores, $grosores);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo(array $datos, array $colores, array $grosores)
{
?>
    <br>
    <form action="" method="post">

        <label for="coordenadaX">Coordenada X: </label>
        <input type="number" name="coordenadaX" id="coordenadaX" max="0" min="20000"
            value="<?php echo $datos["coordenadaX"]; ?>">

        <br><label for="coordenadaY">Coordenada Y: </label>
        <input type="number" name="coordenadaY" id="coordenadaY" max="0" min="20000"
            value="<?php echo $datos["coordenadaY"]; ?>">

        <br><label for="color">Color: </label>
        <input type="text" name="color" id="color"
            value="<?php echo $datos["color"]; ?>">

        <br><select name="color">
            <?php for ($i = 1; $i < count($colores) + 1; $i++) { ?>
                <option value="<?php echo $i ?>">
                    <?php echo $colores[$i] ?>
                </option>
            <?php } ?>
        </select>

        <br><label>Grosor: </label>
        <br><input type="radio" name="grosor" id="fino" value=1
            <?php if ($datos["grosor"] === 1) echo "checked"; ?>>
        <label for="fino">Fino</label>

        <br><input type="radio" name="grosor" id="medio" value=2
            <?php if ($datos["grosor"] === 2) echo "checked"; ?>>
        <label for="medio">Medio</label>

        <br><input type="radio" name="grosor" id="grueso" value=3
            <?php if ($datos["grosor"] === 3) echo "checked"; ?>>
        <label for="grueso">Grueso</label>

        <br><input type="submit" value="Enviar">
    </form>
<?php
}
