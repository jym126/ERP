<!DOCTYPE html>
<html lang="en">
<head>

    <title>Usuario</title>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">


</head>
<body>

<div class="tabcontent">
    <div id="main-nav"></div>

    <script>
        $(function () {
            $("#main-nav").load("navbar.php");
        });
    </script>
    <h2 style=" text-align: center;"> Bienvenido a la configuración de diseño de Dubhe</h2><br>

    <div>
        <label>Seleccione un esquema de color para Dubhe
            <select id="colorSelector">
                <option value="1">Azul</option>
                <option value="2">Rojo</option>
                <option value="3">Amarillo</option>
                <option value="4">verde</option>
            </select>
        </label>
        <button id="cambiar" onclick="cambiarEstilo()">Cambiar</button>
    </div>
    <script>
        function cambiarEstilo() {
            if(document.getElementById("colorSelector").value === "1"){
                $(".tabcontent").css({backgroundColor: "#cddef8"});
            }
            else if (document.getElementById("colorSelector").value === "2"){
                $(".tabcontent").css({backgroundColor: "red"});
            }
            else if (document.getElementById("colorSelector").value === "3"){
                $(".tabcontent").css({backgroundColor: "yellow"});
            }
            else if (document.getElementById("colorSelector").value === "4"){
                $(".tabcontent").css({backgroundColor: "green"});
            }
        }
    </script><br><br>
    <button class="btn btn-success pull-left" type="button" name="back" onclick="window.close()" style="margin-left: 10px">Volver</button><br><br>
</div>
</body>
</html>