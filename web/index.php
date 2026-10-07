<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "otro"
    ],
    [
        "TEXTO" => "index",
        "ADICIONAL" => "&copy;&copy;"
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Prácticas de PHP", $barra);
cuerpo();  //llamo a la vista
finCuerpo();

// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <a href="./aplicacion/practicas/relacion1/index.php">Relación 1</a>
<?php
}
