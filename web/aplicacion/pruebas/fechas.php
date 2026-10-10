<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Fijo la zona horaria para todas las funciones de fecha/hora
date_default_timezone_set('Europe/Madrid');

// Variable con el titulo
$titulo = "Fechas";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// ==========================================================
// PLANTILLA
// ==========================================================

// Dibujamos la cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Dibujamos el cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo();

finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

// Cabecera propia de la vista
function cabecera() {}

// Cuerpo propio de la vista
function cuerpo()
{
    /*
    Usa date() cuando:
        Solo quieres mostrar la fecha o la hora actual: date('d/m/Y').
        Es algo rápido y puntual, como un copyright con el año: date('Y').

    Usa DateTime cuando:
        Tienes que sumar o restar tiempo (add, sub, modify).
        Tienes que calcular diferencias entre fechas (diff).
        Tienes que comparar fechas ($a < $b).
        Recibes fechas en un formato concreto (createFromFormat).
        Trabajas con zonas horarias distintas.
    */

    // ----------------------------------------------------------
    // time() y date():
    // ----------------------------------------------------------

    echo "<h2>time() y date()</h2>";

    // Fecha actual
    $ahora = time();
    echo "Segundos desde 1/1/1970: " . $ahora . "<br>";
    echo "Fecha actual:  " . date('d/m/Y') . "<br>";
    echo "Hora actual:   " . date('H:i:s') . "<br>";
    echo "Fecha y hora:  " . date('d/m/Y H:i:s', $ahora) . "<br>";

    // Sumar días
    $en5dias = $ahora + 60 * 60 * 24 * 5;
    echo "Dentro de 5 días: " . date('d/m/Y', $en5dias) . "<br>";

    // Restar días
    $hace5dias = $ahora - 60 * 60 * 24 * 5;
    echo "Hace 5 días: " . date('d/m/Y', $hace5dias) . "<br>";

    // Crear una fecha cualquiera
    $especifica = mktime(14, 27, 35, 7, 17, 2018); // hora, min, seg, mes, día, año
    echo "Fecha y hora (fecha creada):  " . date('d/m/Y H:i:s', $especifica) . "<br>";

    // Otros
    echo "Día de la semana: " . date('N', $ahora) . "<br>"; // 1 = lunes, 7 = domingo
    echo "Días del mes: " . date('t', $ahora) . "<br>";
    echo "¿Año bisiesto?: " . date('L', $ahora) . "<br>"; // 0 --> no, 1 --> si
    echo "Formato 12h: " . date('g:i A', $ahora) . "<br>";

    // ----------------------------------------------------------
    // checkdate(mes, dia, año): --> validar fechas
    // ----------------------------------------------------------

    echo "<h2>checkdate()</h2>";

    var_dump(checkdate(2, 29, 2024)); // true (2024 es bisiesto)
    var_dump(checkdate(2, 29, 2023)); // false
    var_dump(checkdate(2, 30, 2024)); // false
    var_dump(checkdate(13, 1, 2024)); // false (no existe el mes 13)

    // ----------------------------------------------------------
    // Zona horaria
    // ----------------------------------------------------------

    echo "<h2>Zona horaria</h2>";

    echo "Zona actual: " . date_default_timezone_get() . "<br>";

    date_default_timezone_set('America/New_York');
    echo "Misma marca de tiempo en Nueva York: " . date('d/m/Y H:i:s', $ahora) . "<br>";
    echo "Zona actual: " . date_default_timezone_get() . "<br>";

    // Pongo otra vez la zona horaria de España
    date_default_timezone_set('Europe/Madrid');

    // ----------------------------------------------------------
    // DateTime
    // ----------------------------------------------------------

    echo "<h2>DateTime()</h2>";

    // Fecha actual
    $ahoraDateTime = new DateTime();
    echo "Fecha actual: " . $ahoraDateTime->format('d/m/Y H:i') . "<br>";

    // Crear una fecha cualquiera (dd-mm-YYYY)
    $fecha1 = new DateTime('18-01-2019');
    echo "Fecha cualquiera: " . $fecha1->format('d/m/Y') . "<br>";

    // Crear formato de fecha 
    $fecha2 = DateTime::createFromFormat('d/m/Y', '25/12/2024');
    echo "Formato cualquiera: " . $fecha2->format('Y-m-d') . "<br>";

    // Cambiar partes de la fecha
    $fecha3 = new DateTime('2024-01-01');
    $fecha3->setDate(2024, 6, 15); // año, mes, día
    $fecha3->setTime(9, 30); // hora, minuto
    echo "Fecha: " . $fecha3->format('d/m/Y H:i') . "<br>";

    // ----------------------------------------------------------
    // add(), sub() y modify() --> sumar, restar y modificar
    // ----------------------------------------------------------

    echo "<h2>add(), sub() y modify()</h2>";

    // P = periodo, T separa fecha de hora.
    // P2M3DT5H = 2 meses, 3 días, 5 horas

    $fechaBase = '2024-01-15';
    echo "Fecha: " . $fechaBase . "<br>";

    // Sumar tiempo
    $f = new DateTime($fechaBase);
    $f->add(new DateInterval('P10D')); // 10 días
    echo "Fecha en 10 días: " . $f->format('d/m/Y') . "<br>";

    // Restar tiempo
    $f = new DateTime($fechaBase);
    $f->sub(new DateInterval('P1M')); // 1 mes
    echo "Fecha hace un mes: " . $f->format('d/m/Y') . "<br>";

    // Sumar (con un texto)
    $f = new DateTime($fechaBase);
    $f->modify('+1 week');
    echo "Fecha en una semana: " . $f->format('d/m/Y') . "<br>";

    // Restar (con un texto)
    $f = new DateTime($fechaBase);
    $f->modify('-1 week');
    echo "Fecha hace una semana: " . $f->format('d/m/Y') . "<br>";

    // ----------------------------------------------------------
    // diff(): diferencia entre dos fechas
    // ----------------------------------------------------------

    echo "<h2>diff()</h2>";

    $inicio = new DateTime('2024-01-01');
    $fin = new DateTime('2024-01-31');

    $dif = $inicio->diff($fin); // devuelve un DateInterval

    echo "Días de diferencia: " . $dif->days . "<br>";

    // ----------------------------------------------------------
    // Comparar fechas
    // ----------------------------------------------------------

    echo "<h2>Comparar fechas</h2>";

    $a = new DateTime('2010-06-01');
    $b = new DateTime('2024-06-01');

    var_dump($a < $b); // true → 2010 es anterior a 2024
    var_dump($a > $b); // false → 2010 no es posterior a 2024
    var_dump($a == $b); // false → no son la misma fecha
    var_dump($a != $b); // true → son fechas distintas
    var_dump($a <= $b); // true → anterior o igual
    var_dump($a >= $b); // false → ni posterior ni igual

    // ----------------------------------------------------------
    // Nombres en español
    // ----------------------------------------------------------

    echo "<h2>Nombres en español</h2>";

    $dias = [
        1 => 'lunes',
        'martes',
        'miércoles',
        'jueves',
        'viernes',
        'sábado',
        'domingo'
    ];
    $meses = [
        1 => 'enero',
        'febrero',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'septiembre',
        'octubre',
        'noviembre',
        'diciembre'
    ];

    $x = new DateTime('2031-03-24');
    echo $dias[(int)$x->format('N')] . ', ' . $x->format('d') . ' de '
        . $meses[(int)$x->format('n')] . ' de ' . $x->format('Y');
}
