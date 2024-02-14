<?php
include "../classes/class_db.php";

$data = json_decode (file_get_contents("php://input"));

$table_name = $data[0]->table_name;
$pk_value = $data[0]->pk_value;


switch ($table_name){
	
	case "kupuvac":
	include "modelKupuvac.php";
	$instanceModelKupuvac = new ModelKupuvac();
	$instanceModelKupuvac->deleteKupuvac($pk_value);
	break;
	
	case "marka":
	include "modelMarka.php";
	$instanceModelMarka = new ModelMarka();
	$instanceModelMarka->deleteMarka($pk_value);
	break;
	
	case "model":
	include "modelModel.php";
	$instanceModelModel = new ModelModel();
	$instanceModelModel->deleteModel($pk_value);
	break;
	
	case "prodazba":
	include "modelProdazba.php";
	$instanceModelProdazba = new ModelProdazba();
	$instanceModelProdazba->deleteProdazba($pk_value);
	break;
}


?>