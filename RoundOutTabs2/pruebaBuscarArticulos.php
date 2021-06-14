<?php
    //clausula para evitar mostrar el error cuando al imprimir el documento se llama a la pagina por segunda vez
    //y la variable "buscar" está vacía.
    error_reporting(0);
    //Se captura de la pagina de formBuscar lo que el usuario ha puesto en el campo con nombre "buscar".
    $busqueda = json_decode($_POST['data'])[0]->value;
    if ($busqueda != "") {

        try {
            //var_dump($busqueda);
            require("conexionPDO.php");
            //Realizamos la consulta con LIKE para poder hacer busquedas parciales
            $sql = ("SELECT * FROM articulos WHERE nombre LIKE ?");
            $consulta = $base->prepare($sql);
            //Como no podemos meter los % en la consulta creamos una buenva variable que sea igual a la busqueda
            //con los % a ambos lados
            $parametros = ["%$busqueda%"];
            $consulta->execute($parametros);

            $registro = $consulta->fetchALL(PDO::FETCH_ASSOC);
            echo json_encode($registro);
            $consulta->closeCursor();

        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

    }else{
        echo "<div>Debe introducir una búsqueda</div>"."<br><br>";
    }
?>
