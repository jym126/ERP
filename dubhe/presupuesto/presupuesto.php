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
    <title>Presupuesto</title>

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
                    $.get("../articulo/backend-search.php", {term: inputVal}).done(function (data) {
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

    <!--Asignando codigo del presupuesto-->
    <?php
    include ('calculoIndices.php');
    ?>
    <script>
        function newCode(){
            var nuevoCodigo = <?php echo json_encode($nuevoCodigoP);?>;
            document.getElementById('codigo').value = nuevoCodigo;
        }
    </script>

</head>
<body onload="newCode()">

<!--Navigation bar-->

<script>
    $(function () {
        $("#main-nav").load("../navbar.php");
    });
</script>
<!--end of Navigation bar-->

<div id="clientes" class="tabcontent">
    <div id="main-nav"></div>

    <h2>Presupuestos</h2>

    <label class="alb">Código
        <input class="alb" id="codigo" type="text" size="7" value="">
    </label>

    <div class="juegoBotones">
        <button id="buscar" onclick="window.open('./buscarPresupuesto.php',
        'Clientes', 'width=1200, height=600, top=320, left=300')"></button>
        <button id="imprimir" onclick="window.print()"></button>
        <button id="guardar" type="submit" onclick="guardar()"></button>
        <button id="actualizar" type="submit" onclick="actualizar()"></button>
        <button id="clear" type="submit" onclick="borrar()"></button>
        <button id="send" type="submit" onclick="enviar()"></button>

    </div>
    <br>
    <h3>Cliente</h3>
    <div class="data">
        <label class="pre">Código</label>
        <input class="pre" id="id" type="text" size="5"><button id="buscarMini"
                                                                onclick="window.open('../cliente/cliente_buscar.php', 'Clientes', 'width=1200, height=600, top=320, left=300')"></button><br><br>
        <label class="pre">Nombre</label>
        <input class="pre" id="name" type="text" size="20">
        <label class="pre">Apellido</label>
        <input class="pre" id="apellido" type="text" size="20"><br><br>
        <input class="pre" id="designation" type="hidden" size="20">
        <label class="pre">Email</label>
        <input class="pre" id="email" type="text" size="25"><br><br>
        <label class="pre">Teléfono</label>
        <input class="pre" id="telefono" type="text" size="10">
        <label class="pre">Dirección</label>
        <input class="pre" id="direccion" type="text" size="30">
        <br>
    </div>

    <h3>Artículos</h3>

    <div class="search-box">
        <button id="clear" type="button"></button>
        <table class="pre" style="background: #b4e0ef">
            <th>
            <td>Código &nbsp; &nbsp;</td>
            <td>Nombre &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
            <td>Precio &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; / &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
            <td>Seleccione artículo encontrado&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
            </th>
        </table>
        <input id="codigoArt1" class="pre" type="text" size="5">
        <input id="nombreArt1" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio1" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(1)"></button>
        <div class="result" style="float: right; margin-right: 220px"></div>
        <br>
        <input id="codigoArt2" class="pre" type="text" size="5">
        <input id="nombreArt2" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio2" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(2)"></button>
        <br>
        <input id="codigoArt3" class="pre" type="text" size="5">
        <input id="nombreArt3" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio3" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(3)"></button>
        <br>
        <input id="codigoArt4" class="pre" type="text" size="5">
        <input id="nombreArt4" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio4" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(4)"></button>
        <br>
        <input id="codigoArt5" class="pre" type="text" size="5">
        <input id="nombreArt5" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio5" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(5)"></button>
        <br>
        <input id="codigoArt6" class="pre" type="text" size="5">
        <input id="nombreArt6" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio6" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(6)"></button>
        <br>
        <input id="codigoArt7" class="pre" type="text" size="5">
        <input id="nombreArt7" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio7" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(7)"></button>
        <br>
        <input id="codigoArt8" class="pre" type="text" size="5">
        <input id="nombreArt8" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio8" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(8)"></button>
        <br>
        <input id="codigoArt9" class="pre" type="text" size="5">
        <input id="nombreArt9" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio9" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(9)"></button>
        <br>
        <input id="codigoArt10" class="pre" type="text" size="5">
        <input id="nombreArt10" class="pre" autocomplete="off" type="text" size="25">
        <input id="precio10" class="pre" type="text" size="5">
        <button id="menosMini" type="button" onclick="Eliminar(10)"></button>
        <br>
        <table class="pre">
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

        <form id="presupuesto" action="guardarPresupuesto.php" method="get">
            <input id="codigoPre" name="codigoPre" type="hidden">
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
                $('#codigoPre').val(codigo);
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
                document.getElementById("presupuesto").submit();
            }
        </script>

        <!--Formulario con la información del albarán a actualizar -->
        <form id="presupuestActualizar" action="actualizarPresupuesto.php" method="get">
            <input id="idPre" name="idAlb" type="hidden">
            <input id="codigoPre2" name="codigoPre" type="hidden">
            <input id="codigoCliente2" name="codigoCliente" type="hidden">
            <input id="item12" name="item1" type="hidden">
            <input id="item22" name="item2" type="hidden">
            <input id="item32" name="item3" type="hidden">
            <input id="item42" name="item4" type="hidden">
            <input id="item52" name="item5" type="hidden">
            <input id="item62" name="item6" type="hidden">
            <input id="item72" name="item7" type="hidden">
            <input id="item82" name="item8" type="hidden">
            <input id="item92" name="item9" type="hidden">
            <input id="item102" name="item10" type="hidden">
        </form>
        <script>
            function actualizar(){
                var idPre = $('#codigoPreBorrar').val();
                $('#idPre').val(idFact);
                var codigo = $('#codigo').val();
                $('#codigoPre2').val(codigo);
                var id = $('#id').val();
                $('#codigoCliente2').val(id);
                var item1 = $('#codigoArt1').val();
                $('#item12').val(item1);
                var item2 = $('#codigoArt2').val();
                $('#item22').val(item2);
                var item3 = $('#codigoArt3').val();
                $('#item32').val(item3);
                var item4 = $('#codigoArt4').val();
                $('#item42').val(item4);
                var item5 = $('#codigoArt5').val();
                $('#item52').val(item5);
                var item6 = $('#codigoArt6').val();
                $('#item62').val(item6);
                var item7 = $('#codigoArt7').val();
                $('#item72').val(item7);
                var item8 = $('#codigoArt8').val();
                $('#item82').val(item8);
                var item9 = $('#codigoArt9').val();
                $('#item92').val(item9);
                var item10 = $('#codigoArt10').val();
                $('#item102').val(item10);
                document.getElementById("presupuestoActualizar").submit();
            }
        </script>


        <!--Mini formulario oculto para enviar id del albarán a borrar-->
        <form id="presupuestoBorrar" action="./borrarPresupuesto.php" method="get">
            <input id="codigoPreBorrar" name="idPre" type="hidden">
        </form>

        <!--Función de borrado de un albarán previo aviso-->
        <script>
            function borrar(){
                var conf = confirm("¿Seguro que desea borrar el presupuesto ID "+ $('#codigoPreBorrar').val()+"?");
                if (conf === true){
                    document.getElementById("presupuestoBorrar").submit();
                }
            }
        </script>

        <!--Formulario de enviar albarán a albarán-->
        <form id="albaran" action="http://localhost:63342/ERP/RoundOutTabs2/albaran/albaran.php" method="get">
            <input id="codigoAlb" name="codigoAlb" type="hidden">
            <input id="codigoCliente1" name="codigoCliente" type="hidden">
            <input id="nombre" name="name" type="hidden">
            <input id="apellido1" name="lastName" type="hidden">
            <input id="email1" name="email" type="hidden">
            <input id="telefono1" name="phone" type="hidden">
            <input id="direccion1" name="address" type="hidden">
            <input id="codigoArt11" name="item1" type="hidden">
            <input id="nombreArt11" name="nombreArt1" type="hidden">
            <input id="precio11" name="precio1" type="hidden">
            <input id="codigoArt21" name="item2" type="hidden">
            <input id="nombreArt21" name="nombreArt2" type="hidden">
            <input id="precio21" name="precio2" type="hidden">
            <input id="codigoArt31" name="item3" type="hidden">
            <input id="nombreArt31" name="nombreArt3" type="hidden">
            <input id="precio31" name="precio3" type="hidden">
            <input id="codigoArt41" name="item4" type="hidden">
            <input id="nombreArt41" name="nombreArt4" type="hidden">
            <input id="precio41" name="precio4" type="hidden">
            <input id="codigoArt51" name="item5" type="hidden">
            <input id="nombreArt51" name="nombreArt5" type="hidden">
            <input id="precio51" name="precio5" type="hidden">
            <input id="codigoArt61" name="item6" type="hidden">
            <input id="nombreArt61" name="nombreArt6" type="hidden">
            <input id="precio61" name="precio6" type="hidden">
            <input id="codigoArt71" name="item7" type="hidden">
            <input id="nombreArt71" name="nombreArt7" type="hidden">
            <input id="precio71" name="precio7" type="hidden">
            <input id="codigoArt81" name="item8" type="hidden">
            <input id="nombreArt81" name="nombreArt8" type="hidden">
            <input id="precio81" name="precio8" type="hidden">
            <input id="codigoArt91" name="item9" type="hidden">
            <input id="nombreArt91" name="nombreArt9" type="hidden">
            <input id="precio91" name="precio9" type="hidden">
            <input id="codigoArt101" name="item10" type="hidden">
            <input id="nombreArt101" name="nombreArt10" type="hidden">
            <input id="precio101" name="precio10" type="hidden">
        </form>

        <!--Funcion para enviar presupuesto a albarán-->
        <?php
        include ('../albaran/calculoIndices.php');
        ?>

        <script>
            var nuevoCodigoA = <?php echo json_encode($nuevoCodigoA);?>;
            function enviar(){
                $('#codigoAlb').val(nuevoCodigoA);
                var id = $('#id').val();
                $('#codigoCliente1').val(id);
                var nombre = $('#name').val();
                $('#nombre').val(nombre);
                var apellido = $('#apellido').val();
                $('#apellido1').val(apellido);
                var email = $('#email').val();
                $('#email1').val(email);
                var telefono = $('#telefono').val();
                $('#telefono1').val(telefono);
                var direccion = $('#direccion').val();
                $('#direccion1').val(direccion);
                var codigoArt11 = $('#codigoArt1').val();
                $('#codigoArt11').val(codigoArt11);
                var nombreArt11 = $('#nombreArt1').val();
                $('#nombreArt11').val(nombreArt11);
                var precio11 = $('#precio1').val();
                $('#precio11').val(precio11);
                var codigoArt21 = $('#codigoArt2').val();
                $('#codigoArt21').val(codigoArt21);
                var nombreArt21 = $('#nombreArt2').val();
                $('#nombreArt21').val(nombreArt21);
                var precio21 = $('#precio2').val();
                $('#precio21').val(precio21);
                var codigoArt31 = $('#codigoArt3').val();
                $('#codigoArt31').val(codigoArt31);
                var nombreArt31 = $('#nombreArt3').val();
                $('#nombreArt31').val(nombreArt31);
                var precio31 = $('#precio3').val();
                $('#precio31').val(precio31);
                var codigoArt41 = $('#codigoArt4').val();
                $('#codigoArt41').val(codigoArt41);
                var nombreArt41 = $('#nombreArt4').val();
                $('#nombreArt41').val(nombreArt41);
                var precio41 = $('#precio4').val();
                $('#precio41').val(precio41);
                var codigoArt51 = $('#codigoArt5').val();
                $('#codigoArt51').val(codigoArt51);
                var nombreArt51 = $('#nombreArt5').val();
                $('#nombreArt51').val(nombreArt51);
                var precio51 = $('#precio5').val();
                $('#precio51').val(precio51);
                var codigoArt61 = $('#codigoArt6').val();
                $('#codigoArt61').val(codigoArt61);
                var nombreArt61 = $('#nombreArt6').val();
                $('#nombreArt61').val(nombreArt61);
                var precio61 = $('#precio6').val();
                $('#precio61').val(precio61);
                var codigoArt71 = $('#codigoArt7').val();
                $('#codigoArt71').val(codigoArt71);
                var nombreArt71 = $('#nombreArt7').val();
                $('#nombreArt71').val(nombreArt71);
                var precio71 = $('#precio7').val();
                $('#precio71').val(precio71);
                var codigoArt81 = $('#codigoArt8').val();
                $('#codigoArt81').val(codigoArt81);
                var nombreArt81 = $('#nombreArt8').val();
                $('#nombreArt81').val(nombreArt81);
                var precio81 = $('#precio8').val();
                $('#precio81').val(precio81);
                var codigoArt91 = $('#codigoArt9').val();
                $('#codigoArt91').val(codigoArt91);
                var nombreArt91 = $('#nombreArt9').val();
                $('#nombreArt91').val(nombreArt91);
                var precio91 = $('#precio9').val();
                $('#precio91').val(precio91);
                var codigoArt101 = $('#codigoArt10').val();
                $('#codigoArt101').val(codigoArt101);
                var nombreArt101 = $('#nombreArt10').val();
                $('#nombreArt101').val(nombreArt101);
                var precio101 = $('#precio10').val();
                $('#precio101').val(precio101);
                document.getElementById("albaran").submit();
            }
        </script>

    </div>
</div>

</body>
</html>
