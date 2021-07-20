<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <?php
    include("navbar.php")
    ?>

    <title>Login</title>

</head>

<body>
<h1 style="text-align: center">Introduce tu datos</h1>
<form method="post" action="motorLogin.php">
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="username" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <input type="hidden" name="nivel">
    <button type="submit" name="login" value="login">Entrar</button>
</form>

</body>

</html>