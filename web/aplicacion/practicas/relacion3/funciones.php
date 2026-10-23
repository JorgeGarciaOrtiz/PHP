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

/**
 * Función a la que le pasamos un array, una cadena y dos números. Añade el primer número al array en 
 * la posición de la cadena y devuelve en el segundo número las veces que se ha llamado a la función. 
 * Devuelve false si la cadena es "2daw" o "primera".
 *
 * @param array $array
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return boolean
 */
function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2): bool
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

/**
 * Función a la que le pasamos un valor numérico (por defecto 10), que se encarga de devolver una cadena
 * aleatoria de letras mayúsculas, minúsculas y números con ese mismo tamaño. Devuelve false si el número 
 * indicado es cero o negativo.
 * 
 * @param integer $longitud
 * @return boolean|string
 */
function generarCadena($longitud = 10): bool|string
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

/**
 * Función a la que le pasamos al menos tres parámetros numéricos, el primero es el tipo de operación
 * (1 --> suma, 2 --> resta, 3 --> multiplicación) y el resto son los operandos. Si el primer parámetro tiene 
 * otro valor se sumarán las posiciones pares por un lado y las impares por el otro, siendo el resultado de la 
 * función la resta de estas dos sumas.
 *
 * @param integer $operando
 * @param float $num1
 * @param float $num2
 * @param [type] ...$numeros
 * @return integer
 */
function operaciones(int $operando, float $num1, float $num2, ...$numeros): int
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

// 4.- Función devuelve(). Esta función recibe como parámetros tres números (enteros) y devuelve la
// suma de los tres valores en el primer parámetro y como resultado de la función el producto de los
// tres valores. Los dos últimos parámetros tendrán definidos valor por defecto (el que queráis).
//      $valor=7;
//      devuelve($valor,4) // $valor valdrá 7+4+10 y se devuelve 7*4*10 (10 es el valor por defecto que
//      le he puesto al tercer parámetro.
//      
//      Hacer varias llamadas a la función indicando:
//          - Los tres parámetros
//          - El primer parámetro únicamente
//          - El primer y el segundo parámetro
//          - El primer y el tercer parámetro (ojo, el segundo parámetro no se indica)

/**
 * Función a la que le pasamos tres números enteros, devuelve en el primer parámetro la suma de los tres y
 * como resultado de la función la multiplicación de los tres valores.
 *
 * @param integer $valor
 * @param integer $num1
 * @param integer $num2
 * @return integer
 */
function devuelve(int &$valor, int $num1 = 5, int $num2 = 10): int
{
    // Sumamos los 3 numeros en el primer valor
    $valor = $valor + $num1 + $num2;

    // Muliplicamos los 3 valores
    $producto = $valor * $num1 * $num2;

    return $producto;
}

// 5.- Se tienen las funciones suma, resta y multiplicacion que reciben cada una dos parámetros
// numéricos (entero) y que devuelven el resultado de la operación que indica su nombre sobre los
// parámetros.
//
// Tenemos la Función hacerOperacion que recibe tres parámetros. El primero es una cadena
// que puede ser suma, resta o multiplicacion. Los otros dos son los operandos. Esta función se
// encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una variable
// función para llamar a la operación. Hay que comprobar indicando una operación correcta (devuelve
// false si la operación no es válida).
//
//      hacerOperacion(“resta”,3,1) // devuelve 3-1. No se llama directamente a la función resta, se
//      tiene una variable función para ello

/**
 * Función a la que le pasamos una cadena con el tipo de operación ("suma", "resta" o "multiplicacion") 
 * y dos números con los que se realizará dicha operación, llamando a la función que realiza el cálculo 
 * con una variable función. Devuelve el resultado o false si hay algún error.
 *
 * @param string $operacion
 * @param integer $num1
 * @param integer $num2
 * @return integer|boolean
 */
function hacerOperacion(string $operacion, int $num1, int $num2): int|bool
{
    $resultado = 0;

    // Si la opereacion es suma, resta o multiplicación realizamos dicha operacion llamando a su función
    if ($operacion == "suma" || $operacion == "resta" || $operacion == "multiplicacion") {
        $resultado = $operacion($num1, $num2);
    } else {
        // Si no devolvemos false
        return false;
    }

    return $resultado;
}

// Función para sumar
function suma(int $a, int $b): int
{
    return $a + $b;
}

// Función para restar
function resta(int $a, int $b): int
{
    return $a - $b;
}

// Función para multiplicar
function multiplicacion(int $a, int $b): int
{
    return $a * $b;
}

// 6.- Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que
// devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.
// Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de
// flecha distintas que tu definas.
//
//      llamadaAFuncion(1,2,fn($a,$b)=>$a+$b)
//      Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)

/**
 * Función a la que le pasamos como parámetros dos números enteros y uno callable, que devuelve el resultado
 * de ejecutar una función flecha, anónima o con nombre.
 *
 * @param integer $num1
 * @param integer $num2
 * @param callable $num3
 * @return integer
 */
function llamadaAFuncion(int $num1, int $num2, callable $num3): int
{
    // Llamamos al callback con los dos otros números y devolvemos el resultado
    return $num3($num1, $num2);
}

// 7.- Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort,
// al que se indicará como función callback una función anónima que ordenará en orden descendente
// según el número de caracteres de cada elemento.
//
//      $vector=array((“uno”,“grande”,“caminos”,”a”)
//      Ordenar($vector); // el vector debe quedar (“caminos”,”grande”,”uno”,”a”)

/**
 * Función a la que le pasamos como parámetro un array con cadenas, estas las ordenamos en orden descendente
 * segundo el número de caracteres.
 *
 * @param array $array
 * @return boolean
 */
function ordenar(array &$array): bool
{
    for ($i = 0; $i < count($array); $i++) {
        if (!is_string($array[$i])) {
            return false;
        }
    }

    usort($array, fn($cadena1, $cadena2) => mb_strlen($cadena2, 'UTF-8') <=> mb_strlen($cadena1, 'UTF-8'));

    return true;
}
