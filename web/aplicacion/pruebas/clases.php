<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Fijo la zona horaria para todas las funciones de fecha/hora
date_default_timezone_set('Europe/Madrid');

// Variable con el titulo
$titulo = "Clases";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

// // se crea una instancia de la clase prueba
// $instancia = new ClasePrueba();

// // accede a la propiedad pública de la instancia
// $instancia->propPublica = 50;

// // se accede a la propiedad de clase (estática)
// ClasePrueba::$propEstatica[1] = 10;
// $instancia::$propEstatica[2] = 20;

// $datos = ["codigo" => 12, "nombre" => "prueba2"];
// $datosJSon = json_encode($datos);

// // $instancia = new Prueba(12, "cadena"); --> error por que el constructor es privado

// // no hay constructor público, por lo que tengo que
// // llamar a las funciones de creación estaticas
// $p1 = Prueba::desdeDatos(5, 'Objeto');
// $p2 = Prueba::desdeJson($datosJSon);

// $ins = new Instituto();

// ==========================================================

// Se crea el objeto con 100
$programa = Unica::crear(100);

// A ese mismo objeto le cambiamos el número a 1
$programa -> _numero = 1; // Es como hacer "programa.numero = 1" en java

// El objeto ya existe -> devuelve el mismo objeto con el número 1 (el 300 se ignora)
$segunda = Unica::crear(300);

// ¿Son el mismo objeto?
// echo "¿Mismo objeto? " . ($programa === $segunda ? "Sí" : "No") . "<br>"; // Sí

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
function cuerpo() {}

/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
// class ClasePrueba
// {
//     // definición de constantes
//     public const PI = 2.14;

//     // definición de propiedad
//     public int $propPublica = 1;
//     private string $_propPrivada = "hola";
//     protected float $_propProtegida = 1.234;

//     // definición de propiedad estática
//     public static $propEstatica = array(1, 2, 3);

//     // definición de método
//     public function metodo()
//     {
//         // acceso a las propiedades desde el propio objeto
//         $this->propPublica = 13;
//         $this->_propPrivada = 100;
//         $this->_propProtegida = "adios";

//         // acceso a la propiedad estática
//         self::$propEstatica[0] = "otra";
//         return true;
//     }
// }

// class Prueba
// {
//     private ?int $_codigo;
//     private ?string $_nombre;
//     //el constructor es privado
//     private function __construct(?int $codigo = null, ?string $nombre =

//     null)
//     {

//         $this->_codigo = $codigo;
//         $this->_nombre = $nombre;
//     }
//     //constructor estatico publico
//     public static function desdeDatos(int $codigo, string $nombre): static
//     {
//         if ($codigo < 0) {
//             $codigo = 0;
//         }
//         //creo el objeto usando static
//         $obj = new static($codigo, $nombre);
//         return $obj;
//     }
//     //constructor estatico publico
//     public static function desdeJson(string $json): static
//     {
//         $datos = json_decode($json);
//         return new static($datos->codigo, $datos->nombre);
//     }
// }

// Clase que solo nos deja crear un solo objeto (con un solo número)
class Unica
{
    // Variable que indica si ya se ha creado el objeto
    private static bool $_creada = false;

    // Variable que guarda un número
    public int $_numero = 12;

    // Guarda el unico objeto creado, ? nos permite que sea null
    private static ?Unica $_objeto = null;

    // Constructor privado --> nos impide hacer "new Unica()" desde fuera
    private function __construct(int $val = 0)
    {
        // Guarda el numero recibido en el parametro
        $this->_numero = $val;
    }

    // Método static que nos da el objeto (sustituye al "new Unica()")
    // :static → devuelve un objeto de esta clase
    public static function crear(int $numero): static
    {

        // Si el objeto esta creada lo devuelvo
        if (self::$_creada) {
            return self::$_objeto;

            // Si no, lo creamos desde cero
        } else {
            // Creamos el objeto
            $obj = new static($numero); // que es lo mismo que --> $obj = new Unica($numero);

            // Guardamos el objeto en la variable de la clase
            self::$_objeto = $obj;

            // Ponemos la variable de nos dice si el objeto esta creado en true
            self::$_creada = true;

            // Devolvemos el nuevo objeto creado
            return self::$_objeto;
        }
    }
}
