<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "conexionPDO2.php";

    // Prepare a select statement
    $sql = "SELECT * FROM articulos WHERE id = ?";

    if($stmt = mysqli_prepare($base, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $nombre = $row["nombre"];
                $codigo = $row["codigo"];
                $seccion = $row["seccion"];
                $fecha = $row["fecha"];
                $pais = $row["pais"];
                $precio = $row["precio"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            echo "Oops! Algo salió mal. Por favor intentelo mas tarde.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($base);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver datos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="articulos" class="tabcontent">
    <?php
    include ("../navbar.php")
    ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Ver datos</h1>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <p class="form-control-static"><?php echo $row["nombre"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Código</label>
                    <p class="form-control-static"><?php echo $row["codigo"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Sección</label>
                    <p class="form-control-static"><?php echo $row["seccion"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Fecha</label>
                    <p class="form-control-static"><?php echo $row["fecha"]; ?></p>
                </div>
                <div class="form-group">
                    <label>País</label>
                    <p class="form-control-static"><?php echo $row["pais"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <p class="form-control-static"><?php echo $row["precio"]; ?></p>
                </div>
                <p><a href="productos.php" class="btn btn-primary">volver</a></p>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>