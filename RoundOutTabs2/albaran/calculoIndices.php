<?php
include('conexionAlbaranes2.php');

$sql = ("SELECT codigoAlb FROM albaranes WHERE creado=(SELECT max(creado) FROM albaranes) ORDER BY codigoAlb DESC LIMIT 1");
$consulta = $base->prepare($sql);
$parametros = [$sql];
$consulta->execute($parametros);
while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $codigo = $registro['codigoAlb'];
    $number = substr($codigo, 4);
    $root = substr_replace($codigo, "", 4);
    $nuevoCodigo = $root . (intval($number) + 1);
}
//Encuentra el último albarán utilizado para asignar el código a un nuevo albaran
?>