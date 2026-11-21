<?php

/**
 * Función que crea una imagen jpg con los puntos y, según el parámetro,
 * la guarda en /imagenes/puntos/ con el nombre imagen_dirip_navegador.jpg
 * o la envía directamente al navegador
 *
 * @param string $dirip Dirección IP del cliente
 * @param string $navegador Nombre del navegador del cliente
 * @param array $puntos Puntos que se dibujan en la imagen
 * @param boolean $guardar True para guardar la imagen y false para enviarla al navegador
 * @return boolean true si la imagen se ha creado correctamente, false si ha fallado
 */
function crearImagen(string $dirip, string $navegador, array $puntos, bool $guardar = true): bool
{
    // Creo el lienzo (ancho, alto), pongo 500 porque es el máximo valor de las coordenadas x e y de los puntos
    $img = imagecreatetruecolor(500, 500);

    // Creo dos colores
    $blanco = imagecolorallocate($img, 255, 255, 255);
    $negro  = imagecolorallocate($img, 0, 0, 0);

    // Pinto la imagen de color blanco
    imagefilledrectangle($img, 0, 0, 499, 499, $blanco);

    // Pinto un marco de color negro
    imagerectangle($img, 0, 0, 499, 499, $negro);

    // Recorro todos los puntos para dibujarlos en la imagen
    foreach ($puntos as $clave => $valor) {

        // Creo el color del punto buscando su rgb en la constante COLORES a partir de su clave
        $nuevoColor = imagecolorallocate(
            $img,
            Punto::COLORES[$valor->getColor()]["rgb"][0],
            Punto::COLORES[$valor->getColor()]["rgb"][1],
            Punto::COLORES[$valor->getColor()]["rgb"][2],
        );

        // Según el grosor del punto (1, 2 o 3) elijo el diámetro del círculo
        $grosor = 0;
        if ($valor->getGrosor() == 1) {
            $grosor = 10;
        } else if ($valor->getGrosor() == 2) {
            $grosor = 20;
        } else if ($valor->getGrosor() == 3) {
            $grosor = 30;
        }

        // Dibujo el círculo relleno (centro x, centro y, ancho, alto, color)
        imagefilledellipse($img, $valor->getX(), $valor->getY(), $grosor, $grosor, $nuevoColor);
    }

    // Si hay que guardar la imagen:
    if ($guardar) {
        // Devuelvo la imagen como jpg (la guardo en su carpeta)
        return imagejpeg($img, RUTABASE . "/imagenes/puntos/imagen_" .  $dirip . "_" .  $navegador . ".jpg");
    } else {
        // Envío la imagen directamente al navegador, sin guardarla
        return imagejpeg($img);
    }
}

/**
 * Función que da el nombre del navegador a partir de la cabecera User-Agent
 *
 * @param string $HTTP_USER_AGENT Cabecera User-Agent de la petición
 * @return string Nombre del navegador en minúsculas, "otro_buscador" si no lo reconoce
 */
function encontrarNavegador(string $HTTP_USER_AGENT): string
{
    // Creo un array con los posibles buscadores
    $navegadores = [
        "Edg" => "edge",
        "OPR" => "opera",
        "Firefox" => "firefox",
        "Chrome" => "chrome",
        "Safari" => "safari",
    ];

    // Si en el User-Agent del usuario está uno de los buscadores posibles lo devuelvo
    foreach ($navegadores as $clave => $valor) {
        if (str_contains($HTTP_USER_AGENT, $clave)) {
            return $valor;
        }
    }

    // Si no se encuentra ninguno devuelvo esto
    return "otro_buscador";
}
