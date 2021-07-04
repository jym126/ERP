<!DOCTYPE html5>
<html lang="en-us">
<head>

    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Búsqueda</title>

</head>
<body>
    <h2 class="center">Artículos encontrados:</h2><br>
<?php

    //clausula para evitar mostrar el error cuando al imprimir el documento se llama a la pagina por segunda vez
    //y la variable "buscar" está vacía.
    error_reporting(0);
    //Se captura de la pagina de formBuscar lo que el usuario ha puesto en el campo con nombre "buscar".
    $busqueda = $_GET['buscar'];

    if ($busqueda != "") {

        try {

            require("conexionPDO.php");
            //Realizamos la consulta con LIKE para poder hacer busquedas parciales
            $sql = ("SELECT * FROM articulos WHERE nombre LIKE ?");
            $consulta = $base->prepare($sql);
            //Como no podemos meter los % en la consulta creamos una nueva variable que sea igual a la busqueda
            //con los % a ambos lados para hacer busqueda por contenido.
            $parametros = ["%$busqueda%"];
            $consulta->execute($parametros);
            echo "<b>CÓDIGO - NOMBRE - ARTÍCULO - PRECIO - SECCIÓN - PAÍS </b><br><br>";
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $nombre = $registro['nombre'];
                $codigo = $registro['codigo'];
                $seccion = $registro['seccion'];
                $precio = $registro['precio'];
                $pais = $registro['pais'];
                $imagen = $registro['imagen'];

                $resultado = "<div onclick='setData(this)'>" . $codigo . ", " . $nombre . ", " . $precio . ", " . $seccion . ", " . $pais. ", " . $imagen."</div><br><br>" ;

                //Se imprime el resultado en pantalla
                echo "<div id='resultado'>" . $resultado . "</div>";
            }
            $consulta->closeCursor();

        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

    }else{
        echo "<div>Debe introducir una búsqueda</div>"."<br><br>";
    }
?>

    <div>
    <button type="button" name="Submit" onclick="window.print()">Imprimir</button><br><br>

    </div>
    <div>
        <script type="text/javascript">
            function setData(sel) {
                myData = sel.innerText.split(",");
                var miCodigo = myData[0];
                var miNombre = myData[1];
                var miPrecio = myData[2];
                var miImagen = myData[5];
                if (window.opener != null && !window.opener.closed) {
                    var codigoArt = window.opener.document.getElementById("codigoArt");
                    var nombreArt = window.opener.document.getElementById("nombreArt");
                    var precio = window.opener.document.getElementById("precio");
                    var imagen = window.opener.document.getElementById("imagen");
                    codigoArt.value = miCodigo;
                    nombreArt.value = miNombre;
                    precio.value = miPrecio;
                    imagen.value = miImagen;
                }
                window.close();
            }
        </script>
    </div>
    <a class="center" href="formBuscarArticulos.php" style="font-weight: bold">Volver</a>
</body>

</html>
