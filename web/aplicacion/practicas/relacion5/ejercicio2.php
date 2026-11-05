<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../../cabecera.php");

// Variable con el titulo
$titulo = "Ejercicio 2";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Ejercicios" => "./../index.php",
    "Relación 5" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// Creamos un array con los datos del formulario
$datos = [
    "nombre" => "",
    "contraseña" => "",
    "fechaNacimiento" => "",
    "diaCarnet" => "",
    "mesCarnet" => "",
    "añoCarnet" => "",
    "fechaCarnet" => "",
];

// Creamos un array con los errores
$errores = [];

// Si se ha enviado el formulario:
if ($_POST) {

    // Inicializamos el nombre vacío
    $nombre = "";

    // Si el nombre ha llegado desde el formulario:
    if (isset($_POST["nombre"])) {

        // Asigno el valor del formulario al a la variable para el nombre
        $nombre = $_POST["nombre"];

        // Asigno el valor del formulario a la variable del nombre
        $nombre = trim($nombre);

        // Pongo el nombre en mayúscula
        $nombre = mb_strtoupper($nombre);
    }

    // Si esta vacio dara error
    if ($nombre === "") {
        $errores["nombre"][] = "El nombre esta vacio";
    }

    // Si empiza por H, también dara error
    if (mb_substr($nombre, 0, 1, 'UTF-8') === "H") {
        $errores["nombre"][] = "El nombre no puedo comenzar por H";
    }

    // Si ocupa más de 25 caracteres dara error
    if (!validaCadena($nombre, 25, mb_substr($nombre, 0, 25, 'UTF-8'))) {
        $errores["nombre"][] = "El nombre no puede ocupar más de 25 caracteres";
    }

    // ==========================================================

    // Inicializamos la contraseña vacía
    $contraseña = "";

    // Si la contraseña ha llegado desde el formulario:
    if (isset($_POST["contraseña"])) {

        // Asigno el valor del formulario a la variable de la contraseña
        $contraseña = $_POST["contraseña"];
    }

    // Si ocupa más de 15 caracteres dará error
    if (!validaCadena($contraseña, 15, mb_substr($contraseña, 0, 15, 'UTF-8'))) {
        $errores["contraseña"][] = "La contraseña no puede ocupar más de 15 caracteres";
    }

    // Si ocupa menos de 8 caracteres dará error
    if (!validaExpresion($contraseña, '#^.{8,}$#u', $contraseña)) {
        $errores["contraseña"][] = "La contraseña no puede ocupar menos de 8 caracteres";
    }

    // Si no tiene mayúsculas dará error
    if (!validaExpresion($contraseña, '#[A-Z]#', $contraseña)) {
        $errores["contraseña"][] = "La contraseña no tiene mayúsculas";
    }

    // Si no tiene minúsculas dará error
    if (!validaExpresion($contraseña, '#[a-z]#', $contraseña)) {
        $errores["contraseña"][] = "La contraseña no tiene minúsculas";
    }

    // Si no tiene números dará error
    if (!validaExpresion($contraseña, '#[0-9]#', $contraseña)) {
        $errores["contraseña"][] = "La contraseña no tiene números";
    }

    // Si no tiene caracteres especiales dará error
    if (!validaExpresion($contraseña, '#[$_;<>@-]#', $contraseña)) {
        $errores["contraseña"][] = "La contraseña no tiene caracteres especiales";
    }

    // ==========================================================

    // Inicializamos la fecha de nacimiento vacía
    $fechaNacimiento = "";

    // Si la fecha de nacimiento ha llegado desde el formulario:
    if (isset($_POST["fechaNacimiento"])) {

        // Asigno el valor del formulario a la variable de la fecha de nacimiento
        $fechaNacimiento = $_POST["fechaNacimiento"];

        // Le quito los espacios de los extremos
        $fechaNacimiento = trim($fechaNacimiento);
    }

    // Si la fecha de nacimiento no es válida dará error
    if (!validaFecha($fechaNacimiento, $fechaNacimiento)) {
        $errores["fechaNacimiento"][] = "La fecha de nacimineto no es valida";
    }

    // ==========================================================

    // Inicializamos el día, el mes y el año del carnet vacíos
    $diaCarnet = "";
    $mesCarnet = "";
    $añoCarnet = "";

    // Si el día del carnet ha llegado desde el formulario:
    if (isset($_POST["diaCarnet"])) {
        // Asigno el valor del formulario a la variable del día
        $diaCarnet = $_POST["diaCarnet"];
        // Le quito los espacios de los extremos
        $diaCarnet = trim($diaCarnet);
    }

    // Si el mes del carnet ha llegado desde el formulario:
    if (isset($_POST["mesCarnet"])) {
        // Asigno el valor del formulario a la variable del mes
        $mesCarnet = $_POST["mesCarnet"];
        // Le quito los espacios de los extremos
        $mesCarnet = trim($mesCarnet);
    }

    // Si el año del carnet ha llegado desde el formulario:
    if (isset($_POST["añoCarnet"])) {
        // Asigno el valor del formulario a la variable del año
        $añoCarnet = $_POST["añoCarnet"];
        // Le quito los espacios de los extremos
        $añoCarnet = trim($añoCarnet);
    }

    // Unimos el día, el mes y el año en una sola fecha
    $fechaCarnet =  $diaCarnet . "/" . $mesCarnet . "/" . $añoCarnet;

    // Si la fecha del carnet no es válida dará error
    if (!validaFecha($fechaCarnet, $fechaCarnet)) {
        $errores["fechaCarnet"][] = "La fecha del carnet no es valida";
    }

    // Si las dos fechas son válidas:
    if (!isset($errores["fechaCarnet"]) && !isset($errores["fechaNacimiento"])) {

        // Convertimos las dos fechas a objetos DateTime
        $fecha1 = DateTime::createFromFormat('d/m/Y', $fechaNacimiento);
        $fecha2 = DateTime::createFromFormat('d/m/Y', $fechaCarnet);

        // Calculamos la diferencia entre las dos fechas
        $diferencia = $fecha1->diff($fecha2);

        // Si tenía menos de 18 años dará error
        if ($diferencia->y < 18) {
            $errores["fechaCarnet"][] = "La fecha del carnet debe ser mayor a la de la edad";
        }
    }

    // ==========================================================

    // Guardamos el nombre para mostrarlo en el formulario
    $datos["nombre"] = $nombre;
    // Guardamos la contraseña para mostrarla en el formulario
    $datos["contraseña"] = $contraseña;
    // Guardamos la fecha de nacimiento para mostrarla en el formulario
    $datos["fechaNacimiento"] = $fechaNacimiento;
    // Guardamos el día, el mes y el año del carnet para mostrarlos en el formulario
    $datos["diaCarnet"] = $diaCarnet;
    $datos["mesCarnet"] = $mesCarnet;
    $datos["añoCarnet"] = $añoCarnet;
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
cuerpo($datos, $errores);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo(array $datos, array $errores)
{
    if ($errores) {
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" maxlength="25"
            value="<?php echo $datos["nombre"]; ?>">

        <br><label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" id="contraseña" maxlength="15"
            value="<?php echo $datos["contraseña"]; ?>">

        <br><label for="fechaNacimiento">Fecha nacimiento: </label>
        <input type="text" name="fechaNacimiento" id="fechaNacimiento"
            value="<?php echo $datos["fechaNacimiento"]; ?>">

        <br><label for="fechaCarnet">Fecha carnet: </label>
        <br><label for="diaCarnet">Dia: </label>
        <input type="text" name="diaCarnet" id="diaCarnet"
            value="<?php echo $datos["diaCarnet"]; ?>">
        <br><label for="mesCarnet">Mes: </label>
        <input type="text" name="mesCarnet" id="mesCarnet"
            value="<?php echo $datos["mesCarnet"]; ?>">
        <br><label for="añoCarnet">Año: </label>
        <input type="text" name="añoCarnet" id="añoCarnet"
            value="<?php echo $datos["añoCarnet"]; ?>">

        <br><input type="submit" value="Enviar">
    </form>
<?php
}
