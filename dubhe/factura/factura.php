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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Factura</title>

    <!--Script que permite al hacer click en un campo de la clase search-box poder buscar artículos mientras se escribe-->
    <script>
        var i = 0;
        var valor = 0;
        var iva = 0;
        var gTotal = 0;
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("./articulo/backend-search.php", {term: inputVal}).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Al hacer clic mete en sus respectivos campos los datos almacenados en "result" como una cadena de varios datos
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
                iva = document.getElementById('iva').innerHTML = (valor*21/100).toFixed(2);
                gTotal = document.getElementById('gTotal').innerHTML = (valor + parseFloat(iva)).toFixed(2) + "€";
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
            document.getElementById('iva').innerHTML = "";
            document.getElementById('gTotal').innerHTML = "";
            $(this).parent(".result").empty();
            i = 0;
            valor = 0;
            iva = 0;
            gTotal = 0;
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
            iva = document.getElementById('iva').innerHTML = (valor*21/100).toFixed(2);
            gTotal = document.getElementById('gTotal').innerHTML = (valor + parseFloat(iva)).toFixed(2) + "€";
            Desplazar(x);
        }
    </script>



</head>
<body onload="comun()">

<!--Navigation bar-->

<script>
    $(function () {
        $("#main-nav").load("../navbar.php");
    });
</script>
<!--end of Navigation bar-->

<!--Asignando codigo de la factura-->
<?php
include ('calculoIndices.php');
?>

<script>
    function comun(){
        newCode();
        recibir();
    }
</script>
<script>
    function newCode() {
        var nuevoCodigoF = <?php echo json_encode($nuevoCodigoF);?>;
        document.getElementById('codigo').value = nuevoCodigoF;
    }
</script>

<!-- funcion recibir de albarán-->
<?php
include ('recibirDeAlbaran.php');
?>

<script>
    function recibir(){
        if ("<?php echo $codigoFac;?>") {
            document.getElementById('importar').style.display = 'inline';
        }
    }
</script>

