<?php
if (isset($_GET['codigoAlb'])){
    $codigoAlb =  $_GET['codigoAlb'];
}
if (isset($_GET['codigoCliente'])){
    $codigoCliente = $_GET['codigoCliente'];
}
if (isset($_GET['name'])){
    $name = $_GET['name'];
}
if (isset($_GET['lastName'])){
    $lastName = $_GET['lastName'];
}
if (isset($_GET['email'])){
    $email = $_GET['email'];
}
if (isset($_GET['phone'])){
    $phone = $_GET['phone'];
}
if (isset($_GET['address'])){
    $address = $_GET['address'];
}
if (isset($_GET['item2'])){
    $item2 = $_GET['item2'];
}
if (isset($_GET['item1'])){
    $item1 = $_GET['item1'];
}
if (isset($_GET['item3'])){
    $item3 = $_GET['item3'];
}
if (isset($_GET['item4'])){
    $item4 = $_GET['item4'];
}
if (isset($_GET['item5'])){
    $item5 = $_GET['item5'];
}
if (isset($_GET['item6'])){
    $item6 = $_GET['item6'];
}
if (isset($_GET['item7'])){
    $item7 = $_GET['item7'];
}
if (isset($_GET['item8'])){
    $item8 = $_GET['item8'];
}
if (isset($_GET['item9'])){
    $item9 = $_GET['item9'];
}
if (isset($_GET['item10'])){
    $item10 = $_GET['item10'];
}
if (isset($_GET['nombreArt1'])){
    $nombreArt1 = $_GET['nombreArt1'];
}
if (isset($_GET['precio1'])){
    $precio1 = $_GET['precio1'];
}
if (isset($_GET['nombreArt2'])){
    $nombreArt2 = $_GET['nombreArt2'];
}
if (isset($_GET['precio2'])){
    $precio2 = $_GET['precio2'];
}
if (isset($_GET['nombreArt3'])){
    $nombreArt3 = $_GET['nombreArt3'];
}
if (isset($_GET['precio3'])){
    $precio3 = $_GET['precio3'];
}
if (isset($_GET['nombreArt4'])){
    $nombreArt4 = $_GET['nombreArt4'];
}
if (isset($_GET['precio4'])){
    $precio4 = $_GET['precio4'];
}
if (isset($_GET['nombreArt5'])){
    $nombreArt5 = $_GET['nombreArt5'];
}
if (isset($_GET['precio5'])){
    $precio5 = $_GET['precio5'];
}
if (isset($_GET['nombreArt6'])){
    $nombreArt6 = $_GET['nombreArt6'];
}
if (isset($_GET['precio6'])){
    $precio6 = $_GET['precio6'];
}
if (isset($_GET['nombreArt7'])){
    $nombreArt7 = $_GET['nombreArt7'];
}
if (isset($_GET['precio7'])){
    $precio7 = $_GET['precio7'];
}
if (isset($_GET['nombreArt8'])){
    $nombreArt8 = $_GET['nombreArt8'];
}
if (isset($_GET['precio8'])){
    $precio8 = $_GET['precio8'];
}
if (isset($_GET['nombreArt9'])){
    $nombreArt9 = $_GET['nombreArt9'];
}
if (isset($_GET['precio9'])){
    $precio9 = $_GET['precio9'];
}
if (isset($_GET['nombreArt10'])){
    $nombreArt10 = $_GET['nombreArt10'];
}
if (isset($_GET['precio10'])){
    $precio10 = $_GET['precio10'];
}
?>
<script>
    function importing() {
        var codigo = '<?php echo $codigoAlb?>';
        var id = '<?php echo $codigoCliente?>';
        var name = '<?php echo $name?>';
        var lastName = '<?php echo $lastName?>';
        var email = '<?php echo $email?>';
        var phone = '<?php echo $phone?>';
        var address = '<?php echo $address?>';
        var item1 = '<?php echo $item1?>';
        var nombreArt1 = '<?php echo $nombreArt1?>';
        var precio1 = '<?php echo $precio1?>';
        var item2 = '<?php echo $item2?>';
        var nombreArt2 = '<?php echo $nombreArt2?>';
        var precio2 = '<?php echo $precio2?>';
        var item3 = '<?php echo $item3?>';
        var nombreArt3 = '<?php echo $nombreArt3?>';
        var precio3 = '<?php echo $precio3?>';
        var item4 = '<?php echo $item4?>';
        var nombreArt4 = '<?php echo $nombreArt4?>';
        var precio4 = '<?php echo $precio4?>';
        var item5 = '<?php echo $item5?>';
        var nombreArt5 = '<?php echo $nombreArt5?>';
        var precio5 = '<?php echo $precio5?>';
        var item6 = '<?php echo $item6?>';
        var nombreArt6 = '<?php echo $nombreArt6?>';
        var precio6 = '<?php echo $precio6?>';
        var item7 = '<?php echo $item7?>';
        var nombreArt7 = '<?php echo $nombreArt7?>';
        var precio7 = '<?php echo $precio7?>';
        var item8 = '<?php echo $item8?>';
        var nombreArt8 = '<?php echo $nombreArt8?>';
        var precio8 = '<?php echo $precio8?>';
        var item9 = '<?php echo $item9?>';
        var nombreArt9 = '<?php echo $nombreArt9?>';
        var precio9 = '<?php echo $precio9?>';
        var item10 = '<?php echo $item10?>';
        var nombreArt10 = '<?php echo $nombreArt10?>';
        var precio10 = '<?php echo $precio10?>';
        var iva = 0;

        document.getElementById('codigo').value = codigo;
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('apellido').value = lastName;
        document.getElementById('email').value = email;
        document.getElementById('telefono').value = phone;
        document.getElementById('direccion').value = address;
        document.getElementById('codigoArt1').value = item1;
        document.getElementById('nombreArt1').value = nombreArt1;
        document.getElementById('precio1').value = precio1;
        document.getElementById('codigoArt2').value = item2;
        document.getElementById('nombreArt2').value = nombreArt2;
        document.getElementById('precio2').value = precio2;
        document.getElementById('codigoArt3').value = item3;
        document.getElementById('nombreArt3').value = nombreArt3;
        document.getElementById('precio3').value = precio3;
        document.getElementById('codigoArt4').value = item4;
        document.getElementById('nombreArt4').value = nombreArt4;
        document.getElementById('precio4').value = precio4;
        document.getElementById('codigoArt5').value = item5;
        document.getElementById('nombreArt5').value = nombreArt5;
        document.getElementById('precio5').value = precio5;
        document.getElementById('codigoArt6').value = item6;
        document.getElementById('nombreArt6').value = nombreArt6;
        document.getElementById('precio6').value = precio6;
        document.getElementById('codigoArt7').value = item7;
        document.getElementById('nombreArt7').value = nombreArt7;
        document.getElementById('precio7').value = precio7;
        document.getElementById('codigoArt8').value = item8;
        document.getElementById('nombreArt8').value = nombreArt8;
        document.getElementById('precio8').value = precio8;
        document.getElementById('codigoArt9').value = item9;
        document.getElementById('nombreArt9').value = nombreArt9;
        document.getElementById('precio9').value = precio9;
        document.getElementById('codigoArt10').value = item10;
        document.getElementById('nombreArt10').value = nombreArt10;
        document.getElementById('precio10').value = precio10;
        valor = document.getElementById('total').innerHTML =
            (parseFloat(precio1) + parseFloat(precio2) +
                parseFloat(precio3) + parseFloat(precio4) +
                parseFloat(precio5) + parseFloat(precio6) +
                parseFloat(precio7) + parseFloat(precio8) +
                parseFloat(precio9) + parseFloat(precio10)).toFixed(2);
        iva = document.getElementById('iva').innerHTML = (valor*21/100).toFixed(2);
        document.getElementById('gTotal').innerHTML = (parseFloat(valor) + parseFloat(iva)).toFixed(2) + "€";
    }
</script>