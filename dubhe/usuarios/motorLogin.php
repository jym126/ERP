<?php
session_start();
?>
<?php
try {
    require("conexionPDO.php");
    //Hacemos la consulta a la BD usando marcadores (hash)con dos puntos delante
    // como ":usuario" para evitar inyeccion sql.
    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND pw=:pw";
    //Se crea la sentencia preparada
    $resultado= $base->prepare($sql);
    //para evitar caracteres especiales y eliminar la inyeccion sql
    //los valores de los campos username y password del formulario se guardan en sus repsectivsvariables
    $usuario = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['password']));

    //Con bindValue se vincula las variables que ya guardan el valor de los campos con los marcadores respectivos
    $resultado->bindValue(':usuario', $usuario);
    $resultado->bindValue(':pw', $password);

    //Se ejecuta la sentencia preparada
    $resultado->execute();
    //Si la sentencia ejecutada encontró algun valor on rowCount comprobamos si ese valor existe
    //y lo guardamos en una variable que utilizamos como condicional para decidir que hacer segun el caso
    $counter = $resultado->rowCount();
    //Condicional si se ha encontrado una fila significa que existe el usuario y la contraseña (e este caso)
    //se le dan permisos de acceso al usuario de lo contrario se le mete en un bucle infinito en la pagina de login.
    if ($counter !=0){
        //header('location: editar.php');
        $_SESSION["usuarioLogeado"]=$_POST["username"];
        header("location:usuarioLogeado.php");
    }else{
        header('location: usuarios.php');
    }
}catch (Exception $e){
    die("Error: ".$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("navbar.php")
    ?>
    <style>
        p{
            text-align: center;
            font-size: 20px;
            color: blue;
        }
    </style
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
</body>

</html>
