<?php

class ModelProdazba extends DB{
	
	public function insertProdazba($kupuvac_id, $marka_id, $model_id, $data){
		$table_name = "prodazba";
		$column_name = "kupuvac_id, marka_id, model_id, data";
		$column_value = "$kupuvac_id, $marka_id, $model_id, '$data'";
		parent::insertRow($table_name, $column_name,$column_value);
	}
	
	public function selectProdazba(){
		return parent::selectRows("prodazba INNER JOIN kupuvac ON prodazba.kupuvac_id = kupuvac.kupuvac_id
		                                    INNER JOIN marka ON prodazba.marka_id = marka.marka_id
											INNER JOIN model ON prodazba.model_id = model.model_id");
	}
	
	public function deleteProdazba($pk_value){
		$table_name = "prodazba";
		$condition = "prodazba_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
	
}


?>