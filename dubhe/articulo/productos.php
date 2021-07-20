<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de productos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div id="articulos" class="tabcontent">
    <?php
    include ("../navbar.php")
    ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-16">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Detalles de Artículos</h2>
                    <a href="crearProducto.php" class="btn btn-success pull-right">Añadir Datos</a>
                    <button class="btn btn-success pull-right" onclick="closePage()">Cancelar</button>
                </div>
                <?php
                // Include config file
                require_once "conexionPDO2.php";

                //-----------------------------------------Paginación: variables para hacer el calculo---------------------------------
                $sql1 = "SELECT * FROM articulos";
                $result1 = mysqli_query($base, $sql1);
                $pagina = 1;
                $lineas_paginas = 8;

                if (isset($_GET["pagina"])){
                    if ($_GET['pagina'] == 1){
                        header("location:productos.php");
                    }else{
                        $pagina = $_GET['pagina'];
                    }

                }
                $pagina_inicio = ($pagina-1)*$lineas_paginas;
                $filas = $result1->num_rows;
                $total_paginas = ceil($filas/$lineas_paginas);
                //---------------------------------------------------------------------------------------------------------------------
                // Attempt select query execution
                $sql = "SELECT * FROM articulos LIMIT $pagina_inicio,$lineas_paginas";
                if($result = mysqli_query($base, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Código</th>";
                        echo "<th>Sección</th>";
                        echo "<th>Fecha</th>";
                        echo "<th>Pais</th>";
                        echo "<th>Precio</th>";
                        echo "<th>Acción</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['codigo'] . "</td>";
                            echo "<td>" . $row['seccion'] . "</td>";
                            echo "<td>" . $row['fecha'] . "</td>";
                            echo "<td>" . $row['pais'] . "</td>";
                            echo "<td>" . $row['precio'] . "</td>";
                            echo "<td>";
                            echo "<a href='leerArticulo.php?id=". $row['id'] ."' title='Ver datos' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='actualizarArticulo.php?id=". $row['id'] ."' title='Editar datos' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='borrarArticulo.php?id=". $row['id'] ."' title='Borrar datos' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
//----------------------------------Paginación: numeros a pie de pagina----------------------------------------
                        echo "Páginas: ";
                        for ($i=1; $i<=$total_paginas; $i++){
                            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
                        }
//--------------------------------------------------------------------------------------
                        // Free result set
                        mysqli_free_result($result);

                    } else{
                        echo "<p class='lead'><em>No se encontraron datos.</em></p>";
                    }
                } else{
                    echo "ERROR: No se puede cargar la baase de datos $sql. " . mysqli_error($base);
                }

                // Close connection
                mysqli_close($base);
                ?>
                <script>
                    function closePage(){
                        window.close();
                    }
                </script>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>