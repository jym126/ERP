<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Formulario Búsqueda</title>
</head>
<body>
<h2 style="text-align: center; color: white"  >Gestión de Presupuestos</h2>
<form action="unicoPresupuesto.php" method="get">
    <label>Código Presupuesto</label>
    <input type="text" name="codigoPre"><br><br>
    <button type="submit" id="boton">Buscar</button>

</form>

<form action="buscarTodosPresupuesto.php" method="get">
    <button type="submit" id="boton2">Buscar todos</button>
</form>

<form>
    <button type="button" id="boton2" onclick="location.href='borrarPresupuesto.php';">Borrar Presupuesto</button>
</form>

</body>

</html>