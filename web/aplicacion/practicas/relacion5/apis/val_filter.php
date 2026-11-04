<?php

namespace VALFILTER;

// function validaEntero(int &$var, int $min, int $max, int $defecto):bool Esta función
// comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
// devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
// $defecto). La función devuelve true si es correcto y false en caso contrario.

/**
 * Función que comprueba que un número entero está comprendido entre un número maximo y un 
 * minimo. Si no lo esta le asignamos el valor por defecto
 *
 * @param integer $var Número que validamos, si no es valido lo modificamos
 * @param integer $min Valor mínimo permitido
 * @param integer $max Valor máximo permitido
 * @param integer $defecto Valor que se asigna si el número no es válido
 * @return boolean True si el número es validado y false si no lo es
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{

    // Devuelve mixed: el número entero o false
    $resultado = filter_var($var, FILTER_VALIDATE_INT, [
        "options" => [
            "min_range" => $min,
            "max_range" => $max,
        ]
    ]);

    if ($resultado == false) {
        $var = $defecto;
        return true;
    } else {
        $var = $resultado;
        return true;
    }
}
