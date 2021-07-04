<?php
class Factura{
// dbection
    private $dbF;
// Table
    private $db_table = "facturas";
// Columns
    public $idFac;
    public $codigoFac;
    public $codigoCliente;
    public $item1;
    public $item2;
    public $item3;
    public $item4;
    public $item5;
    public $item6;
    public $item7;
    public $item8;
    public $item9;
    public $item10;
    public $creado;


// Db dbection
    public function __construct($dbF){
        $this->dbF = $dbF;
    }

// GET ALL
    public function getFacturas(){
        $sqlQuery = "SELECT * FROM facturas"."";
        $this->result = $this->dbF->query($sqlQuery);
        return $this->result;
    }

// CREATE
    public function createFactura(){
// sanitize
        if ($this->codigoCliente ==! "") {
            $this->codigoFac = htmlspecialchars(strip_tags($this->codigoFac));
            $this->codigoCliente = htmlspecialchars(strip_tags($this->codigoCliente));
            $this->codigoArt1 = htmlspecialchars(strip_tags($this->item1));
            $this->codigoArt2 = htmlspecialchars(strip_tags($this->item2));
            $this->codigoArt3 = htmlspecialchars(strip_tags($this->item3));
            $this->codigoArt4 = htmlspecialchars(strip_tags($this->item4));
            $this->codigoArt5 = htmlspecialchars(strip_tags($this->item5));
            $this->codigoArt6 = htmlspecialchars(strip_tags($this->item6));
            $this->codigoArt7 = htmlspecialchars(strip_tags($this->item7));
            $this->codigoArt8 = htmlspecialchars(strip_tags($this->item8));
            $this->codigoArt9 = htmlspecialchars(strip_tags($this->item9));
            $this->codigoArt10 = htmlspecialchars(strip_tags($this->item10));
            $this->creado = htmlspecialchars(strip_tags($this->creado));
            $sqlQuery = "INSERT INTO
" . $this->db_table . " SET codigoFac = '" . $this->codigoFac . "',
codigoCliente = '" . $this->codigoCliente . "',
item1 = '" . $this->item1 . "',
item2 = '" . $this->item2 . "',
item3 = '" . $this->item3 . "',
item4 = '" . $this->item4 . "',
item5 = '" . $this->item5 . "',
item6 = '" . $this->item6 . "',
item7 = '" . $this->item7 . "',
item8 = '" . $this->item8 . "',
item9 = '" . $this->item9 . "',
item10 = '" . $this->item10 . "',
creado = '" . $this->creado . "'";
            $this->dbF->query($sqlQuery);
        }else{
            echo "El campo de cliente no puede quedar vacio <br>";
        }
        if($this->dbF->affected_rows > 0){
            return true;
        }
        return false;
    }

// UPDATE
    public function getSingleFactura(){
        $sqlQuery = "SELECT * FROM facturas WHERE codigoFac = '$this->codigoFac'";
        $record = $this->dbF->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->idFac = $dataRow['id'];
        $this->codigoCliente = $dataRow['codigoCliente'];
        $this->item1 = $dataRow['item1'];
        $this->item2 = $dataRow['item2'];
        $this->item3 = $dataRow['item3'];
        $this->item4 = $dataRow['item4'];
        $this->item5 = $dataRow['item5'];
        $this->item6 = $dataRow['item6'];
        $this->item7 = $dataRow['item7'];
        $this->item8 = $dataRow['item8'];
        $this->item9 = $dataRow['item9'];
        $this->item10 = $dataRow['item10'];
        $this->creado = $dataRow['creado'];
    }

// UPDATE
    public function updateFac(){

        $this->codigoCliente=htmlspecialchars(strip_tags($this->codigoCliente));
        $this->item1=htmlspecialchars(strip_tags($this->item1));
        $this->item2=htmlspecialchars(strip_tags($this->item2));
        $this->item3=htmlspecialchars(strip_tags($this->item3));
        $this->item4=htmlspecialchars(strip_tags($this->item4));
        $this->item5=htmlspecialchars(strip_tags($this->item5));
        $this->item6=htmlspecialchars(strip_tags($this->item6));
        $this->item7=htmlspecialchars(strip_tags($this->item7));
        $this->item8=htmlspecialchars(strip_tags($this->item8));
        $this->item9=htmlspecialchars(strip_tags($this->item9));
        $this->item10=htmlspecialchars(strip_tags($this->item10));
        $this->creado=htmlspecialchars(strip_tags($this->creado));
        $this->codigoAlb=htmlspecialchars(strip_tags($this->codigoFac));

        $sqlQuery = "UPDATE ". $this->db_table ." SET codigoFac = '".$this->codigoFac."',
codigoCliente = '".$this->codigoCliente."',
item1 = '".$this->item1."',
item2 = '".$this->item2."',
item3 = '".$this->item3."',
item4 = '".$this->item4."',
item5 = '".$this->item5."',
item6 = '".$this->item6."',
item7 = '".$this->item7."',
item8 = '".$this->item8."',
item9 = '".$this->item9."',
item10 = '".$this->item10."',
creado = '".$this->creado."'
WHERE codigoFac = ".$this->codigoFac;

        $this->dbF->query($sqlQuery);
        if($this->dbF->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteFactura(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->idFac;
        $this->dbF->query($sqlQuery);
        if($this->dbF->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>
