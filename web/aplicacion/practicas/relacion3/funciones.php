<?php

// 1.- Función cuentaVeces(). A esta función se le pasan cuatro parámetros: un array, una cadena y dos
// números. La función se encargará de añadir en el array el primer número a la posición asociativa
// indicada por la cadena. Hay que tener en cuenta que el array debe quedar actualizado cuando se
// salga de la función. Además, cada vez que se llama a la función, se devuelve en el segundo número
// un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda
// llamada, etc). Se devolverá true si todo ha ido bien y false si se ha detectado algún error. (se debe
// dar error si se indica como posición“2daw”o “primera”)
//
//     $vector=array();//el vector vacio
//     $numero=0;
//     cuentaVeces($vector,”1osición”,7,$numero); //$vector (“1osición”=>7). En numero se
//     de vuelve 1 porque es la primera llamada…
//     cuentaVeces($vector,”otra”,2,$numero); //$vector(“otra”=>9).En numero se devuelve 2
//     porque es la segunda llamada…

function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2)
{
    // Si la cadena es "2daw" o "primera" el resultado es erroneo
    if ($cadena == "2daw" || $cadena == "primera") {
        return false;
    }

    // Añadimos el primer numero al array
    $array[$cadena] = $num1;

    // Creamos un contador que recuerda el número de la llamada actual
    static $cont = 0;
    $cont++;
    // El segundo número sera igual a este contador
    $num2 = $cont;

    // Devolvemos true si la cadena no es "2daw" o "primera"
    return true;
}

// 2.- Función generarCadena(). A esta función se le pasa un parámetro con valor por defecto 10 y se
// encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
// aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
// indicado un número negativo o igual a 0.
//
// generarCadena(7); // crea la cadena de 7 caracteres “AcG_%15”

function generarCadena($longitud = 10)
{
    // Si el número es igual o menor a cero el resultado es false
    if ($longitud <= 0) {
        return false;
    }

    // Cadena con todos los caracteres posibles (mayúsculas, minúsculas y números)
    $caracteres = "qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM1234567890";

    // Creamos la cadena que vamos a contruir
    $cadena = "";
    for ($i = 0; $i < $longitud; $i++) {

        // Número aleatorio entre 0 y la última posición de la cadena de caracteres
        $numeroAleatorio = mt_rand(0, mb_strlen($caracteres, 'UTF-8') - 1);

        // Construimos caracter a caracter la cadena
        $cadena =  $cadena .  mb_substr($caracteres, $numeroAleatorio, 1);
    }

    return $cadena;
}

// 3.- Función operaciones(). Esta función recibe al menos tres parámetros. El primero (entero) es el
// tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser
//      1, suma todos los operandos
//      2, al primer operando se restan el resto
//      3, multiplicación de todos los operandos.
//
// En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
// los de las posiciones impares (el primer operando es 1).
//
// Operaciones(1,2,5,7,3,4); // haría la suma de 2+5+7+3+4
// Operaciones(5,2,5,7,3,4); // Sumaria suma las posiciones pares (5+3), las posiciones impares (2+7+4), y se restan los dos.

function operaciones(int $operando, float $num1, float $num2, ...$numeros)
{
    // Dependiendo del tipo de operador que sea sumamos/restamos/multiplicamos los dos parametros obligatorios
    $resultado = match ($operando) {
        1 => $num1 + $num2,
        2 => $num1 - $num2,
        3 => $num1 * $num2,
        // Debemos de añadir default de forma obligatoria
        default => 0,
    };

    // Dependiendo del tipo de operador que sea sumamos/restamos/multiplicamos el resto de números
    foreach ($numeros as $numero) {
        $resultado = match ($operando) {
            1 => $resultado += $numero,
            2 => $resultado -= $numero,
            3 => $resultado *= $numero,
            // Debemos de añadir default de forma obligatoria
            default => 0,
        };
    }

    // Si el operador no es diferente de 1, 2 o 3 
    if ($operando != 1 && $operando != 2 && $operando != 3) {

        // Creo una array vacio
        $todoLosNumeros = [];

        // Añado a este array los dos números obligatorios (parametros obligatorios)
        $todoLosNumeros[] = $num1;
        $todoLosNumeros[] = $num2;

        // Y añado el resto de números (parametros no obligatorios)
        foreach ($numeros as $numero) {
            $todoLosNumeros[] = $numero;
        }

        // Creo variables para sumar por una lado los numeros en posiciones pares y por otro lado las posiciones impares
        $sumaPares = 0;
        $sumaImpares = 0;

        // Recorro todos los números
        for ($i = 0; $i < count($todoLosNumeros); $i++) {

            // Si es el número esta en posición par lo sumamos con el resto de numeros pares
            if ($i % 2 == 0) {
                $sumaPares += $todoLosNumeros[$i];

                // Si es el número esta en posición impar lo sumamos con el resto de numeros impar
            } else {
                $sumaImpares += $todoLosNumeros[$i];
            }
        }

        // Realizo la resta de los pares contra los impares
        $resultado = $sumaImpares - $sumaPares;
    }

    // Devolvemos el resultado
    return $resultado;
}
