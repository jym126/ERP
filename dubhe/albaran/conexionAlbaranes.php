<?php
class DatabaseA {
    public $dbA;
    public function getConnection(){
        $this->dbA = null;
        try{
            $this->dbA = new mysqli('localhost','jym126','sherimarlen1','productos');
        }catch(Exception $e){
            echo "No se puede conectar a la base de datos: " . $e->getMessage();
        }
        return $this->dbA;
    }
}
?>