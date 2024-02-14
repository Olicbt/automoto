<?php

class ModelKupuvac extends DB {
	
	public function insertKupuvac($ime, $adresa, $telefon){
		$table_name = "kupuvac";
		$column_name = "ime, adresa, telefon";
		$column_value = "'$ime', '$adresa', $telefon";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectKupuvac(){
		return parent::selectRows("kupuvac");
	}
	
	public function deleteKupuvac($pk_value){
		$table_name = "kupuvac";
		$condition = "kupuvac_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
}


?>