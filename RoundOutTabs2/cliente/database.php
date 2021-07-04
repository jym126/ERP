<?php
class DatabaseC {
public $dbC;
public function getConnection(){
$this->dbC = null;
try{
$this->dbC = new mysqli('localhost','jym126','sherimarlen1','mycompany');
}catch(Exception $e){
echo "No se puede conectar a la base de datos: " . $e->getMessage();
}
return $this->dbC;
}
}
?>