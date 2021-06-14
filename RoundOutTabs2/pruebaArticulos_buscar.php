<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="javascript" src="js/jquery.json-2.3.js" type="text/javascript"></script>
    <title>Busqueda</title>

    <script type="text/javascript" src="js/consulta.js"></script>

</head>
<body>
<div id="busqueda">
    <h2 style="text-align: center"  >Introduzca un artículo para buscar</h2>
    <form id="formPrueba" name="formPrueba" action="pruebaBuscarArticulos.php" method="post">

        <label>Artículo</label>
            <input type="text" name="buscar" value="">
        <br><br>
        <button type="button" name="boton" onclick="miConsulta('formPrueba')">Buscar</button>
    </form><br>
    <h3>Codigo - Nombre - Precio</h3>
    <div id="codigo"></div>
</div>
</body>
</html>