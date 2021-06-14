<?php
//conexion por procedimiento
//establecemos los datos de conexion almacenandolos en variable
$db_host = "localhost";
$db_nombreDB = "productos";
$db_usuario = "jym126";
$db_contrasena = "sherimarlen1";


//creamos una variable para establcecer la conexion y con el comando connect le pasamos los datos de conexion
// que estan almacenados en nuestras variables.
$conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombreDB);

//En caso de error de conexion lanza un mensaje de error
if (mysqli_connect_errno()){
    echo "<br><p style='color: blue; font-size: 24px'> Fallo al conectar con base de datos</p>";
    exit();
}
?>
