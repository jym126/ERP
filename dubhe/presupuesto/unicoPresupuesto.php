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

//Busqueda y localización del albarán
include('conexionPresupuestos.php');
include('gestionPresupuestos.php');
$database = new DatabaseP();
$dbP = $database->getConnection();
$item = new Presupuesto($dbP);
$item->codigoPre = isset($_GET['codigoPre']) ? $_GET['codigoPre'] : die();
$item->getSinglePresupuesto();
if ($item->codigoPre != null) {

// create array
    $pre_arr = array(
            "idPre" => $item->idPre,
        "codigoPre" => $item->codigoPre,
        "codigoCliente" => $item->codigoCliente,
        "item1" => $item->item1,
        "item2" => $item->item2,
        "item3" => $item->item3,
        "item4" => $item->item4,
        "item5" => $item->item5,
        "item6" => $item->item6,
        "item7" => $item->item7,
        "item8" => $item->item8,
        "item9" => $item->item9,
        "item10" => $item->item10
    );

    http_response_code(200);
    $myjson = json_encode($pre_arr);

    //Busqueda y localización de Artículos
    for ($i=1; $i<=10; $i++) {
        $busqueda = $pre_arr['item'.$i];
        if ($busqueda != "") {

            try {

                require("../articulo/conexionPDO.php");
                //Realizamos la consulta con LIKE para poder hacer busquedas parciales
                $sql = ("SELECT * FROM articulos WHERE codigo = '$busqueda'");
                $consulta = $base->prepare($sql);
                //Como no podemos meter los % en la consulta creamos una nueva variable que sea igual a la busqueda
                //con los % a ambos lados para hacer busqueda por contenido.
                $parametros = [$busqueda];
                $consulta->execute($parametros);
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $nombre[] = "";
                    $precio[] = "";
                    array_push($nombre, $registro['nombre']);
                    array_push($precio, $registro['precio']);
                }
                $consulta->closeCursor();

            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }

        }
    }

