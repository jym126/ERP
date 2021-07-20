<?php
if (isset($_POST["login"])) {

    try {

        require("../conexionPDO.php");

        //Hacemos la consulta a la BD usando marcadores (hash)con dos puntos delante
        // como ":usuario" para evitar inyeccion sql.
        $sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND pw=:pw";

        //Se crea la sentencia preparada
        $resultado = $base->prepare($sql);
        //para evitar caracteres especiales y eliminar la inyeccion sql
        //los valores de los campos username y password del formulario se guardan en sus respectivas variables
        $usuario = htmlentities(addslashes($_POST['username']));
        $password = htmlentities(addslashes($_POST['password']));
        //Con bindValue se vincula las variables que ya guardan el valor de los campos con los marcadores respectivos
        $resultado->bindValue(':usuario', $usuario);
        $resultado->bindValue(':pw', $password);

        //Se ejecuta la sentencia preparada
        $resultado->execute();

        //Conesto extraemos aparte el nivel de autoridad del usuario no pedido en la consulta original
        $registro = "";
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        $nivel = $registro['nivel'];
        //Si la sentencia ejecutada encontró algun valor on rowCount comprobamos si ese valor existe
        //y lo guardamos en una variable que utilizamos como condicional para decidir que hacer segun el caso
        $counter = $resultado->rowCount();

        //Condicional si se ha encontrado una fila significa que existe el usuario y la contraseña (e este caso)
        //se le dan permisos de acceso al usuario de lo contrario se le mete en un bucle infinito en la pagina de login.
        if ($counter != 0) {

            //header('location: index2.php');

            session_start();
            $_SESSION['usuarioLogeado'] = $usuario;
            $_SESSION['nivel'] = $nivel;
            header("location:../index2.php");

        } else {
            echo "<script>
            alert('Mal usuario o contraseña');
            window.location.href='motorLoginPDO.php';
            </script>";


        }

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Login</title>

</head>

<body>

<script>
    $(function () {
        $("#main-nav").load("../navbar.php");
    });
</script>

<div id="facturas" class="tabcontent">
    <div id="main-nav"></div>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <h3>Introduce tu datos para iniciar sesion</h3>
    <h5>(Solo los administradores pueden entrar en Herramientas)</h5>
    <div class="myForm">
        <label>Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required /><br><br>
        <label>Contraseña</label>
        <input type="password" name="password" required /><br><br>
        <button class="btn btn-success pull-left" type="submit" name="login" value="login">Entrar</button><br><br>
    </div>

</form>


</div>
</body>

</html>