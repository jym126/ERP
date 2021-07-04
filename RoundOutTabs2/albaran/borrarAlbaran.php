<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
    <?php
    include_once 'conexionAlbaranes.php';
    include_once 'gestionAlbaranes.php';
    $database = new DatabaseA();
    $db = $database->getConnection();
    $item = new Albaran($db);

    $item->idAlb = isset($_GET['idAlb']) ? $_GET['idAlb']:die();

    if($item->deletealbaran()){
        echo json_encode("Albaran borrado.");
    } else{
        echo json_encode("El albaran no se pudo borrar");
    }
    echo "<br>";
    echo '<a href="../index.php">Volver</a>';
    echo "<br>";
    ?>
    </body>
</html>