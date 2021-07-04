<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Guardar Factura</title>
</head>

    <?php
    include_once 'conexionFacturas.php';
    include_once 'gestionFacturas.php';
    $database = new DatabaseF();
    $dbF = $database->getConnection();
    $item = new Factura($dbF);
    $item->codigoCliente = $_GET['codigoCliente'];
    $item->codigoFac = $_GET['codigoFac'];
    $item->item1 = $_GET['item1'];
    $item->item2 = $_GET['item2'];
    $item->item3 = $_GET['item3'];
    $item->item4 = $_GET['item4'];
    $item->item5 = $_GET['item5'];
    $item->item6 = $_GET['item6'];
    $item->item7 = $_GET['item7'];
    $item->item8 = $_GET['item8'];
    $item->item9 = $_GET['item9'];
    $item->item10 = $_GET['item10'];
    $item->creado = date('Y-m-d H:i:s');
    if($item->createFactura()){
        echo 'Factura creada con exito.';
        echo '<br>';
        echo '<a href="../index.php">Volver</a>';
    } else{
        echo 'La factura no pudo ser creada.';
        echo '<br>';
        echo '<a href="../index.php">Volver</a>';
    }
    ?>
<body>
</body>

</html>