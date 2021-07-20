<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
    <?php
    include_once 'conexionPresupuestos.php';
    include_once 'gestionPresupuestos.php';
    $database = new DatabaseP();
    $dbP = $database->getConnection();
    $item = new Presupuesto($dbP);

    $item->idPre = isset($_GET['idPre']) ? $_GET['idPre']:die();

    if($item->deletepresupuesto()){
        echo json_encode("Presupuesto borrado.");
        echo '<a href="presupuesto.php">Volver</a>';
    } else{
        echo json_encode("El presupuesto no se pudo borrar");
        echo '<a href="presupuesto.php">Volver</a>';
    }
    echo "<br>";
    echo '<a href="../index2.php">Volver</a>';
    echo "<br>";
    ?>
    </body>
</html>