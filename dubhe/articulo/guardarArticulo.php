<?php
// Include config file
require_once "conexionPDO2.php";
// Define variables and initialize with empty values
$nombre = $codigo = $seccion = $fecha = $pais = $precio = "";
$nombre_err = $codigo_err = $seccion_err = $fecha_err = $pais_err = $precio_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate nombre
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor introduzca un nombre.";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]/")))){
        $nombre_err = "Por favor introduzca un nombre válido.";
    } else{
        $nombre = $input_nombre;
    }

    // Validate cpdigo
    $input_codigo = trim($_POST["codigo"]);
    if(empty($input_codigo)){
        $codigo_err = "Por favor introduzca un código.";
    } else{
        $codigo = $input_codigo;
    }

    // Validate seccion
    $input_seccion = trim($_POST["seccion"]);
    if(empty($input_seccion)){
        $seccion_err = "Por favor introduzca la sección.";
    } else{
        $seccion = $input_seccion;
    }

    // Validate fecha
    $input_fecha = trim($_POST["fecha"]);
    if(empty($input_fecha)){
        $fecha_err = "Por favor introduzca la fecha.";
    } else{
        $fecha = $input_fecha;
    }

    // Validate pais
    $input_pais = trim($_POST["pais"]);
    if(empty($input_pais)){
        $pais_err = "Por favor introduzca el pais.";
    } else{
        $pais = $input_pais;
    }

    // Validate precio
    $input_precio = trim($_POST["precio"]);
    if(empty($input_precio)){
        $precio_err = "Por favor introduzca el precio.";
    } else{
        $precio = $input_precio;
    }

    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($codigo_err) && empty($seccion_err) && empty($fecha_err) && empty($pais_err)
        && empty($precio_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO articulos (codigo, seccion, nombre, fecha, pais, precio) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($base, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssd", $param_codigo, $param_seccion, $param_nombre,
                $param_fecha, $param_pais, $param_precio);

            // Set parameters
            $param_codigo = $codigo;
            $param_nombre = $nombre;
            $param_seccion = $seccion;
            $param_fecha = $fecha;
            $param_pais = $pais;
            $param_precio = $precio;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                echo "<script>alert('Artículo creado');</script>";
                echo "<script>window.close();</script>";
                exit();
            } else{
                echo "Algo salió mal. Por favor inténtelo mas tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($base);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear nuevo artículo</title>
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
                    <h2>Crear nuevo artículo</h2>
                </div>
                <p>Por favor complete el formulario y envíelo para añadir los articulos a la base de datos.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        <span class="help-block"><?php echo $nombre_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($codigo_err)) ? 'has-error' : ''; ?>">
                        <label>Código</label>
                        <textarea name="codigo" class="form-control"><?php echo $codigo; ?></textarea>
                        <span class="help-block"><?php echo $codigo_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($seccion_err)) ? 'has-error' : ''; ?>">
                        <label>Sección</label>
                        <input type="text" name="seccion" class="form-control" value="<?php echo $seccion; ?>">
                        <span class="help-block"><?php echo $seccion_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($fecha_err)) ? 'has-error' : ''; ?>">
                        <label>Fecha</label>
                        <input type="text" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
                        <span class="help-block"><?php echo $fecha_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>">
                        <label>Pais</label>
                        <input type="text" name="pais" class="form-control" value="<?php echo $pais; ?>">
                        <span class="help-block"><?php echo $pais_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>">
                        <label>Precio</label>
                        <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                        <span class="help-block"><?php echo $precio_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <a href="productos.php" class="btn btn-default">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>