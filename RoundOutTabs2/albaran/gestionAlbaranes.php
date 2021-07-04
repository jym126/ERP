<?php
class Albaran{
// dbection
    private $dbA;
// Table
    private $db_table = "albaranes";
// Columns
    public $idAlb;
    public $codigoAlb;
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
    public function __construct($dbA){
        $this->dbA = $dbA;
    }

// GET ALL
    public function getAlbaranes(){
        $sqlQuery = "SELECT * FROM albaranes"."";
        $this->result = $this->dbA->query($sqlQuery);
        return $this->result;
    }

// CREATE
    public function createAlbaran(){
// sanitize
        $this->codigoAlb=htmlspecialchars(strip_tags($this->codigoAlb));
        $this->codigoCliente=htmlspecialchars(strip_tags($this->codigoCliente));
        $this->codigoArt1=htmlspecialchars(strip_tags($this->item1));
        $this->codigoArt2=htmlspecialchars(strip_tags($this->item2));
        $this->codigoArt3=htmlspecialchars(strip_tags($this->item3));
        $this->codigoArt4=htmlspecialchars(strip_tags($this->item4));
        $this->codigoArt5=htmlspecialchars(strip_tags($this->item5));
        $this->codigoArt6=htmlspecialchars(strip_tags($this->item6));
        $this->codigoArt7=htmlspecialchars(strip_tags($this->item7));
        $this->codigoArt8=htmlspecialchars(strip_tags($this->item8));
        $this->codigoArt9=htmlspecialchars(strip_tags($this->item9));
        $this->codigoArt10=htmlspecialchars(strip_tags($this->item10));
        $this->creado=htmlspecialchars(strip_tags($this->creado));
        $sqlQuery = "INSERT INTO
". $this->db_table ." SET codigoAlb = '".$this->codigoAlb."',
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
creado = '".$this->creado."'";
        $this->dbA->query($sqlQuery);
        if($this->dbA->affected_rows > 0){
            return true;
        }
        return false;
    }

// UPDATE
    public function getSingleAlbaran(){
        $sqlQuery = "SELECT * FROM albaranes WHERE codigoAlb = '$this->codigoAlb'";
        $record = $this->dbA->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->idAlb = $dataRow['id'];
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
    public function updateAlabaran(){

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
        $this->codigoAlb=htmlspecialchars(strip_tags($this->codigoAlb));

        $sqlQuery = "UPDATE ". $this->db_table ." SET codigoAlb = '".$this->codigoAlb."',
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
WHERE codigoAlb = ".$this->codigoAlb;

        $this->dbA->query($sqlQuery);
        if($this->dbA->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deletealbaran(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->idAlb;
        $this->dbA->query($sqlQuery);
        if($this->dbA->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>
