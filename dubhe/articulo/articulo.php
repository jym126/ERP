<?php
session_start();
if (!isset($_SESSION['usuarioLogeado'])){
    header("location:http://localhost:63342/ERP/dubhe/usuarios/motorLoginPDO.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Artículos</title>
    <link rel="stylesheet" href="../css/style.css">
    <script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                //La cadena capturada con los datos del nombre, id y precio se almacenan en el input con id:find
                $(this).parents(".search-box").find('#find').val($(this).text());
                //Se guarda ese valor en la variable myChain y se hace un split para separar cada dato
                var myChain = document.getElementById('find').value;
                var myData = myChain.split('-');
                document.getElementById('codigoArt').value=myData[0];
                document.getElementById('nombreArt').value=myData[1];
                document.getElementById('precio').value=myData[2];
                $(this).parent(".result").empty();
            });
        });
    </script>

    <script>
        function imagen() {
            var img = document.getElementById('imagen').value;
            $('#miImagen').attr('src', img);
        }
    </script>

</head>
<body>

<!--Navigation bar-->

<script>
    $(function () {
        $("#main-nav").load("../navbar.php");
    });
</script>
<!--end of Navigation bar-->

<div class="tabcontent">
    <div id="main-nav"></div>
    <h2>Artículos</h2>
    <p>Gestión de artículos</p>
    <div class="juegoBotones">
        <!--Al buscar el articulo borro la imagen previa y se lanza una pagina de busqueda flotante-->
        <button id="buscar"
                onclick="document.getElementById('imagen').value = '';
                imagen();
                window.open('articulos_buscar.php', 'Artículos', 'width=1200, height=600, top=320, left=300')
                "></button>
        <button id="mas" onclick="window.open('guardarArticulo.php')"></button>
        <button id="menos" onclick="window.open('borrarArticulo.php')"></button>
        <button id="imprimir" onclick="window.print()"></button>
        <button id="editar" onclick="window.open('productos.php')"></button>
    </div>
    <br>

    <div class="data">
        <label>Código</label>
        <input id="codigoArt" type="text" size="5"><br><br>
        <label>Nombre</label>
        <input id="nombreArt" autocomplete="off" type="text" size="20"><br><br>
        <label>Precio</label>
        <input id="precio" type="text" size="5"><div><br>
        <img id="miImagen" src=""  alt=""></div><br>
        <input id="imagen" type="hidden" value="" name="imagen">
        <!--Botón para ver la imagen del producto-->
        <button id="llamarImagen" class="btn btn-success pull-left" onclick="imagen()">Ver imagen</button><br>
        <!-- Input oculto solo para guardar cadena con los valores del nombre, id y precio -->
        <input id="find" type="hidden"><br>
        <div class="result"></div>
    </div>
    <br><br>



</div>

</body>
</html>
