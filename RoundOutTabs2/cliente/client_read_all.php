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
include 'database.php';
include 'gestionClientes.php';
$database = new DatabaseC();
$dbC = $database->getConnection();
$items = new Employee($dbC);
$records = $items->getEmployees();
$itemCount = $records->num_rows;

if($itemCount > 0){
$employeeArr = array();
$employeeArr["body"] = array();
$employeeArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($employeeArr["body"], $row);
}
echo "<br>". "<h3>Total de Clientes: ".json_encode($itemCount)."</h3><br>";
echo "<h4>ID --- Nombre </h4><br>";
for ($i=0; $i<$itemCount; $i++){
echo $employeeArr["body"][$i]["id"]." - ".$employeeArr["body"][$i]["name"];
echo "<br>";
}
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>
<br><br><a class="center" href="cliente_buscar.php" style="font-weight: bold">Volver</a>
</body>

</html>