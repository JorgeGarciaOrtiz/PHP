<?php

const MIA = 56;

/**
 * Función que devuelve un número
 * Si el número es menor de 10 se dara un error
 *
 * @param integer $num --> Número al que aplicar el doble
 * @return integer|false --> devuelve el doble del número o false en caso de error
 */
function doble(int $num): int|false
{
    // $num es menor de 10, consideramos que hay un error
    if ($num < 10) return false;
    
    return 2 * $num;
}