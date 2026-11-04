<?php

namespace VALNORMAL;

// function validaEntero(int &$var, int $min, int $max, int $defecto):bool Esta función
// comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
// devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
// $defecto). La función devuelve true si es correcto y false en caso contrario.

/**
 * Función que comprueba que un número entero está comprendido entre un número maximo y un 
 * minimo. Si no lo esta le asignamos el valor por defecto.
 *
 * @param integer $var Número que validamos, si no es valido lo modificamos
 * @param integer $min Valor mínimo permitido
 * @param integer $max Valor máximo permitido
 * @param integer $defecto Valor que se asigna si el número no es válido
 * @return boolean True si el número es validado y false si no lo es
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    if (($var >= $min) && ($var <= $max)) {
        return true;
    } else {
        $var = $defecto;
        return false;
    }
}

// function validaReal(float &$var, float $min, float $max, float $defecto):bool Esta función
// comprueba que $var contiene un real cuyo valor está entre $min y $max. En $var se devuelve
// el real saneado (en caso de no cumplir las condiciones asigna a $var el valor $defecto). La
// función devuelve true si es correcto y false en caso contrario.

/**
 * Función que comprueba que un número real está comprendido entre un número maximo y un 
 * minimo. Si no lo esta le asignamos el valor por defecto.
 *
 * @param float $var Número que validamos, si no es valido lo modificamos
 * @param float $min Valor mínimo permitido
 * @param float $max Valor máximo permitido
 * @param float $defecto Valor que se asigna si el número no es válido
 * @return boolean True si el número es validado y false si no lo es
 */
function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    if (($var >= $min) && ($var <= $max)) {
        return true;
    } else {
        $var = $defecto;
        return false;
    }
}

// function validaFecha(string &$var, string $defecto):bool Esta función comprueba que $var
// contiene una fecha correcta en el formato dd/mm/aaaa. En $var se devuelve la fecha saneada
// (2 cifras para dia y mes y cuatro para año- ej fecha 1/2/2023 es válida aunque se sanea y se
// convierte en 01/02/2023). En caso de no cumplir las condiciones devuelve $defecto en
// $var. La función devuelve true si es correcta y false en caso contrario.

/**
 * Función que comprueba que una fecha tiene el formato dd/mm/aaaa y que existe.
 * Si es correcta, la deja con 2 cifras en el día y el mes.
 * Si no lo es, le asignamos el valor por defecto.
 *
 * @param string $var Fecha que validamos, se modifica si hay que sanearla o no es válida
 * @param string $defecto Fecha que se asigna si la fecha no es válida
 * @return boolean True si la fecha es válida y false si no lo es
 */
function validaFecha(string &$var, string $defecto): bool
{
    // Creo la expresión regular: dd/mm/aaaa o d/m/aaaa
    $expresionRegular = '#^[0-9]{1,2}[/][0-9]{1,2}[/][0-9]{4}$#';

    // Si la fecha coincide con la expresión regular:
    if (preg_match($expresionRegular, $var)) {

        // Dividimos la fecha en 3 partes: día, mes y año
        $partesFecha = explode("/", $var);

        // Comprobamos que la fecha existe
        if (checkdate($partesFecha[1], $partesFecha[0], $partesFecha[2])) { // checkdate: mes, día, año

            // En el caso de que si, la saneamos
            $especifica = mktime(0, 0, 0, $partesFecha[1], $partesFecha[0], $partesFecha[2]); // mktime: hora, minuto, segundo, mes, día, año
            // La fecha inicial sera esta nueva fecha
            $var = date('d/m/Y', $especifica);

            // Devolvemos true
            return true;
        }
    }

    // Si la fecha no es válida, asignamos el valor por defecto
    $var = $defecto;
    // Devolvemos false
    return false;
}

