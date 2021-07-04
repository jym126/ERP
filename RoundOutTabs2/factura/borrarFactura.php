<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
    <?php
    include_once 'conexionFacturas.php';
    include_once 'gestionFacturas.php';
    $database = new DatabaseF();
    $dbF = $database->getConnection();
    $item = new Factura($dbF);

    $item->idFac = isset($_GET['idFac']) ? $_GET['idFac']:die();

    if($item->deleteFactura()){
        echo json_encode("Factura borrada.");
    } else{
        echo json_encode("La factura no se pudo borrar");
    }
    echo "<br>";
    echo '<a href="../index.php">Volver</a>';
    echo "<br>";
    ?>
    </body>
</html>