<?php
session_start();
if (!isset($_SESSION["usuarioLogeado"])){
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    include("navbar.php");
    ?>
    <title>Inicio</title>

    <style>

        h1 {
            text-align: center;
            color: blue;
        }

    </style>


</head>



<body>

<?php
echo "<strong>"."Hola ".$_SESSION["usuarioLogeado"]."</strong>"."<br>";
?>
<h1> Bienvenido como usuario registrado</h1>

</body>
</html>