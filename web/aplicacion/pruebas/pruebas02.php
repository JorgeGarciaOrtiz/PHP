<?php

// Incluimos la cabecera y la plantilla de la aplicación
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Variable con el titulo
$titulo = "Pruebas 02";

// Ruta de navegación de la página
$ubicacion = [
    "Inicio" => "../../../index.php",
    "Pruebas" => "./index.php",
    $titulo => ""
];

// ==========================================================
// CONTROLADOR
// ==========================================================

const PI_2 = 3.141592;

// ==========================================================
// PLANTILLA
// ==========================================================

// Cabecera de la página
inicioCabecera($titulo);
cabecera();
finCabecera();

// Cuerpo de la página
inicioCuerpo($titulo, $ubicacion);
cuerpo();
finCuerpo();

// ==========================================================
// VISTA
// ==========================================================

function cabecera() {}

function cuerpo()
{
?>
    <?php

    // ***********************************************************************************
    // 3.1. Cómo escribir PHP
    // ***********************************************************************************

    echo "Hola";

    // Generar HTML desde PHP
    echo "<br><span>Esto es HTML</span><br>";

    // ***********************************************************************************
    // 3.2. Las variables
    // ***********************************************************************************

    // No es necesario declarar las variables

    $edad = 15;

    // PHP cambia el tipo de la variable según el valor:

    $cadena = 15;       // entero
    $cadena = 12.7;     // decimal
    $cadena = "hola";   // cadena
    $cadena = 100;      // entero

    // ***********************************************************************************
    // Variables Superglobales
    // ***********************************************************************************

    // $_SERVER --> Información del servidor y cliente
    // $_GET --> Datos enviados mediante GET
    // $_POST --> Datos enviados mediante POST
    // $_REQUEST --> Datos de GET, POST y otros
    // $_COOKIE	Cookies del cliente
    // $_FILES	Archivos subidos
    // $_ENV	Variables de entorno

    // ***********************************************************************************
    // isset($x);
    // ***********************************************************************************

    // Comprueba si una variable tiene un valor asignado.

    $galletas = 12;

    if (isset($galletas)) {
        echo "<br>true";
    }

    // ***********************************************************************************
    // unset();
    // ***********************************************************************************

    // Elimina la variable por completo

    unset($galletas);

    // ***********************************************************************************
    // error_reporting()
    // ***********************************************************************************

    // Muestra todos los errores y avisos relevantes.

    error_reporting(E_ALL);

    // ***********************************************************************************
    // Variable-variable
    // ***********************************************************************************

    // $$ → variable cuyo nombre está dentro de otra variable
    // $$var ($var = "nombre") --> $nombre --> "Profesor";

    $nombre = "Profesor";
    $var = "nombre";

    echo "<br>" . $$var . "<br>";

    // ***********************************************************************************
    // Variable-función
    // ***********************************************************************************

    // Una variable contiene el nombre de una función y podemos ejecutarla

    // Creamos una función
    function funcionParaSaludar($nombre1, $nombre2)
    {
        echo "Hola a " . $nombre1 . " y a " . $nombre2 . "<br>";
    }

    // Asignamos la función a nuestra variable
    $nombresPersonas = "funcionParaSaludar";
    $alumnos = "funcionParaSaludar";

    // Ejecutamos la función a traves del nombre de nuestra variable
    $nombresPersonas("Jorge", "Nicky"); // Resultado: Hola a Jorge y a Nicky
    $alumnos("Jorge", "Nicky"); // Resultado: Hola a Jorge y a Nicky

    // ***********************************************************************************
    // Variable-clase
    // ***********************************************************************************

    // Una variable contiene el nombre de una clase

    class MiClase
    {
        // ...
    }

    $var = "MiClase";

    // ***********************************************************************************
    // 3.3. Tipos de datos en PHP
    // ***********************************************************************************

    // En PHP no hace falta declarar el tipo de una variable. El tipo depende del valor que tenga.

    // integer -->	Número entero -->	12, -5
    // float/double -->	Número decimal -->	12.5
    // boolean --> Verdadero o falso --> true, false
    // string --> Texto --> "Hola"
    // array --> Conjunto de elementos --> [1, 2, 3]
    // object --> Objeto --> $persona
    // resource --> Recurso externo --> Conexión BD
    // NULL --> Sin valor --> null

    // Para saber el tipo:
    echo gettype($var);

    // Si la variable es del mismo tipo al del la función da 1
    echo is_integer($var);
    echo is_bool($var);
    echo is_float($var);
    echo is_string($var); // 1
    echo is_object($var);

    // ***********************************************************************************
    // Enteros
    // ***********************************************************************************

    // Pueden ser positivos, negativos o estar en diferentes bases

    $num = 12;       // Decimal
    $num = -100;     // Negativo
    $num = 0b10011;  // Binario
    $num = 02361;    // Octal
    $num = 0x12A;    // Hexadecimal

    // ***********************************************************************************
    // Reales / float
    // ***********************************************************************************

    // Los numeros reales (floats) no son exactos → siempre hay error.
    $real = 1234.345678901234567890; // al depurar nos pone que el valor es: 1234.3456789012346
    $real += 0.4321099;

    // ***********************************************************************************
    // Cadenas / String
    // ***********************************************************************************

    $cad = "<br>Manzana";
    $cad = '<br>Manzana';

    echo $cad = "<br>Lamine Yamal 'Balon de oro'";
    echo $cad = '<br>Lamine Yamal "Balon de oro"<br>';

    /*
    Comillas dobles (" ") permiten:
        \n  // Nueva línea
        \t  // Tabulador
        \"  // Comilla doble
        \\  // Barra \
        \$  // Símbolo $
    */

    // También permiten introducir variables:

    $jugador = "Pedri";

    echo "Hola $jugador";

    // ***********************************************************************************
    // Booleanos
    // ***********************************************************************************

    $verdadero = true;
    echo "<br>" . $verdadero; // 1

    // true → normalmente se muestra como 1
    // false → normalmente no muestra nada

    // ***********************************************************************************
    // NULL
    // ***********************************************************************************

    // Una variable no tiene valor

    $var = null;

    // Se elimina con unset():
    unset($var);

    // ***********************************************************************************
    // Conversión de tipos
    // ***********************************************************************************

    $num = 12;

    // Implícita --> PHP lo hace automáticamente:

    $num = $num + 2.5;   // float (decimal)

    // Explícita -> Nosotros indicamos el tipo:

    $num = (int)$num;       // integer
    $num = (bool)$num;      // boolean
    $num = (float)$num;     // float
    $num = (string)$num;    // string
    $num = (array)$num;     // array
    $num = (object)$num;    // object

    $num = 12;

    $num = intval($num);    // 16 → integer
    $num = floatval($num);  // float
    $num = boolval($num);   // boolean
    $num = strval($num);    // string

    // gettype() → dice qué tipo tiene una variable
    // settype() cambia el tipo de una variable, devuelve true o false si la conversion se ha realizado bien

    $var = 125;              // $var → integer
    $var = (float)$var;      // $var → float
    $tipo = gettype($var);   // gettype() devuelve "float" → $tipo → string

    settype($var, "integer"); // settype() devuelve boolean, $var → integer
    $tipo = gettype($var);    // gettype() devuelve "integer", $tipo → string

    // ***********************************************************************************
    // 3.4. Referencias & en PHP
    // ***********************************************************************************

    // & → hace que dos variables estén conectadas y compartan el mismo valor.

    $var1 = 100; // $var1 = 100
    $var2 = $var1; // $var2 = 100 → copia el valor
    $var3 = &$var1; // $var3 = 100 → referencia a $var1

    // $var1 y $var3 están conectadas a la misma zona de memoria.

    $var2 = 150; // $var2 cambia → $var1 NO cambia → $var1 = 100
    // $var3 sigue referenciando a $var1 → $var3 = 100

    $var3 = 200; // $var3 cambia → $var1 también cambia → $var1 = 200
    // $var2 se queda igual → $var2 = 150

    // ***********************************************************************************
    // 3.5. Referencias & en PHP
    // ***********************************************************************************

    // Valor que no cambia y no lleva $

    define("PI", 3.141592);
    // const PI_2 = 3.141592; // como estamos dentro de una funcion aqui no podemos declarar una constante, la he creado en la linea 5

    echo "<br>" . PI . "<br>";
    echo PI_2 . "<br>";

    ?>
<?php
}
