<?php
include "../classes/class_db.php";

$data = json_decode(file_get_contents("php://input"));

$table_name = $data[0]->table_name;


switch ($table_name){
	
	case "kupuvac":
	include "modelKupuvac.php";
	$instanceModelKupuvac = new ModelKupuvac();
	$ime    = $data[0]->ime;
	$adresa = $data[0]->adresa;
	$telefon= $data[0]->telefon;
	$instanceModelKupuvac->insertKupuvac($ime, $adresa, $telefon);
	break;
	
	case "marka":
	include "modelMarka.php";
	$instanceModelMarka = new ModelMarka();
	$markaIme = $data[0]->markaIme;
	$drzava   = $data[0]->drzava;
	$grad     = $data[0]->grad;
	$instanceModelMarka->insertMarka($markaIme, $drzava, $grad);
	break;
	
	case "model":
	include "modelModel.php";
	$instanceModelModel = new ModelModel();
	$modelIme = $data[0]->modelIme;
	$opis     = $data[0]->opis;
	$godina   = $data[0]->godina;
	$cena     = $data[0]->cena;
	$instanceModelModel->insertModel($modelIme, $opis, $godina, $cena);
	break;
	
	case "prodazba":
	include "modelProdazba.php";
	$instanceModelProdazba = new ModelProdazba();
	$kupuvac_id = $data[0]->kupuvac_id;
	$marka_id   = $data[0]->marka_id;
	$model_id   = $data[0]->model_id;
	$data       = $data[0]->data;
	$instanceModelProdazba->insertProdazba($kupuvac_id, $marka_id, $model_id, $data);
	break;
}



?>