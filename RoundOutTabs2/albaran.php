<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Busqueda</title>

    <!--Script que permite al hacer click en un campo de la clase search-box hacer buscar artículos mientras se escribe-->
    <script>
        var i = 0;
        var valor = 0;
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("backend-search.php", {term: inputVal}).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function () {
                //La cadena capturada con los datos del nombre, id y precio se almacenan en el input con id:find
                $(this).parents(".search-box").find('#find').val($(this).text());
                //Se guarda ese valor en la variable myChain y se hace un split para separar cada dato
                var myChain = document.getElementById('find').value;
                var myData = myChain.split('-');
                i += 1;
                var codigo = document.getElementById('codigoArt' + i).value = myData[0];
                var nombre = document.getElementById('nombreArt' + i).value = myData[1];
                var precio = document.getElementById('precio' + i).value = myData[2] + '€';
                precio = parseFloat(precio);
                valor += precio;
                document.getElementById('total').innerHTML = valor.toFixed(2) + "€";
                $(this).parent(".result").empty();
            });
        });
    </script>
    <script>
        $('#clear').on("click", function () {
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            var codigo = document.getElementById('codigoArt' + i).value = "";
            var nombre = document.getElementById('nombreArt' + i).value = "";
            var precio = document.getElementById('precio' + i).value = "";
            document.getElementById('total').innerHTML = "";
            $(this).parent(".result").empty();
            i = 0;
            valor = 0;
        })
    </script>
    <!--Función Desplazamiento al borrar una linea de artículos-->
    <script>
        function Desplazar(x) {
            i -= 1;
            for (let i = x; i < 11; i++) {
                var a = i + 1;
                document.getElementById('codigoArt' + i).value = document.getElementById('codigoArt' + a).value;
                document.getElementById('nombreArt' + i).value = document.getElementById('nombreArt' + a).value;
                document.getElementById('precio' + i).value = document.getElementById('precio' + a).value;
            }
        }
    </script>
    <!--Función para eliminar lineas de artículos-->
    <script>
        function Eliminar(x) {
            valor = parseFloat(document.getElementById('total').innerHTML);
            var valueB = parseFloat(document.getElementById('precio' + x).value);
            valor -= valueB;
            document.getElementById('codigoArt' + x).value = "";
            document.getElementById('nombreArt' + x).value = "";
            document.getElementById('precio' + x).value = "";
            document.getElementById('total').innerHTML = valor.toFixed(2) + "€";
            Desplazar(x);
        }
    </script>

</head>
<body>
<div id="clientes" class="tabcontent">
    <br>
    <h3>Albarán</h3>

    <div class="juegoBotones">
        <button id="buscar"
                onclick="window.open('cliente_buscar.php', 'Clientes', 'width=1200, height=600, top=320, left=300')"></button>
        <button id="imprimir" onclick="window.print()"></button>
        <button id="guardar"></button>
    </div>
    <br>
    <h3>Cliente</h3>
    <div class="data">
        <label class="alb">Código</label>
        <input class="alb" id="id" type="text" size="5"><br><br>
        <label class="alb">Nombre</label>
        <input class="alb" id="name" type="text" size="20"><br><br>
        <label class="alb">Apellido</label>
        <input class="alb" id="apellido" type="text" size="20"><br><br>
        <label class="alb">Email</label>
        <input class="alb" id="email" type="text" size="25"><br><br>
        <label class="alb">Teléfono</label>
        <input class="alb" id="telefono" type="text" size="10">
        <label class="alb">Dirección</label>
        <input class="alb" id="direccion" type="text" size="30">

        <br>

    </div>
    <h3>Artículos</h3>


    <div class="search-box">
        <button id="clear" type="button"></button>
        <table class="alb" style="background: #b4e0ef">
            <th>
            <td>Código &nbsp; &nbsp;</td>
            <td>Nombre &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
            <td>Precio &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
            <td>Seleccione artículo encontrado&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
            </th>
        </table>
        <input id="codigoArt1" class="alb" type="text" size="5">
        <input id="nombreArt1" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio1" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(1)"></button>
        <div class="result" style="float: right; margin-right: 220px"></div>
        <br>
        <input id="codigoArt2" class="alb" type="text" size="5">
        <input id="nombreArt2" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio2" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(2)"></button>
        <br>
        <input id="codigoArt3" class="alb" type="text" size="5">
        <input id="nombreArt3" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio3" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(3)"></button>
        <br>
        <input id="codigoArt4" class="alb" type="text" size="5">
        <input id="nombreArt4" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio4" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(4)"></button>
        <br>
        <input id="codigoArt5" class="alb" type="text" size="5">
        <input id="nombreArt5" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio5" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(5)"></button>
        <br>
        <input id="codigoArt6" class="alb" type="text" size="5">
        <input id="nombreArt6" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio6" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(6)"></button>
        <br>
        <input id="codigoArt7" class="alb" type="text" size="5">
        <input id="nombreArt7" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio7" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(7)"></button>
        <br>
        <input id="codigoArt8" class="alb" type="text" size="5">
        <input id="nombreArt8" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio8" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(8)"></button>
        <br>
        <input id="codigoArt9" class="alb" type="text" size="5">
        <input id="nombreArt9" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio9" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(9)"></button>
        <br>
        <input id="codigoArt10" class="alb" type="text" size="5">
        <input id="nombreArt10" class="alb" autocomplete="off" type="text" size="25">
        <input id="precio10" class="alb" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(10)"></button>
        <br><br>
        <table>
            <tr class="alb">
                <td><label>Total: </label></td>
                <td><p id="total"></p></td>
            </tr>
        </table>
        <!-- Input oculto solo para guardar cadena con los valores del nombre, id y precio -->
        <input id="find" type="hidden">

    </div>
</div>

</body>
</html>