<div id="facturas" class="tabcontent">
    <div id="main-nav"></div>

    <h2>Facturas</h2>

    <label class="fac">Código
        <input class="fac" id="codigo" type="text" size="7" value="">
    </label>

    <div class="juegoBotones">
        <button id="buscar" onclick="window.open('./buscarFactura.php',
        'Clientes', 'width=1200, height=600, top=320, left=300')"></button>
        <button id="imprimir" onclick="window.print()"></button>
        <button id="guardar" type="submit" onclick="guardar()"></button>
        <button id="actualizar" type="submit" onclick="actualizar()"></button>
        <button id="clear" type="submit" onclick="borrar()"></button>
        <button id="receive" onclick="window.open('./buscarAlbaranF.php',
        'Clientes', 'width=1200, height=600, top=320, left=300')"></button>
        <button type="button" id="importar" onclick="importing()" style="display: none"></button>

    </div>
    <br>
    <h3>Cliente</h3>
    <div class="data">
        <label class="fac">Código</label>
        <input class="fac" id="id" type="text" size="5"><button id="buscarMini"
               onclick="window.open('../cliente/cliente_buscar.php', 'Clientes', 'width=1200, height=600, top=320, left=300')"></button><br><br>
        <label class="fac">Nombre</label>
        <input class="fac" id="name" type="text" size="20">
        <label class="fac">Apellido</label>
        <input class="fac" id="apellido" type="text" size="20"><br><br>
        <label class="fac">Email</label>
        <input class="fac" id="email" type="text" size="25"><input class="fac" id="designation" type="hidden" size="25"><br><br>
        <label class="fac">Teléfono</label>
        <input class="fac" id="telefono" type="text" size="10">
        <label class="fac">Dirección</label>
        <input class="fac" id="direccion" type="text" size="30">
        <br>
    </div>

    <h3>Artículos</h3>
    <div class="search-box">
        <button id="clear" type="button"></button>
        <table class="fac" style="background: #b4e0ef">
            <th>
            <td>Código &nbsp; &nbsp;</td>
            <td>Nombre &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
            <td>Precio &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
            <td>Seleccione artículo encontrado&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
            </th>
        </table>
        <input id="codigoArt1" class="fac" type="text" size="5">
        <input id="nombreArt1" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio1" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(1)"></button>
        <div class="result" style="float: right; margin-right: 220px"></div>
        <br>
        <input id="codigoArt2" class="fac" type="text" size="5">
        <input id="nombreArt2" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio2" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(2)"></button>
        <br>
        <input id="codigoArt3" class="fac" type="text" size="5">
        <input id="nombreArt3" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio3" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(3)"></button>
        <br>
        <input id="codigoArt4" class="fac" type="text" size="5">
        <input id="nombreArt4" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio4" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(4)"></button>
        <br>
        <input id="codigoArt5" class="fac" type="text" size="5">
        <input id="nombreArt5" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio5" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(5)"></button>
        <br>
        <input id="codigoArt6" class="fac" type="text" size="5">
        <input id="nombreArt6" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio6" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(6)"></button>
        <br>
        <input id="codigoArt7" class="fac" type="text" size="5">
        <input id="nombreArt7" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio7" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(7)"></button>
        <br>
        <input id="codigoArt8" class="fac" type="text" size="5">
        <input id="nombreArt8" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio8" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(8)"></button>
        <br>
        <input id="codigoArt9" class="fac" type="text" size="5">
        <input id="nombreArt9" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio9" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(9)"></button>
        <br>
        <input id="codigoArt10" class="fac" type="text" size="5">
        <input id="nombreArt10" class="fac" autocomplete="off" type="text" size="25">
        <input id="precio10" class="fac" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(10)"></button>
        <br>
        <table class="fac">
            <tr>
                <th style="border: 1px solid black;"><label>Base: </label></th>
                <th style="border: 1px solid black;"><label>IVA: </label></th>
                <th style="border: 1px solid black;"><label>Total: </label></th>
            </tr>
            <td style="border: 1px solid black;"><p id="total"></p></td>
            <td style="border: 1px solid black;"><p id="iva"></p></td>
            <td style="border: 1px solid black;"><p id="gTotal"></p></td>

        </table>
        <!-- Input oculto solo para guardar cadena con los valores del nombre, id y precio -->
        <input id="find" type="hidden">

        <!--Formulario con la información de la factura a guardar -->
        <form id="factura" action="guardarFactura.php" method="get">
            <input id="codigoFac" name="codigoFac" type="hidden">
            <input id="codigoCliente" name="codigoCliente" type="hidden">
            <input id="item1" name="item1" type="hidden">
            <input id="item2" name="item2" type="hidden">
            <input id="item3" name="item3" type="hidden">
            <input id="item4" name="item4" type="hidden">
            <input id="item5" name="item5" type="hidden">
            <input id="item6" name="item6" type="hidden">
            <input id="item7" name="item7" type="hidden">
            <input id="item8" name="item8" type="hidden">
            <input id="item9" name="item9" type="hidden">
            <input id="item10" name="item10" type="hidden">
        </form>

        <script>
            function guardar(){
                var codigo = $('#codigo').val();
                $('#codigoFac').val(codigo);
                var id = $('#id').val();
                $('#codigoCliente').val(id);
                var item1 = $('#codigoArt1').val();
                $('#item1').val(item1);
                var item2 = $('#codigoArt2').val();
                $('#item2').val(item2);
                var item3 = $('#codigoArt3').val();
                $('#item3').val(item3);
                var item4 = $('#codigoArt4').val();
                $('#item4').val(item4);
                var item5 = $('#codigoArt5').val();
                $('#item5').val(item5);
                var item6 = $('#codigoArt6').val();
                $('#item6').val(item6);
                var item7 = $('#codigoArt7').val();
                $('#item7').val(item7);
                var item8 = $('#codigoArt8').val();
                $('#item8').val(item8);
                var item9 = $('#codigoArt9').val();
                $('#item9').val(item9);
                var item10 = $('#codigoArt10').val();
                $('#item10').val(item10);
                document.getElementById("factura").submit();
            }
        </script>

        <!--Mini formulario oculto para enviar id de la factura a borrar-->
        <form id="facturaBorrar" action="factura/borrarFactura.php" method="get">
            <input id="codigoFacBorrar" name="idFac" type="hidden">
        </form>

        <!--Función de borrado de una factura previo aviso-->
        <script>
            function borrar(){
                var conf = confirm("¿Seguro que desea borrar el factura ID "+ $('#codigoFacBorrar').val()+"?");
                if (conf === true){
                    document.getElementById("facturaBorrar").submit();
                }
            }
        </script>

        <!--Formulario con la información de la factura a actualizar -->
        <form id="facturaActualizar" action="factura/actualizarFactura.php" method="get">
            <input id="idFactura" name="idFac" type="hidden">
            <input id="codigoFac1" name="codigoFac" type="hidden">
            <input id="codigoCliente1" name="codigoCliente" type="hidden">
            <input id="item11" name="item1" type="hidden">
            <input id="item21" name="item2" type="hidden">
            <input id="item31" name="item3" type="hidden">
            <input id="item41" name="item4" type="hidden">
            <input id="item51" name="item5" type="hidden">
            <input id="item61" name="item6" type="hidden">
            <input id="item71" name="item7" type="hidden">
            <input id="item81" name="item8" type="hidden">
            <input id="item91" name="item9" type="hidden">
            <input id="item101" name="item10" type="hidden">
        </form>
        <script>
            function actualizar(){
                var idFact = $('#codigoFacBorrar').val();
                $('#idFactura').val(idFact);
                var codigo = $('#codigo').val();
                $('#codigoFac1').val(codigo);
                var id = $('#id').val();
                $('#codigoCliente1').val(id);
                var item1 = $('#codigoArt1').val();
                $('#item11').val(item1);
                var item2 = $('#codigoArt2').val();
                $('#item21').val(item2);
                var item3 = $('#codigoArt3').val();
                $('#item31').val(item3);
                var item4 = $('#codigoArt4').val();
                $('#item41').val(item4);
                var item5 = $('#codigoArt5').val();
                $('#item51').val(item5);
                var item6 = $('#codigoArt6').val();
                $('#item61').val(item6);
                var item7 = $('#codigoArt7').val();
                $('#item71').val(item7);
                var item8 = $('#codigoArt8').val();
                $('#item81').val(item8);
                var item9 = $('#codigoArt9').val();
                $('#item91').val(item9);
                var item10 = $('#codigoArt10').val();
                $('#item101').val(item10);
                document.getElementById("facturaActualizar").submit();
            }
        </script>
    </div>
</div>

</body>
</html>
