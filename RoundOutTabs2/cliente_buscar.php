<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">

  <title>Formulario Búsqueda</title>

</head>
<body>
<h2 style="text-align: center; color: white"  >Gestión de Clientes</h2>
<form action="client_single_read.php" method="get">

  <label>Introducir ID</label>
  <input type="text" name="id"><br>
    <label>Nombre</label>
    <input type="text" name="name">
  <br><br>
  <button type="submit" id="boton">Buscar</button>

</form>

<form action="client_read_all.php" method="get">
  <button type="submit" id="boton2">Buscar todos</button>
</form>

<form>
  <button type="button" id="boton2" onclick="location.href='employee_create_form.php';">Crear Cliente</button>
</form>

<form>
  <button type="button" id="boton2" onclick="location.href='employee_delete_form.php';">Borrar Cliente</button>
</form>

</body>

</html>