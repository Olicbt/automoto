<?php
class DB{
	//class members
private $servername = "localhost";
private $db_username = "root";
private $db_password = "";
private $db_name = "avtomoto";
private $conn;

public function __construct(){
	try {
    $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db_name."", $this->db_username, $this->db_password);
    // set the PDO error mode to exception
    
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$statement  = $this->conn->prepare("SET NAMES 'utf8'");
		$statement->execute();
        ini_set('default_charset', 'utf-8');
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}// end __construct

public function insertRow($table_name,$column_name,$column_value){
	$sql="INSERT INTO $table_name($column_name) VALUES ($column_value)";
	$this->conn->exec($sql);
}
public function deleteAllRows($table_name){
	$sql="DELETE FROM $table_name";
	$this->conn->exec($sql);
}
public function deleteRow($table_name,$condition){
	$sql="DELETE FROM $table_name WHERE $condition";
	$this->conn->exec($sql);
}
public function selectRows($table_name){
	$con=$this->conn;
	$stmt=$con->prepare("SELECT * FROM  $table_name");
    $stmt->execute();
	
    return $stmt->fetchAll();
}

public function selectJoin($fields,$table_name){
	$con=$this->conn;
	$stmt=$con->prepare("SELECT $fields FROM  $table_name");
    $stmt->execute();
	
    return $stmt->fetchAll();
}

public function updateRow($table_name,$columns,$condition){
	$sql="UPDATE $table_name SET $columns WHERE $condition";
	$this->conn->exec($sql);
}
}// end class


?>