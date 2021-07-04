<?php
include('conexionFacturas2.php');

$sql = ("SELECT codigoFac FROM facturas WHERE creado=(SELECT max(creado) FROM facturas) ORDER BY codigoFac DESC LIMIT 1");
$consulta = $base->prepare($sql);
$parametros = [$sql];
$consulta->execute($parametros);
while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $codigo = $registro['codigoFac'];
    $number = substr($codigo, 4);
    $root = substr_replace($codigo, "", 4);
    $nuevoCodigoF = $root . (intval($number) + 1);
}
//Encuentra el último albarán utilizado para asignar el código a un nueva factura
?>