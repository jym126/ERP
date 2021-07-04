<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pagina de busqueda</title>
</head>
<body>
<?php
include('database.php');
include('gestionClientes.php');
$database = new DatabaseC();
$dbC = $database->getConnection();
$item = new Employee($dbC);
$item->id = isset($_GET['id']) ? $_GET['id'] : die() or $item->name = isset($_GET['name']) ? $_GET['name'] : die();
$item->getSingleEmployee();
if ($item->name != null) {

// create array
    $emp_arr = array(
        "id" => $item->id,
        "name" => $item->name,
        "lastName" => $item->lastName,
        "email" => $item->email,
        "designation" => $item->designation,
        "address" => $item->address,
        "phone" => $item->phone,
        "created" => $item->created
    );

    http_response_code(200);
    $myjson = json_encode($emp_arr);

    echo "<br>";
    echo '<h3>Información del Cliente: ' . '</h3>';
    echo "<br>";
    echo "-------------------------------------------------------------------------<br>";
    echo "<div id='resultado' onclick='setData(this)'>";
    echo "-ID: -" .$item->id;
    echo "<br>";
    echo "-Nombre: -" .$item->name;
    echo "<br>";
    echo "-Apellido: -" .$item->lastName;
    echo "<br>";
    echo "-Email: -" .$item->email;
    echo "<br>";
    echo "-Dirección: -" .$item->address;
    echo "<br>";
    echo "-Teléfono: -" .$item->phone;
    echo "<br>";
    echo "-Creado: -" .$item->created;
    echo "<br>";
    echo "</div>";
    echo "--------------------------------------------------------------------------";
} else {
    http_response_code(404);
    echo json_encode("Cliente no encontrado.");
}
?>
<div>
    <script type="text/javascript">
        function setData(sel) {
            myData = sel.innerText.split("-");
            var miCodigo = myData[2];
            var miNombre = myData[4];
            var miApellido = myData[6];
            var miEmail = myData[8];
            var miDireccion = myData[10];
            var miTelefono = myData[12];
            if (window.opener != null && !window.opener.closed) {
                window.opener.document.getElementById('id').value = miCodigo;
                window.opener.document.getElementById('name').value = miNombre;
                window.opener.document.getElementById('apellido').value = miApellido;
                window.opener.document.getElementById('email').value = miEmail;
                window.opener.document.getElementById('direccion').value = miDireccion;
                window.opener.document.getElementById('telefono').value = miTelefono;
            }
            window.close();
        }
    </script>
</div>
<br><br><a class="center" href="cliente_buscar.php" style="font-weight: bold">Volver</a>
</body>

</html>
