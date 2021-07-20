<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jym126');
define('DB_PASSWORD', 'sherimarlen1');
define('DB_NAME', 'productos');

/* Attempt to connect to MySQL database */
$base = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($base === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>