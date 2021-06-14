<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guardar Albaran</title>
</head>
    <?php
    include ("navbar.php")
    ?>
    <?php
    include_once 'configDB.php';
    include_once 'employee.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Employee($db);


    $item->name = $_GET['name'];
    $item->email = $_GET['email'];
    $item->designation = $_GET['designation'];
    $item->created = date('Y-m-d H:i:s');
    if($item->createEmployee()){
        echo 'Empleado creado con exito.';
    } else{
        echo 'El empleado no pudo ser creado.';
    }
    ?>
    </body>
    <?php
    include ("footer.php")
    ?>
</html>