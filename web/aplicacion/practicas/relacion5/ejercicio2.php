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

// Indica si se muestra el resumen (solo cuando se envía el formulario sin errores)
$mostrarResumen = false;

// Creamos un array con los datos del formulario
$datos = [
    "nombre" => "",
    "contraseña" => "",
    "fechaNacimiento" => "",
    "diaCarnet" => "",
    "mesCarnet" => "",
    "añoCarnet" => "",
    "fechaCarnet" => "",
    "horaLevantarse" => "",
    "estado" => "",
    "estudios" => [],
    "hermanos" => 0,
    "sueldo" => 1100,
];

// Creamos un array con los errores
$errores = [];

// Si se ha enviado el formulario:
if ($_POST) {

    // Inicializamos el nombre con el valor inicial del array de datos
    $nombre = $datos["nombre"];

    // Si el nombre ha llegado desde el formulario:
    if (isset($_POST["nombre"])) {

        // Asigno el valor del formulario al a la variable para el nombre
        $nombre = $_POST["nombre"];

        // Le quito los espacios de los extremos
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

    // Guardamos el nombre para mostrarlo en el formulario
    $datos["nombre"] = $nombre;


    // ==========================================================

    // Inicializamos la contraseña con el valor inicial del array de datos
    $contraseña = $datos["contraseña"];

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

    // Guardamos la contraseña para mostrarla en el formulario
    $datos["contraseña"] = $contraseña;

    // ==========================================================

    // Inicializamos la fecha de nacimiento con el valor inicial del array de datos
    $fechaNacimiento = $datos["fechaNacimiento"];

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

    // Guardamos la fecha de nacimiento para mostrarla en el formulario
    $datos["fechaNacimiento"] = $fechaNacimiento;

    // ==========================================================

    // Inicializamos el día, el mes y el año del carnet con los valores iniciales del array de datos
    $diaCarnet = $datos["diaCarnet"];
    $mesCarnet = $datos["mesCarnet"];
    $añoCarnet = $datos["añoCarnet"];

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

        // Convertimos las dos fechas a objetos DateTime (! pone la hora a 00:00:00 para comparar solo el día)
        $fecha1 = DateTime::createFromFormat('!d/m/Y', $fechaNacimiento); // Ej: 19/03/2006
        $fecha2 = DateTime::createFromFormat('!d/m/Y', $fechaCarnet); // Ej: 18/03/2024

        // Le restamos 18 años a la fecha del carnet
        $fecha2->sub(new DateInterval("P18Y")); // Ej: 18/03/2024 - 18 años = 18/03/2006

        // Si la fecha2 (carnet-18) es menor a la fecha1 (nacimiento) damos un error 
        // pues tiene que ser igual o mayor a la de nacimiento
        if ($fecha2 < $fecha1) {
            $errores["fechaCarnet"][] = "La fecha del carnet debe ser mayor a la de la edad";
        }
    }

    // Guardamos el día, el mes y el año del carnet para mostrarlos en el formulario
    $datos["diaCarnet"] = $diaCarnet;
    $datos["mesCarnet"] = $mesCarnet;
    $datos["añoCarnet"] = $añoCarnet;

    // ==========================================================

    // Inicializamos la hora de levantarse con el valor inicial del array de datos
    $horaLevantarse = $datos["horaLevantarse"];

    // Si la hora de levantarse ha llegado desde el formulario:
    if (isset($_POST["horaLevantarse"])) {
        // Asigno el valor del formulario a la variable de la hora de levantarse
        $horaLevantarse = $_POST["horaLevantarse"];
        // Le quito los espacios de los extremos
        $horaLevantarse = trim($horaLevantarse);
    }

    // Si la hora de levantarse no es válida dará error
    if (!validaHora($horaLevantarse, $horaLevantarse)) {
        $errores["horaLevantarse"][] = "La hora para levantarse no es valida";
    }

    // Guardamos la hora a la que se levanta para mostrarlo en el formulario
    $datos["horaLevantarse"] = $horaLevantarse;

    // ==========================================================

    // Inicializamos el estado con el valor inicial del array de datos
    $estado = $datos["estado"];

    // Si se ha marcado algún estado:
    if (isset($_POST["estado"])) {
        // Asigno el estado marcado convertido a entero
        $estado = (int) $_POST["estado"];
    }

    // Si no se ha marcado ningún estado dará error
    if ($estado === "") {
        $errores["estado"][] = "Debes introducir un estado";

        // Si el estado no es una de las opciones válidas dará error
    } else if (!validaRango($estado, [1, 2, 3, 4], 1)) {
        $errores["estado"][] = "Incorrecto no es un estado valido";
    }

    // Guardamos los estado para mostrarlo en el formulario
    $datos["estado"] = $estado;

    // ==========================================================

    // Inicializamos los estudios con el valor inicial del array de datos
    $estudios = $datos["estudios"];

    // Si se ha marcado algún estudio:
    if (isset($_POST["estudios"])) {
        // Asigno los estudios marcados (llegan como array desde estudios[])
        $estudios = $_POST["estudios"];
    }

    // Opciones de estudios válidas (texto => código)
    $estudiosValidos = [
        "Sin estudios" => 0,
        "Primaria" => 1,
        "Secundaria" => 2,
        "Bachillerato" => 3,
        "Ciclo formativo" => 4,
        "Universitarios" => 5
    ];

    // Recorremos los estudios marcados
    for ($i = 0; $i < count($estudios); $i++) {

        // Convertimos el código a entero
        $estudios[$i] = (int) $estudios[$i];

        // Si el código no es una opción válida dará error
        if (!validaRango($estudios[$i], $estudiosValidos, 1)) {
            $errores["estudios"][] = "Has marcado una opción de estudios no válida";
        }
    }

    // Si se ha marcado "Sin estudios" junto a otras opciones, desmarcamos el resto
    if ((count($estudios) >= 2) && (in_array(0, $estudios))) {
        // Dejamos solo "Sin estudios"
        $estudios = [0];
    }

    // Si no se ha marcado ningún estudio dará error
    if ((count($estudios) === 0)) {
        $errores["estudios"][] = "Debes marcar al menos uno";
    }

    // Guardamos los estudios para mostrarlo en el formulario
    $datos["estudios"] = $estudios;

    // ==========================================================

    // Inicializamos los hermanos con el valor inicial del array de datos
    $hermanos = $datos["hermanos"];

    // Si los hermanos han llegado desde el formulario y son un número:
    if (isset($_POST["hermanos"]) && is_numeric($_POST["hermanos"])) {
        // Asigno el valor del formulario convertido a entero
        $hermanos = (int) $_POST["hermanos"];
    }

    // Si no está entre 0 y 20 dará error
    if (!validaEntero($hermanos, 0, 20, 0)) {
        $errores["hermanos"][] = "El número de hermanos valido está entre 0 y 20";
    }

    // Guardamos los hermanos para mostrarlos en el formulario
    $datos["hermanos"] = $hermanos;

    // ==========================================================

    // Inicializamos el sueldo con el valor inicial del array de datos
    $sueldo = $datos["sueldo"];

    // Si el sueldo ha llegado desde el formulario y es un número:
    if (isset($_POST["sueldo"]) && is_numeric($_POST["sueldo"])) {
        // Asigno el valor del formulario convertido a real
        $sueldo = (float) $_POST["sueldo"];
    }

    // Si no está entre 1000 y 150000 dará error
    if (!validaReal($sueldo, 1000, 150000, 1100)) {
        $errores["sueldo"][] = "El número del sueldo debe estar entre 1000 y 150000 €";
    }

    // Guardamos el sueldo para mostrarlo en el formulario
    $datos["sueldo"] = $sueldo;

    // ==========================================================

    // Si no hay ningún error, mostramos el resumen en lugar del formulario
    if (!$errores) {
        $mostrarResumen = true;
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
cuerpo($datos, $errores, $mostrarResumen);
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

/**
 * Muestra el cuerpo de la página: el resumen si los datos son correctos
 * o el formulario con los datos y los errores en caso contrario.
 *
 * @param array $datos Datos introducidos por el usuario
 * @param array $errores Errores encontrados al validar
 * @param boolean $mostrarResumen True si hay que mostrar el resumen
 * @return void
 */
function cuerpo(array $datos, array $errores, bool $mostrarResumen)
{
    // Si los datos son correctos, mostramos el resumen
    if ($mostrarResumen) {
        resumen($datos);
    } else {
        // Si no, mostramos el formulario con los datos y los errores
        formulario($datos, $errores);
    }
}

/**
 * Muestra los errores, si los hay, y el formulario con los datos introducidos.
 *
 * @param array $datos Datos que se muestran en los campos del formulario
 * @param array $errores Errores encontrados al validar
 * @return void
 */
function formulario(array $datos, array $errores)
{
    // Si hay errores, los mostramos todos (campo => mensaje)
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

        <!-- Nombre -->

        <label for="nombre">Nombre: </label>

        <input type="text" name="nombre" id="nombre" maxlength="25"
            value="<?php echo $datos["nombre"]; ?>">

        <!-- Contraseña -->

        <br><label for="contraseña">Contraseña: </label>

        <input type="password" name="contraseña" id="contraseña" maxlength="15"
            value="<?php echo $datos["contraseña"]; ?>">

        <!-- Fecha nacimiento -->

        <br><label for="fechaNacimiento">Fecha nacimiento: </label>

        <input type="text" name="fechaNacimiento" id="fechaNacimiento"
            value="<?php echo $datos["fechaNacimiento"]; ?>">

        <!-- Fecha carnet -->

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

        <!-- Hora para levantarse -->

        <br><label for="horaLevantarse">Hora para levantarse: </label>

        <input type="text" name="horaLevantarse" id="horaLevantarse"
            value="<?php echo $datos["horaLevantarse"]; ?>">

        <!-- Estado -->

        <br><label>Estado: </label>

        <br><input type="radio" name="estado" id="estudiante" value=1
            <?php if ($datos["estado"] === 1) echo "checked"; ?>>
        <label for="estudiante">Estudiante</label>

        <br><input type="radio" name="estado" id="enParo" value=2
            <?php if ($datos["estado"] === 2) echo "checked"; ?>>
        <label for="enParo">En paro</label>

        <br><input type="radio" name="estado" id="trabajo" value=3
            <?php if ($datos["estado"] === 3) echo "checked"; ?>>
        <label for="trabajo">Trabajando</label>

        <br><input type="radio" name="estado" id="jubilado" value=4
            <?php if ($datos["estado"] === 4) echo "checked"; ?>>
        <label for="jubilado">Jubilado</label>

        <br><input type="radio" name="estado" id="incorrecto" value=5
            <?php if ($datos["estado"] === 5) echo "checked"; ?>>
        <label for="incorrecto">Incorrecto</label>

        <!-- Estudios -->

        <br><label>Estudios: </label>

        <br><input type="checkbox" name="estudios[]" id="sinEstudios" value="0"
            <?php if (in_array(0, $datos["estudios"])) echo "checked"; ?>>
        <label for="sinEstudios">Sin estudios</label>

        <br><input type="checkbox" name="estudios[]" id="primaria" value="1"
            <?php if (in_array(1, $datos["estudios"])) echo "checked"; ?>>
        <label for="primaria">Primaria</label>

        <br><input type="checkbox" name="estudios[]" id="secundaria" value="2"
            <?php if (in_array(2, $datos["estudios"])) echo "checked"; ?>>
        <label for="secundaria">Secundaria</label>

        <br><input type="checkbox" name="estudios[]" id="bachillerato" value="3"
            <?php if (in_array(3, $datos["estudios"])) echo "checked"; ?>>
        <label for="bachillerato">Bachillerato</label>

        <br><input type="checkbox" name="estudios[]" id="cicloFormativo" value="4"
            <?php if (in_array(4, $datos["estudios"])) echo "checked"; ?>>
        <label for="cicloFormativo">Ciclo formativo</label>

        <br><input type="checkbox" name="estudios[]" id="universitarios" value="5"
            <?php if (in_array(5, $datos["estudios"])) echo "checked"; ?>>
        <label for="universitarios">Universitarios</label>

        <br><input type="checkbox" name="estudios[]" id="incorrecta" value="6"
            <?php if (in_array(6, $datos["estudios"])) echo "checked"; ?>>
        <label for="incorrecta">Incorrecta</label>

        <!-- Hermanos -->

        <br><label for="hermanos">Hermanos: </label>

        <input type="number" name="hermanos" id="hermanos" max="20" min="0"
            value="<?php echo $datos["hermanos"]; ?>">

        <!-- Sueldo -->

        <br><label for="sueldo">Sueldo: </label>

        <input type="number" name="sueldo" id="sueldo" max="150000" min="1000" step="0.01"
            value="<?php echo $datos["sueldo"]; ?>">

        <br><input type="submit" value="Enviar">
    </form>
<?php
}

/**
 * Muestra un resumen con los datos introducidos cuando todos son correctos.
 *
 * @param array $datos Datos validados del formulario
 * @return void
 */
function resumen(array $datos)
{
    // Pasamos el código del estado a su texto
    $estado = "";
    switch ($datos["estado"]) {
        case '1':
            $estado = "Estudiante";
            break;
        case '2':
            $estado = "En paro";
            break;
        case '3':
            $estado = "Trabajando";
            break;
        case '4':
            $estado = "Jubilado";
            break;
        case '5':
            $estado = "Incorrecto";
            break;
        default:
            $estado = "Sin estado";
    }

    // Pasamos los códigos de los estudios a sus textos, separados por comas
    $estudios = "";
    for ($i = 0; $i < count($datos["estudios"]); $i++) {

        if ($i !== count($datos["estudios"]) && $i !== 0) {
            $estudios .= ", ";
        }

        switch ($datos["estudios"][$i]) {
            case '0':
                $estudios .= "Sin estudios";
                break;
            case '1':
                $estudios .= "Primaria";
                break;
            case '2':
                $estudios .= "Secundaria";
                break;
            case '3':
                $estudios .= "Bachillerato";
                break;
            case '4':
                $estudios .= "Ciclo formativo";
                break;
            case '5':
                $estudios .= "Universitarios";
                break;
            default:
                $estudios = "Sin estudios";
        }
    }

    // Mostramos todos los datos introducidos
    echo "<h3>Resumen del formulario</h3>";
    echo "Nombre: " . $datos["nombre"] . "<br>";
    echo "Contraseña: " . $datos["contraseña"] . "<br>";
    echo "Fecha de nacimiento: " . $datos["fechaNacimiento"] . "<br>";
    echo "Fecha del carnet: " . $datos["diaCarnet"] . "/" . $datos["mesCarnet"] . "/" . $datos["añoCarnet"] . "<br>";
    echo "Hora de levantarse: " . $datos["horaLevantarse"] . "<br>";
    echo "Estado: " . $estado . "<br>";
    echo "Estudios: " . $estudios . "<br>";
    echo "Hermanos: " . $datos["hermanos"] . "<br>";
    echo "Sueldo: " . $datos["sueldo"] . " €<br>";
}
