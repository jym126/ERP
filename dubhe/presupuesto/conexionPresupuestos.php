<?php
class DatabaseP {
    public $dbP;
    public function getConnection(){
        $this->dbP = null;
        try{
            $this->dbP = new mysqli('localhost','jym126','sherimarlen1','productos');
        }catch(Exception $e){
            echo "No se puede conectar a la base de datos: " . $e->getMessage();
        }
        return $this->dbP;
    }
}
?>