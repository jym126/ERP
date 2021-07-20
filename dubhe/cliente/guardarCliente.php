<!DOCTYPE html>
<html lang="en">
<head>

    <title>Guardar Cliente</title>
</head>
<body>
    <?php
    include_once 'database.php';
    include_once 'gestionClientes.php';
    $database = new DatabaseC();
    $db = $database->getConnection();
    $item = new Employee($db);

    $item->id = $_GET['id'];
    $item->name = $_GET['name'];
    $item->lastName = $_GET['lastName'];
    $item->designation = $_GET['designation'];
    $item->email = $_GET['email'];
    $item->phone = $_GET['phone'];
    $item->address = $_GET['address'];
    $item->created = date('Y-m-d H:i:s');
    if($item->createEmployee()){
        echo 'Cliente creado con exito.';
        echo '<br>';
        echo '<a href="../index2.php">Volver</a>';
    } else{
        echo 'El cliente no pudo ser creado.';
        echo '<br>';
        echo '<a href="../index2.php">Volver</a>';
    }
    ?>
    </body>
</html>