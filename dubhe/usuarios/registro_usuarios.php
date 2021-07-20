<!DOCTYPE HTML>
<html lang="en-us">
<head>
    <title>Login</title>

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

<div id="facturas" class="tabcontent">
    <div id="main-nav"></div>
<form method="post" action="../comprobarRegistro.php" name="signup-form">
    <div class="form-element"><br>
        <label>Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div><br>
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required />
    </div><br>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div><br>
    <div class="form-element">
        <label>Nombre completo</label>
        <input type="fullname" name="fullname" required />
    </div><br>
    <button class="btn btn-success pull-left" type="submit" name="register" value="register">Registrar</button>
    <button class="btn btn-success pull-left" type="button" name="back" onclick="window.close()" style="margin-left: 10px">Volver</button><br><br>
</form>
</div>
</body>
</html>