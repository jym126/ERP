<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <title>Busqueda</title>
    <link rel="stylesheet" href="css/style2.css">

    <script>
    $(document).ready(function(){
        var i =0;
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
        var valor = 0;
        $(document).on("click", ".result p", function(){
            //La cadena capturada con los datos del nombre, id y precio se almacenan en el input con id:find
            $(this).parents(".search-box").find('#find').val($(this).text());
            //Se guarda ese valor en la variable myChain y se hace un split para separar cada dato
            var myChain = document.getElementById('find').value;
            var myData = myChain.split('-');
            i +=1;
            var codigo = document.getElementById('codigoArt'+i).value = myData[0];
            var nombre = document.getElementById('nombreArt'+i).value = myData[1];
            var precio = document.getElementById('precio'+i).value = myData[2];
            precio = parseFloat(precio);
            valor += precio;
            document.getElementById('total').innerHTML = valor + "€";
            console.log('valor: '+ valor);
            $(this).parent(".result").empty();
        });
    });
    </script>

</head>
<body>
<div id="articulos" class="tabcontent">
    <br>
    <h3>Artículos</h3>
    <p>Gestión de artículos</p>
    <div class="juegoBotones">
        <button id="buscar"
                onclick="window.open('articulos_buscar.html', 'Artículos', 'width=1200, height=600, top=320, left=300')"></button>
        <button id="mas"></button>
        <button id="menos"></button>
        <button id="imprimir" onclick="window.print()"></button>
    </div>
    <br>

    <div class="search-box">
        <table>
            <th>
                <td>Código &nbsp; &nbsp;</td>
                <td>Nombre &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                <td>Precio &nbsp;</td>
            </th>
        </table>
        <input id="codigoArt1" type="text" size="5">
        <input id="nombreArt1" autocomplete="off" type="text" size="20">
        <input id="precio1" type="text" size="5"><br>
        <input id="codigoArt2" type="text" size="5">
        <input id="nombreArt2" autocomplete="off" type="text" size="20">
        <input id="precio2" type="text" size="5"><br>
        <input id="codigoArt3" type="text" size="5">
        <input id="nombreArt3" autocomplete="off" type="text" size="20">
        <input id="precio3" type="text" size="5"><br><br>
        <table>
            <tr style="font-weight: bold">
                <td><label>Total: </label></td>
                <td><p id="total"></p></td>
            </tr>
        </table>
        <!-- Input oculto solo para guardar cadena con los valores del nombre, id y precio -->
        <input id="find" type="hidden"><br>
        <p style="font-weight: bold">Coincidencias</p><br>
        <div class="result"></div>
    </div>

</div>

</body>
</html>