//Búsqueda y localización del cliente
include('../cliente/database.php');
include('../cliente/gestionClientes.php');
$database = new DatabaseC();
$dbC = $database->getConnection();
$item2 = new Employee($dbC);
$item2->id = $item->codigoCliente;
$item2->getSingleEmployee();
if ($item2->name != null) {

// create array
    $emp_arr = array(
        "id" => $item2->id,
        "name" => $item2->name,
        "lastName" => $item2->lastName,
        "email" => $item2->email,
        "designation" => $item2->designation,
        "address" => $item2->address,
        "phone" => $item2->phone,
        "created" => $item2->created
    );
}
    http_response_code(200);
    $myjson = json_encode($emp_arr);

    echo "<br>";
    echo '<h3>Información del Presupuesto: ' . '</h3>';
    echo "<br>";
    echo "-------------------------------------------------------------------------<br>";
    echo "<div id='resultado' onclick='setData(this)'>";
    echo "-ID Presupuesto: -".$item->idPre;
    echo "<br>";
    echo "-Código: -" .$item->codigoPre;
    echo "<br>";
    echo "-item1: -" .$item->item1;
    echo "<br>";
    echo "-item2: -" .$item->item2;
    echo "<br>";
    echo "-item3: -" .$item->item3;
    echo "<br>";
    echo "-item4: -" .$item->item4;
    echo "<br>";
    echo "-item5: -" .$item->item5;
    echo "<br>";
    echo "-item6: -" .$item->item6;
    echo "<br>";
    echo "-item7: -" .$item->item7;
    echo "<br>";
    echo "-item8: -" .$item->item8;
    echo "<br>";
    echo "-item9: -" .$item->item9;
    echo "<br>";
    echo "-item10: -" .$item->item10;
    echo "<br>";
    echo "-Creado: -" .$item->creado;
    echo "<br>";
    echo "-ID Cliente: -" .$item2->id;
    echo "<br>";
    echo "-Nombre: -" .$item2->name;
    echo "<br>";
    echo "-Apellido: -" .$item2->lastName;
    echo "<br>";
    echo "-Email: -" .$item2->email;
    echo "<br>";
    echo "-Dirección: -" .$item2->address;
    echo "<br>";
    echo "-Teléfono: -" .$item2->phone;
    echo "<br>";
    if (!empty($nombre[1])) {echo "-".$nombre[1];}
    if (!empty($precio[1])) {echo "-".$precio[1];}
    if (!empty($nombre[3])) {echo "-".$nombre[3];}
    if (!empty($precio[3])) {echo "-".$precio[3];}
    if (!empty($nombre[5])) {echo "-".$nombre[5];}
    if (!empty($precio[5])) {echo "-".$precio[5];}
    if (!empty($nombre[7])) {echo "-".$nombre[7];}
    if (!empty($precio[7])) {echo "-".$precio[7];}
    if (!empty($nombre[9])) {echo "-".$nombre[9];}
    if (!empty($precio[9])) {echo "-".$precio[9];}
    if (!empty($nombre[11])) {echo "-".$nombre[11];}
    if (!empty($precio[11])) {echo "-".$precio[11];}
    if (!empty($nombre[13])) {echo "-".$nombre[13];}
    if (!empty($precio[13])) {echo "-".$precio[13];}
    if (!empty($nombre[15])) {echo "-".$nombre[15];}
    if (!empty($precio[15])) {echo "-".$precio[15];}
    if (!empty($nombre[17])) {echo "-".$nombre[17];}
    if (!empty($precio[17])) {echo "-".$precio[17];}
    if (!empty($nombre[19])) {echo "-".$nombre[19];}
    if (!empty($precio[19])) {echo "-".$precio[19];}
    echo "</div>";
    echo "--------------------------------------------------------------------------";
} else {
    http_response_code(404);
    echo json_encode("Presupuesto no encontrado.");
}
?>
<div>
    <script type="text/javascript">
        function setData(sel) {
            myData = sel.innerText.split("-");
            if (window.opener != null && !window.opener.closed) {
                var idPre = myData[2];
                var codigoPre = myData[4];
                var codigoCliente = myData[30]
                var miNombre = myData[32];
                var miApellido = myData[34];
                var miEmail = myData[36];
                var miDireccion = myData[38];
                var miTelefono = myData[40];
                if (myData[41]){var nombreArt1 = myData[41];}
                else {nombreArt1 = ""}
                if (myData[42]){var precio1 = myData[42];}
                else {precio1 = 0}
                if (myData[43]){var nombreArt2 = myData[43];}
                else {nombreArt2 = ""}
                if (myData[44]){var precio2 = myData[44];}
                else {precio2 = 0}
                if (myData[45]){var nombreArt3 = myData[45];}
                else {nombreArt3 = ""}
                if (myData[46]){var precio3 = myData[46];}
                else {precio3 = 0}
                if (myData[47]){var nombreArt4 = myData[47];}
                else {nombreArt4 = ""}
                if (myData[48]){var precio4 = myData[48];}
                else {precio4 = 0}
                if (myData[49]){var nombreArt5 = myData[49];}
                else {nombreArt5 = ""}
                if (myData[50]){var precio5 = myData[50];}
                else {precio5 = 0}
                if (myData[51]){var nombreArt6 = myData[51];}
                else {nombreArt6 = ""}
                if (myData[52]){var precio6 = myData[52];}
                else {precio6 = 0}
                if (myData[53]){var nombreArt7 = myData[53];}
                else {nombreArt7 = ""}
                if (myData[54]){var precio7 = myData[54];}
                else {precio7 = 0}
                if (myData[55]){var nombreArt8 = myData[55];}
                else {nombreArt8 = ""}
                if (myData[56]){var precio8 = myData[56];}
                else {precio8 = 0}
                if (myData[57]){var nombreArt9 = myData[57];}
                else {nombreArt9 = ""}
                if (myData[58]){var precio9 = myData[58];}
                else {precio9 = 0}
                if (myData[59]){var nombreArt10 = myData[59];}
                else {nombreArt10 = ""}
                if (myData[60]){var precio10 = myData[60];}
                else {precio10 = 0}
                /*Se asignan los valores del cliente*/
                window.opener.document.getElementById('codigoPreBorrar').value = idPre;
                window.opener.document.getElementById('codigo').value = codigoPre;
                window.opener.document.getElementById('id').value = codigoCliente;
                window.opener.document.getElementById('name').value = miNombre;
                window.opener.document.getElementById('apellido').value = miApellido;
                window.opener.document.getElementById('email').value = miEmail;
                window.opener.document.getElementById('direccion').value = miDireccion;
                window.opener.document.getElementById('telefono').value = miTelefono;
                /*Se asignan los valores de los artículos*/
                window.opener.document.getElementById('codigoArt1').value = myData[6];
                window.opener.document.getElementById('nombreArt1').value = nombreArt1;
                window.opener.document.getElementById('precio1').value = precio1;
                window.opener.document.getElementById('codigoArt2').value = myData[8];
                window.opener.document.getElementById('nombreArt2').value = nombreArt2;
                window.opener.document.getElementById('precio2').value = precio2;
                window.opener.document.getElementById('codigoArt3').value = myData[10];
                window.opener.document.getElementById('nombreArt3').value = nombreArt3;
                window.opener.document.getElementById('precio3').value = precio3;
                window.opener.document.getElementById('codigoArt4').value = myData[12];
                window.opener.document.getElementById('nombreArt4').value = nombreArt4;
                window.opener.document.getElementById('precio4').value = precio4;
                window.opener.document.getElementById('codigoArt5').value = myData[14];
                window.opener.document.getElementById('nombreArt5').value = nombreArt5;
                window.opener.document.getElementById('precio5').value = precio5;
                window.opener.document.getElementById('codigoArt6').value = myData[16];
                window.opener.document.getElementById('nombreArt6').value = nombreArt6;
                window.opener.document.getElementById('precio6').value = precio6;
                window.opener.document.getElementById('codigoArt7').value = myData[18];
                window.opener.document.getElementById('nombreArt7').value = nombreArt7;
                window.opener.document.getElementById('precio7').value = precio7;
                window.opener.document.getElementById('codigoArt8').value = myData[20];
                window.opener.document.getElementById('nombreArt8').value = nombreArt8;
                window.opener.document.getElementById('precio8').value = precio8;
                window.opener.document.getElementById('codigoArt9').value = myData[22];
                window.opener.document.getElementById('nombreArt9').value = nombreArt9;
                window.opener.document.getElementById('precio9').value = precio9;
                window.opener.document.getElementById('codigoArt10').value = myData[24];
                window.opener.document.getElementById('nombreArt10').value = nombreArt10;
                window.opener.document.getElementById('precio10').value = precio10;
                valor = window.opener.document.getElementById('total').innerHTML =
                    (parseFloat(precio1) + parseFloat(precio2) +
                        parseFloat(precio3) + parseFloat(precio4) +
                        parseFloat(precio5) + parseFloat(precio6) +
                        parseFloat(precio7) + parseFloat(precio8) +
                        parseFloat(precio9) + parseFloat(precio10)).toFixed(2);
                iva = window.opener.document.getElementById('iva').innerHTML = (valor*21/100).toFixed(2);
                window.opener.document.getElementById('gTotal').innerHTML = (parseFloat(valor) + parseFloat(iva)).toFixed(2) + "€";
            }
            window.close();
        }
    </script>
</div>
<br><br><a class="center" href="buscarPresupuesto.php" style="font-weight: bold">Volver</a>
</body>

</html>
