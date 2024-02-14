<?php
include "../classes/class_db.php";

$d = array();
$table_name = $_GET["table_name"];


switch ($table_name){
	
	case "kupuvac":
	include "modelKupuvac.php";
	$instanceModelKupuvac = new ModelKupuvac();
	$results = $instanceModelKupuvac->selectKupuvac();
	foreach($results as $row){
		$d['records'][] = array ('kupuvac_id'=>$row['kupuvac_id'],
		                          'ime'      =>$row['ime'],
								  'adresa'   =>$row['adresa'],
								  'telefon'  =>$row['telefon']);
	}
	echo json_encode($d);
	break;
	
	case "marka":
	include "modelMarka.php";
	$instanceModelMarka = new ModelMarka();
	$results = $instanceModelMarka->selectMarka();
	foreach ($results as $row){
		$d['records'][] = array ('marka_id'=>$row['marka_id'],
		                         'markaIme'=>$row['markaIme'],
								 'drzava'  =>$row['drzava'],
								 'grad'    =>$row['grad']);
	}
	echo json_encode($d);
	break;
	
	case "model":
	include "modelModel.php";
	$instanceModelModel = new ModelModel();
	$results = $instanceModelModel->selectModel();
	foreach ($results as $row){
		$d['records'][] = array ('model_id'=>$row['model_id'],
		                         'modelIme'=>$row['modelIme'],
								 'opis'    =>$row['opis'],
								 'godina'  =>$row['godina'],
								 'cena'    =>$row['cena']);
	}
	echo json_encode($d);
	break;
	
	case "prodazba":
	include "modelProdazba.php";
	$instanceModelProdazba = new ModelProdazba();
	$results = $instanceModelProdazba->selectProdazba();
	foreach ($results as $row){
		$d['records'][] = array ('prodazba_id'=>$row['prodazba_id'],
		                         'kupuvac_id' =>$row['kupuvac_id'],
								 'marka_id'   =>$row['marka_id'],
								 'model_id'   =>$row['model_id'],
								 'data'       =>$row['data'],
								 'ime'      =>$row['ime'],
								  'adresa'   =>$row['adresa'],
								  'telefon'  =>$row['telefon'],
								  'markaIme'=>$row['markaIme'],
								 'drzava'  =>$row['drzava'],
								 'grad'    =>$row['grad'],
								 'modelIme'=>$row['modelIme'],
								 'opis'    =>$row['opis'],
								 'godina'  =>$row['godina'],
								 'cena'    =>$row['cena']);
	}
	echo json_encode($d);
	break;
}


?>