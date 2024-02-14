var app = angular.module('myApp', ["ngRoute"]);

app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {



//    JSON
/*
$scope.kupuvac=[
{"kupuvac_id":1, "ime":"Trajko Trajkovski", "adresa":"Prilepska 11", "telefon":70555222},
{"kupuvac_id":2, "ime":"Mile Milevski", "adresa":"Bitola", "telefon":70333222}
];
*/


//SELECT

$scope.kupuvac=[];
$http.get("model/select.php?table_name=kupuvac")
.then(function (response){$scope.kupuvac = response.data.records;});

$scope.marka=[];
$http.get("model/select.php?table_name=marka")
.then(function (response){$scope.marka = response.data.records;});

$scope.model=[];
$http.get("model/select.php?table_name=model")
.then(function (response) {$scope.model = response.data.records;});

$scope.prodazba=[];
$http.get("model/select.php?table_name=prodazba")
.then(function (response) {$scope.prodazba = response.data.records;});



// INSERT

function postData(dataJson){
	$http(
	{
		method:"post",
		url:"model/insert.php",
		data:dataJson,
		headers:{ 'Content-type':'application/x-www-form-urlencoded'}
	}).then(function mySuccess(response){
		window.location.reload();
		$scope.success=true;
	});
}


$scope.details_kupuvac_fun = function (ime, adresa, telefon){
	alert(ime+" "+adresa+" "+telefon);
	$scope.kupuvacJSON=[
	{"ime":ime, "adresa":adresa, "telefon":telefon, "table_name":"kupuvac"}
	];
	postData($scope.kupuvacJSON);
	$scope.success=true;
}

$scope.details_marka_fun = function (markaIme, drzava, grad){
	alert(markaIme+" "+drzava+" "+grad);
	$scope.markaJSON=[
	{"markaIme":markaIme, "drzava":drzava, "grad":grad, "table_name":"marka"}
	];
	postData($scope.markaJSON);
	$scope.success=true;
}

$scope.details_model_fun = function (modelIme, opis, godina, cena){
	alert(modelIme+" "+opis+" "+godina+" "+cena);
	$scope.modelJSON=[
	{"modelIme":modelIme, "opis":opis, "godina":godina, "cena":cena, "table_name":"model"}
	];
	postData($scope.modelJSON);
	$scope.success=true;
}

$scope.details_prodazba_fun = function (kupuvac_id, marka_id, model_id, data){
	alert(kupuvac_id+" "+marka_id+" "+model_id+" "+data);
	$scope.prodazbaJSON=[
	{"kupuvac_id":kupuvac_id, "marka_id":marka_id, "model_id":model_id, "data":data, "table_name":"prodazba"}
	];
	postData($scope.prodazbaJSON);
	$scope.success=true;
}


// DELETE


$scope.deleteRow = function(table_name, pk_value){
	
	$scope.deleteJSON=[{"table_name":table_name, "pk_value":pk_value}];
	$http(
	{
		method:"post",
		url:"model/delete.php",
		data:$scope.deleteJSON,
		headers:{ 'Content-type':'application/x-www-form-urlencoded'}
	}).then(function mySuccess(response){
		window.location.reload();
		$scope.success=true;
	});
}



}
]);