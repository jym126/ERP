<?php
session_start();
if (!isset($_SESSION['usuarioLogeado'])){
    header("location:usuarios/motorLoginPDO.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>

    <title>Sistema ERP</title>

    <link rel='stylesheet' href='css/style.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<div class="tabcontent">
<!--Navigation bar-->
<div id="main-nav"></div>

<script>
    $(function () {
        $("#main-nav").load("navbar.php");
    });
</script>
<!--end of Navigation bar-->

<div class="data">
    <img style="text-align: center; margin-left: 25%" src="imagenes/dubhe_sistema.png" alt="dubhe">
    <?php
    echo "<strong> Usuario Autorizado: ".$_SESSION["usuarioLogeado"]."</strong>";
    echo ", ".$_SESSION['nivel'];
    ?>
</div>
</div>
</body>

</html>