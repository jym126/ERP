<?php
//Importamos PDO (PHP Data Object) permite acceder a bases de datos con un controlador
//Indicamos parametros de conexion a la base de datos y almacenamos esos valores en $base
$base = new PDO('mysql:host=localhost; dbname=productos', 'jym126', 'sherimarlen1');
//Con estos parámetros se detectan errores y lanzan excepciones en caso de fallo de conexion con la base de datos
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$base->exec("SET CHARACTER SET UTF8");
?>