<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Formulario Búsqueda</title>
</head>
<body>
<h2 style="text-align: center; color: white"  >Gestión de Albaranes</h2>
<form action="unicoAlbaran.php" method="get">
    <label>Código Albarán</label>
    <input type="text" name="codigoAlb"><br><br>
    <button type="submit" id="boton">Buscar</button>

</form>

<form action="buscarTodosAlbaran.php" method="get">
    <button type="submit" id="boton2">Buscar todos</button>
</form>

<form>
    <button type="button" id="boton2" onclick="location.href='borrarAlbaran.php';">Borrar Albarán</button>
</form>

</body>

</html>