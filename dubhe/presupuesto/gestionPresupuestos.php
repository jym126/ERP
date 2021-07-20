<?php
class Presupuesto{
// dbection
    private $dbP;
// Table
    private $db_table = "presupuestos";
// Columns
    public $idPre;
    public $codigoPre;
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
    public function __construct($dbP){
        $this->dbP = $dbP;
    }

// GET ALL
    public function getPresupuestos(){
        $sqlQuery = "SELECT * FROM presupuestos"."";
        $this->result = $this->dbP->query($sqlQuery);
        return $this->result;
    }

// Crear presupuesto
    public function createPresupuestos(){
// sanitize
        $this->codigoPre=htmlspecialchars(strip_tags($this->codigoPre));
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
". $this->db_table ." SET codigoPre = '".$this->codigoPre."',
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
        $this->dbP->query($sqlQuery);
        if($this->dbP->affected_rows > 0){
            return true;
        }
        return false;
    }

// Buscar un único presupuesto
    public function getSinglePresupuesto(){
        $sqlQuery = "SELECT * FROM presupuestos WHERE codigoPre = '$this->codigoPre'";
        $record = $this->dbP->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->idPre = $dataRow['id'];
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

// Actualizar presupuesto
    public function updatePresupuesto(){
        $this->idPre=htmlspecialchars(strip_tags($this->idPre));
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
        $this->codigoPre=htmlspecialchars(strip_tags($this->codigoPre));

        $sqlQuery = "UPDATE ". $this->db_table ." SET 
codigoPre = '".$this->codigoPre."',
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
item10 = '".$this->item10."'
WHERE id = ".$this->idPre;
        $this->dbP->query($sqlQuery);
        if($this->dbP->affected_rows > 0){
            return true;
        }
        return false;
    }

// Borrar presupuesto
    function deletepresupuesto(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->idPre;
        $this->dbP->query($sqlQuery);
        if($this->dbP->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>
