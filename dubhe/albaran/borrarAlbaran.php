<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Borrar Albarán</title>
</head>
<body>
    <?php
    include_once 'conexionAlbaranes.php';
    include_once 'gestionAlbaranes.php';
    $database = new DatabaseA();
    $dbA = $database->getConnection();
    $item = new Albaran($dbA);

    $item->idAlb = isset($_GET['idAlb']) ? $_GET['idAlb']:die();

    if($item->deletealbaran()){
        echo json_encode("Albaran borrado.");
        echo '<a href="albaran.php">Volver</a>';
    } else{
        echo json_encode("El albaran no se pudo borrar");
        echo '<a href="albaran.php">Volver</a>';
    }
    echo "<br>";
    echo '<a href="../index2.php">Volver</a>';
    echo "<br>";
    ?>
</body>
</html>