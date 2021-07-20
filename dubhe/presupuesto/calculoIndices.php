<?php
include('conexionPresupuestos2.php');

$sql = ("SELECT codigoPre FROM presupuestos WHERE id=(SELECT max(id) FROM presupuestos) ORDER BY codigoPre DESC LIMIT 1");
$consulta = $base->prepare($sql);
$parametros = [$sql];
$consulta->execute($parametros);
while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $codigo = $registro['codigoPre'];
    $number = substr($codigo, 4);
    $root = substr_replace($codigo, "", 4);
    $nuevoCodigoP = $root . (intval($number) + 1);
}
//Encuentra el último presupuesto utilizado para asignar el código a un nuevo presupuesto
?>