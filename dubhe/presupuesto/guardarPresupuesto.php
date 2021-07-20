<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Guardar Presupuesto</title>
</head>

    <?php
    include_once 'conexionPresupuestos.php';
    include_once 'gestionPresupuestos.php';
    $database = new DatabaseP();
    $dbP = $database->getConnection();
    $item = new Presupuesto($dbP);
    $item->codigoCliente = isset($_GET['codigoCliente']);
    $item->codigoCliente = $_GET['codigoCliente'];
    $item->codigoPre = $_GET['codigoPre'];
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
    if($item->createPresupuestos()){
        echo 'Presupuesto creado con exito.';
        echo '<br>';
        echo '<a href="./presupuesto.php">Volver</a>';
    } else{
        echo 'El presupuesto no pudo ser creado.';
        echo '<a href="./presupuesto.php">Volver</a>';
    }
    ?>
<body>
</body>

</html>