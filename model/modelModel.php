<?php

class ModelModel extends DB{
	
	public function insertModel($modelIme, $opis, $godina, $cena){
		$table_name = "model";
		$column_name = "modelIme, opis, godina, cena";
		$column_value = "'$modelIme', '$opis', $godina, $cena";
		parent::insertRow($table_name, $column_name, $column_value);
	}
	
	public function selectModel(){
		return parent::selectRows("model");
	}
	
	public function deleteModel($pk_value){
		$table_name = "model";
		$condition = "model_id=$pk_value";
		parent::deleteRow($table_name, $condition);
	}
	
	
}



?>