<?php
session_start();
if ($_SESSION['nivel'] !== "administrador") {
    echo "<script>alert('Solo los administradores pueden acceder a Herramientas');</script>";
    session_abort();
    header("location:http://localhost:63342/ERP/dubhe/usuarios/motorLoginPDO.php");
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
        <h3 style="text-align: center">Herramientas de Configuración</h3>
        <table style="text-align: center; width: 50%; margin: 0 auto; padding: 0; border: none">
        <th style="text-align: left">Usuarios</th><th style="text-align: left">Idioma</th><th style="text-align: left">Impresión</th><th style="text-align: left">Configuración</th>
            <tr>
        <td style="padding-right: 40px; padding-bottom: 40px; text-align: left"><button id="usuarios" type="button" onclick="window.open('usuarios/usuarios.php')"></button></td>
        <td style="padding-right: 40px; padding-bottom: 40px; text-align: left"><button id="idioma" type="button" onclick="window.open('idioma.html')"></button></td>
        <td style="padding-right: 40px; padding-bottom: 40px; text-align: left"><button id="imprimir2" type="button" onclick="window.open('impresion.html')"></button></td>
        <td style="padding-right: 40px; padding-bottom: 40px; text-align: left"><button id="config" type="button" onclick="window.open('configuracion.html')"></button></td><br><br>
            </tr>
        <th style="text-align: left">Diseño</th><th style="text-align: left">Idioma</th><th style="text-align: left">Impresión</th><th style="text-align: left">Configuración</th>
            <tr>
        <td style="padding-right: 40px; text-align: left"><button id="diseño" type="button" onclick="window.open('diseño.php')"></button></td>
        <td style="padding-right: 40px; text-align: left"><button id="conversor" type="button" onclick="window.open('conversorMonedas.html')"></button></td>
        <td style="padding-right: 40px; text-align: left"><button id="mail" type="button" onclick="location.href='mailto:yomismo@miservidor.com'"></button></td>
        <td style="padding-right: 40px; text-align: left"><button id="manual" type="button" onclick="window.open('manual.html')"></button></td><br><br>
            </tr>
        </table>
        <div style="text-align: right">
        <?php
        echo "<strong> Usuario Autorizado: ".$_SESSION["usuarioLogeado"]."</strong>";
        echo ", ".$_SESSION['nivel'];
        ?>
        </div>
    </div>
</div>
</body>

</html>