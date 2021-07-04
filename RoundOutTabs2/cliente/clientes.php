<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Busqueda</title>
</head>
<body>
<div id="clientes" class="tabcontent">
    <br>
    <h3>Clientes</h3>
    <p>Gestión de clientes</p>
    <div class="juegoBotones">
        <button id="buscar"
                onclick="window.open('cliente/cliente_buscar.php', 'Clientes', 'width=1200, height=600, top=320, left=300')"></button>
        <button id="mas" type="submit" onclick="guardar()"></button>
        <button id="menos" type="submit" onclick="borrar()"></button>
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
        <label>Cargo</label>
        <input id="designation" type="text" size="20"><br><br>
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

    <form id="cliente" action="cliente/guardarCliente.php" method="get">
        <input id="idC" name="id" type="hidden">
        <input id="nameC" name="name" type="hidden">
        <input id="lastName" name="lastName" type="hidden">
        <input id="cargo" name="designation" type="hidden">
        <input id="emailC" name="email" type="hidden">
        <input id="phone" name="phone" type="hidden">
        <input id="address" name="address" type="hidden">
    </form>

    <script>
        function guardar(){
            var id = $('#id').val();
            $('#idC').val(id);
            var name = $('#name').val();
            $('#nameC').val(name);
            var lastName = $('#apellido').val();
            $('#lastName').val(lastName);
            var designation = $('#designation').val();
            $('#cargo').val(designation);
            var email = $('#email').val();
            $('#emailC').val(email);
            var phone = $('#telefono').val();
            $('#phone').val(phone);
            var address = $('#direccion').val();
            $('#address').val(address);
            document.getElementById("cliente").submit();
        }
    </script>

    <!--Mini formulario oculto para enviar id del cliente a borrar-->
    <form id="clienteBorrar" action="cliente/borrarCliente.php" method="get">
        <input id="codigoCliBorrar" name="idCli" type="hidden">
    </form>

    <!--Función de borrado de un cliente previo aviso-->
    <script>
        function borrar(){
            var codigoCliBorrar = $('#id').val();
            $('#codigoCliBorrar').val(codigoCliBorrar);
            confirm("¿Seguro que desea borrar al cliente ID "+ codigoCliBorrar +"?");
            document.getElementById("clienteBorrar").submit();

        }
    </script>

</div>
</body>
</html>
