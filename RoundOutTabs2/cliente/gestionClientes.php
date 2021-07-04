<?php
class Employee{
// dbection
private $db;
// Table
private $db_table = "employee";
// Columns
public $id;
public $name;
public $lastName;
public $email;
public $designation;
public $address;
public $phone;
public $created;
public $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getEmployees(){
$sqlQuery = "SELECT id, name, email, designation, created FROM employee"."";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createEmployee(){
// sanitize
$this->id=htmlspecialchars(strip_tags($this->id));
$this->name=htmlspecialchars(strip_tags($this->name));
$this->lastName=htmlspecialchars(strip_tags($this->lastName));
$this->designation=htmlspecialchars(strip_tags($this->designation));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->address=htmlspecialchars(strip_tags($this->address));
$this->phone=htmlspecialchars(strip_tags($this->phone));
$this->created=htmlspecialchars(strip_tags($this->created));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET id = '".$this->id."',
name = '".$this->name."',
lastName = '".$this->lastName."',
designation = '".$this->designation."',
phone = '".$this->phone."',
email = '".$this->email."',
address = '".$this->address."',
created = '".$this->created."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleEmployee(){
$sqlQuery = "SELECT * FROM employee WHERE name = '$this->name' OR id = '$this->id'";
$record = $this->db->query($sqlQuery);
//var_dump($record);
//var_dump(mysqli_error($this->db));
$dataRow=$record->fetch_assoc();
$this->id = $dataRow['id'];
$this->name = $dataRow['name'];
$this->lastName = $dataRow['lastName'];
$this->email = $dataRow['email'];
$this->designation = $dataRow['designation'];
$this->address = $dataRow['address'];
$this->phone = $dataRow['phone'];
$this->created = $dataRow['created'];
}

// UPDATE
public function updateEmployee(){
$this->name=htmlspecialchars(strip_tags($this->name));
$this->lastName=htmlspecialchars(strip_tags($this->lastName));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->designation=htmlspecialchars(strip_tags($this->designation));
$this->created=htmlspecialchars(strip_tags($this->created));
$this->id=htmlspecialchars(strip_tags($this->id));
$this->address=htmlspecialchars(strip_tags($this->address));
$this->phone=htmlspecialchars(strip_tags($this->phone));

$sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
lastName = '".$this->lastName."',
email = '".$this->email."',
designation = '".$this->designation."',created = '".$this->created."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteEmployee(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>