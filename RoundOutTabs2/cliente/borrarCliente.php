<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
include_once 'database.php';
include_once 'gestionClientes.php';
$database = new DatabaseC();
$dbC = $database->getConnection();
$item = new Employee($dbC);

$item->id = isset($_GET['idCli']) ? $_GET['idCli']:die();

if($item->deleteEmployee()){
    echo json_encode("Cliente borrado.");
} else{
    echo json_encode("El cliente no se pudo borrar");
}
echo "<br>";
echo '<a href="../index.php">Volver</a>';
echo "<br>";
?>
</body>
</html>
