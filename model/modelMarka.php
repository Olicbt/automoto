<?php


class ModelMarka extends DB{
	
	public function insertMarka($markaIme, $drzava, $grad){
		$table_name = "marka";
		$column_name = "markaIme, drzava, grad";
		$column_value = "'$markaIme', '$drzava', '$grad'";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectMarka(){
		return parent::selectRows("marka");
	}
	
	public function deleteMarka($pk_value){
		$table_name = "marka";
		$condition = "marka_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
	
}

?>