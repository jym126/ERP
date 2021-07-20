<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Pagina de busqueda</title>
</head>
<body>
<?php
include 'conexionPresupuestos.php';
include 'gestionPresupuestos.php';
$database = new DatabaseP();
$dbP = $database->getConnection();
$items = new Presupuesto($dbP);
$records = $items->getPresupuestos();
$itemCount = $records->num_rows;

if($itemCount > 0){
    $presupuestoArr = array();
    $presupuestoArr["body"] = array();
    $employeeArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc())
    {
        array_push($presupuestoArr["body"], $row);
    }
    echo "<br>". "<h3>Total de Presupuestos: ".json_encode($itemCount)."</h3><br>";
    echo "<h4>ID --- Nombre </h4><br>";
    for ($i=0; $i<$itemCount; $i++){
        echo $presupuestoArr["body"][$i]["codigoAlb"]." - ".$presupuestoArr["body"][$i]["creado"];
        echo "<br>";
    }
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontraron registros.")
    );
}
?>
<br><br><a class="center" href="buscarPresupuesto.php" style="font-weight: bold">Volver</a>
</body>

</html>