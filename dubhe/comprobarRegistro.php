<?php

try {
    require ("conexionPDO.php");

    //Hacemos la consulta a la BD usando marcadores (hash)con dos puntos delante
    // como ":usuario" para evitar inyeccion sql.
    $sql = "SELECT * FROM usuarios WHERE email=:email";

    //Se crea la sentencia preparada
    $resultado= $base->prepare($sql);
    //para evitar caracteres especiales y eliminar la inyeccion sql
    //los valores de los campos username y password del formulario se guardan en sus repsectivsvariables
    $email = htmlentities(addslashes($_POST['email']));
    $username = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['password']));
    $fullname = htmlentities(addslashes($_POST['fullname']));

    //Con bindValue se vincula las variables que ya guardan el valor de los campos con los marcadores respectivos
    $resultado->bindParam(':email', $email, PDO::PARAM_STR);

    //Se ejecuta la sentencia preparada
    $resultado->execute();

    //Si la sentencia ejecutada encontró algun valor on rowCount comprobamos si ese valor existe
    //y lo guardamos en una variable que utilizamos como condicional para decidir que hacer segun el caso
    $counter = $resultado->rowCount();

    //Condicional si se ha encontrado una fila significa que existe el usuario y la contraseña (e este caso)
    //se le dan permisos de acceso al usuario de lo contrario se le mete en un bucle infinito en la pagina de login.
    if ($counter = 0){

        header('location: registro_usuarios.php');

    }else{
        $resultado = $base->prepare("INSERT INTO usuarios(usuario,pw,email, fullname) VALUES (:username,:password,:email, :fullname)");
        $resultado->bindParam("username", $username, PDO::PARAM_STR);
        $resultado->bindParam("password", $password, PDO::PARAM_STR);
        $resultado->bindParam("email", $email, PDO::PARAM_STR);
        $resultado->bindParam("fullname", $fullname, PDO::PARAM_STR);
        $result = $resultado->execute();

        header('location: success.php');

    }
}catch (Exception $e){

    die('Error: ' . $e->getMessage());
}
$base = null;
?>