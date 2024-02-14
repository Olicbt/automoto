app.config(function($routeProvider) {
  $routeProvider
  
  .when("/", {
    templateUrl : "view/main.html",
	controller: 'myCtrl'
  })
  
  .when("/kupuvac", {
    templateUrl : "view/kupuvac.html",
	controller: 'myCtrl'
  })
  
  .when("/marka", {
    templateUrl : "view/marka.html",
	controller: 'myCtrl'
  })
  
  .when("/model", {
    templateUrl : "view/model.html",
	controller: 'myCtrl'
  })
  
  .when("/prodazba", {
    templateUrl : "view/prodazba.html",
	controller: 'myCtrl'
  })
  
  .otherwise("/", {
    templateUrl : "view/index.html",
	controller: 'myCtrl'
  })
  
  
});