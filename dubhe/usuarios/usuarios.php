<!DOCTYPE html>
<html lang="en">
<head>

    <title>Usuario</title>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">


</head>
<body>
<script>
    $(function () {
        $("#main-nav").load("../navbar.php");
    });
</script>

<div class="tabcontent">
    <div id="main-nav"></div>

<h2 style=" text-align: center;"> Bienvenidos a gestion de usuarios</h2><br>

<div>
    <p style="font-size: large">Si ya eres miembro</p>
    <button class="btn btn-success pull-left" type="submit" onclick="location.href='login.php'" name="login">Login</button><br><br><br>
    <p style="font-size: large">Si no eres miembro</p>
    <button class="btn btn-success pull-left" type="submit" onclick="location.href='registro_usuarios.php' " name="registro" >Registrarse</button>
    <button class="btn btn-success pull-left" type="button" name="back" onclick="window.close()" style="margin-left: 10px">Volver</button><br><br>
</div>
</div>
</body>
</html>