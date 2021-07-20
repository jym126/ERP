<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>

    <title>Sistema ERP</title>

    <link rel='stylesheet' href='css/style.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function () {
            $("li").click(function (e) {
                e.preventDefault();
                $("li").removeClass("selected");
                $(this).addClass("selected");
            });
        });
    </script>
</head>

<body>
<div id="logo">
    <img src="imagenes/star.png">
</div>
<div>
<h1 id="head">Dubhe Sistema ERP</h1>
</div>
<ul class="tabrow">
    <li class="selected" onclick="openPage('articulos')" id="defaultOpen"><a id="title" href="#">Artículos</a></li>
    <li onclick="openPage('albaranes')"><a id="title" href="#">Albarán</a></li>
    <li onclick="openPage('facturas')"><a id="title" href="#">Facturas</a></li>
    <li onclick="openPage('presupuestos')"><a id="title" href="#">Presupuestos</a></li>
    <li onclick="openPage('clientes')"><a id="title" href="#">Clientes</a></li>
</ul>

<div id="load" class="tabcontent">

</div>
<script>
    function openPage(a){
        if (a === 'articulos'){
            $('#load').load('articulo/articulo.php');
        }
        else if (a === 'albaranes'){
            $('#load').load('albaran/albaran.php');
        }
        else if (a === 'facturas'){
            $('#load').load('factura/factura.php');
        }
        else if (a === 'presupuestos'){
            $('#load').load('presupuesto/presupuesto.php');
        }
        else if (a === 'clientes'){
            $('#load').load('cliente/clientes.php');
        }
    }
    document.getElementById("defaultOpen").click();
</script>

</body>

</html>