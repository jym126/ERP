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
include 'conexionFacturas.php';
include 'gestionFacturas.php';
$database = new DatabaseF();
$dbF = $database->getConnection();
$items = new Factura($dbF);
$records = $items->getFacturas();
$itemCount = $records->num_rows;

if($itemCount > 0){
    $facturaArr = array();
    $facturaArr["body"] = array();
    $employeeArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc())
    {
        array_push($facturaArr["body"], $row);
    }
    echo "<br>". "<h3>Total de Albaranes: ".json_encode($itemCount)."</h3><br>";
    echo "<h4>ID --- Nombre </h4><br>";
    for ($i=0; $i<$itemCount; $i++){
        echo $facturaArr["body"][$i]["codigoFac"]." - ".$facturaArr["body"][$i]["creado"];
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
<br><br><a class="center" href="buscarFactura.php" style="font-weight: bold">Volver</a>
</body>

</html>