// function validaHora(string &$var, string $defecto):bool Esta función comprueba que $var
// contiene una hora correcta en el formato hh:mm:ss . En $var se devuelve la hora saneada (2
// cifras para hora, min, segundos - Ej 0:5:1, hora valida aunque se sanea y se convierte a
// 00:05:01). En caso de no cumplir las condiciones devuelve $defecto en $var. La función
// devuelve true si es correcta y false en caso contrario

/**
 * Función que comprueba que una hora tiene el formato hh:mm:ss y que sus valores son correctos.
 * Si es correcta, la deja con 2 cifras en la hora, los minutos y los segundos.
 * Si no lo es, le asignamos el valor por defecto.
 *
 * @param string $var Hora que validamos, se modifica si hay que sanearla o no es válida
 * @param string $defecto Hora que se asigna si la hora no es válida
 * @return boolean True si la hora es válida y false si no lo es
 */
function validaHora(string &$var, string $defecto): bool
{
    // Creo la expresión regular: hh:mm:ss o h:m:ss
    $expresionRegular = '#^[0-9]{1,2}[:][0-9]{1,2}[:][0-9]{1,2}$#';

    // Si la hora coincide con la expresión regular:
    if (preg_match($expresionRegular, $var)) {

        // Dividimos la hora en 3 partes: hora, min y segundos
        $partesHora = explode(":", $var);

        // Comprobamos que la hora existe
        if (($partesHora[0] < 24) && ($partesHora[1] < 60) && ($partesHora[2] < 60)) {

            // En el caso de que si, la saneamos
            $especifica = mktime($partesHora[0], $partesHora[1], $partesHora[2], 0, 0, 0); // mktime: hora, minuto, segundo, mes, día, año
            // La hora inicial sera esta nueva hora
            $var = date('H:i:s', $especifica);

            // Devolvemos true
            return true;
        }
    }

    // Si la fecha no es válida, asignamos el valor por defecto
    $var = $defecto;
    // Devolvemos false
    return false;
}

// function validaEmail(string &$var, string $defecto):bool Esta función comprueba que $var
// contiene un email correcto en el formato aaaaa@bbbb.ccc. En $var se devuelve el email
// saneado (en caso de no cumplir las condiciones devuelve $defecto). La función devuelve
// true si es correcto y false en caso contrario.

/**
 * Función que comprueba que un email tiene el formato aaaaa@bbbb.ccc.
 * Si es correcto, lo deja saneado.
 * Si no lo es, le asignamos el valor por defecto.
 *
 * @param string $var Email que validamos, se modifica si hay que sanearlo o no es válido
 * @param string $defecto Email que se asigna si el email no es válido
 * @return boolean True si el email es válido y false si no lo es
 */
function validaEmail(string &$var, string $defecto): bool
{
    // Creo la expresión regular
    $expresionRegular = '#^[A-Za-z0-9_.-]+[@][A-Za-z0-9-]+[.][A-Za-z]{2,}$#';

    // Saneamos el email
    $var = trim($var);

    // Si el email coincide con la expresión regular:
    if (preg_match($expresionRegular, $var)) {
        // Devolvemos true
        return true;
    }

    // Si el email no es válido, asignamos el valor por defecto
    $var = $defecto;
    // Devolvemos false
    return false;
}

// function validaCadena(string &$var, int $longitud, string $defecto):bool Esta función
// comprueba que $var contiene una cadena de longitud máxima $longitud. En caso de no
// cumplir las condiciones se asigna a $var el valor $defecto. La función devuelve true si es
// correcto y false en caso contrario.

// function validaExpresion(string &$var, string $expresion, string $defecto):bool Esta función
// comprueba que $var cumple con la expresión regular $expresion. En caso de no cumplir las
// condiciones se asigna a $var el valor por $defecto. La función devuelve true si es correcto y
// false en caso contrario.

// function validaRango(mixed $var, array $posibles, int $tipo=1):bool Esta función comprueba
// que $var sea igual a uno de los elementos del array $posibles ($tipo=1) o a una de las claves
// del array $posibles ($tipo=2). La función devuelve true si es correcta y false en caso contrario.
