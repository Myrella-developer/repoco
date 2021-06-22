let app= angular.module('backend',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/cases.php',
		controller:'HomeController'
	})
	.when('/ediciones',{
		templateUrl:'views/ediciones.php',
		controller:'EdicionesController'
	})	
	.when('/projectes',{
		templateUrl:'views/projectes.php',
		controller:'ProjectesController'
	})	
	.when('/gestesp/:idcasa',{
        templateUrl:'views/gestesp.php',
        controller:'GestorEspController'
    })
	.otherwise({
		redirectTo: '/'
	})
}])