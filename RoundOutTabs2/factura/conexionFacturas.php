<?php
class DatabaseF {
    public $dbF;
    public function getConnection(){
        $this->dbF = null;
        try{
            $this->dbF = new mysqli('localhost','jym126','sherimarlen1','productos');
        }catch(Exception $e){
            echo "No se puede conectar a la base de datos: " . $e->getMessage();
        }
        return $this->dbF;
    }
}
?>