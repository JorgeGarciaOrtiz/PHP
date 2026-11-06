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
    "horaLevantarse" => "",
    "estado" => "",
    "estudios" => [],
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

    // ==========================================================

    $estado = $datos["estado"];

    // if ($estado === 5) {
    //     $errores["estado"][] = "La opción 5 no es valida";
    // }

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
            $errores["estudios"][] = "La opción 6 no es valida";
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

    // ==========================================================

    // HERMANOS

    // ==========================================================

    // SUELDO

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
    // Guardamos la hora a la que se levanta para mostrarlo en el formulario
    $datos["horaLevantarse"] = $horaLevantarse;
    // Guardamos los estado para mostrarlo en el formulario
    $datos["estado"] = $estado;
    // Guardamos los estudios para mostrarlo en el formulario
    $datos["estudios"] = $estudios;
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
?><br><?php
    }
        ?>
    <form action="" method="post">

        <label for="nombre">Nombre: </label>

        <input type="text" name="nombre" id="nombre" maxlength="25"
            value="<?php echo $datos["nombre"]; ?>">

        <!-- ========================================================== -->

        <br><label for="contraseña">Contraseña: </label>

        <input type="password" name="contraseña" id="contraseña" maxlength="15"
            value="<?php echo $datos["contraseña"]; ?>">

        <!-- ========================================================== -->

        <br><label for="fechaNacimiento">Fecha nacimiento: </label>

        <input type="text" name="fechaNacimiento" id="fechaNacimiento"
            value="<?php echo $datos["fechaNacimiento"]; ?>">

        <!-- ========================================================== -->

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

        <!-- ========================================================== -->

        <br><label for="horaLevantarse">Hora para levantarse: </label>

        <input type="text" name="horaLevantarse" id="horaLevantarse"
            value="<?php echo $datos["horaLevantarse"]; ?>">

        <!-- ========================================================== -->

        <br><label>Estado: </label>

        <br><input type="radio" name="estado" id="estudiante" value="1"
            <?php if ($datos["estado"] === 1) echo "checked"; ?>>
        <label for="estudiante">Estudiante</label>

        <br><input type="radio" name="estado" id="enParo" value="2"
            <?php if (in_array(0, $datos["estado"])) echo "checked"; ?>>
        <label for="enParo">En paro</label>

        <br><input type="radio" name="estado" id="trabajo" value="3"
            <?php if (in_array(0, $datos["estado"])) echo "checked"; ?>>
        <label for="trabajo">Trabajo</label>

        <br><input type="radio" name="estado" id="jubilado" value="4"
            <?php if (in_array(0, $datos["estado"])) echo "checked"; ?>>
        <label for="jubilado">Jubilado</label>

        <br><input type="radio" name="estado" id="incorrecto" value="5"
            <?php if (in_array(0, $datos["estado"])) echo "checked"; ?>>
        <label for="incorrecto">Incorrecto</label>

        <!-- ========================================================== -->

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

        <!-- ========================================================== -->

        <br><input type="submit" value="Enviar">
    </form>
<?php
}
