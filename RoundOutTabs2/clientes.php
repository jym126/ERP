<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Busqueda</title>
</head>
<body>
<div id="clientes" class="tabcontent">
    <br>
    <h3>Clientes</h3>
    <p>Gestión de clientes</p>
    <div class="juegoBotones">
        <button id="buscar"
                onclick="window.open('cliente_buscar.php', 'Clientes', 'width=1200, height=600, top=320, left=300')"></button>
        <button id="mas"></button>
        <button id="menos"></button>
    </div>
    <br>

    <div class="data">
        <form action="client_single_read.php" method="get">
        <label>Código</label>
        <input id="id" name="id" type="text" size="5"><br><br>
        <label>Nombre</label>
        <input id="name" name="name" type="text" size="20"><br><br>
        <label>Apellido</label>
        <input id="apellido" type="text" size="20"><br><br>
        <label>Email</label>
        <input id="email" type="text" size="25"><br><br>
        <label>Telefono</label>
        <input id="telefono" type="text" size="10">
        <label>Dirección</label>
        <input id="direccion" type="text" size="30">
        </form>
    </div>
    <br>
    <button id="imprimir" onclick="window.print()"></button>

</div>
</body>
</html>
