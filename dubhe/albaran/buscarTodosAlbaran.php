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
include 'conexionAlbaranes.php';
include 'gestionAlbaranes.php';
$database = new DatabaseA();
$dbA = $database->getConnection();
$items = new Albaran($dbA);
$records = $items->getAlbaranes();
$itemCount = $records->num_rows;

if($itemCount > 0){
    $albaranArr = array();
    $albaranArr["body"] = array();
    $employeeArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc())
    {
        array_push($albaranArr["body"], $row);
    }
    echo "<br>". "<h3>Total de Albaranes: ".json_encode($itemCount)."</h3><br>";
    echo "<h4>ID --- Nombre </h4><br>";
    for ($i=0; $i<$itemCount; $i++){
        echo $albaranArr["body"][$i]["codigoAlb"]." - ".$albaranArr["body"][$i]["creado"];
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
<br><br><a class="center" href="buscarAlbaran.php" style="font-weight: bold">Volver</a>
</body>

</html>