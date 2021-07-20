<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Actualizar Albarán</title>
</head>

<?php
include_once 'conexionAlbaranes.php';
include_once 'gestionAlbaranes.php';
$database = new DatabaseA();
$dbA = $database->getConnection();
$item = new Albaran($dbA);
$item->idAlb = $_GET['idAlb'];
$item->codigoCliente = $_GET['codigoCliente'];
$item->codigoAlb = $_GET['codigoAlb'];
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
if($item->updateAlbaran()){
    echo 'Albarán actualizado con exito.';
    echo '<br>';
    echo '<a href="../index2.php">Volver</a>';
} else{
    echo 'El albarán no pudo ser actualizado.';
    echo '<br>';
    echo '<a href="../index2.php">Volver</a>';
}
?>
<body>
</body>

</html>