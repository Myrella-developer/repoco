let app= angular.module('backend',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/gestorcases.php',
		controller:'GestorCasesController'
	})
	.when('/gestorcases',{
		templateUrl:'views/gestorcases.php',
		controller:'GestorCasesController'
	})
	.when('/ediciones',{
		templateUrl:'views/ediciones.php',
		controller:'EdicionesController'
	})	
	.when('/projectes',{
		templateUrl:'views/projectes.php',
		controller:'ProjectesController'
	})	
	.when('/gestesp',{
        templateUrl:'views/gestesp.php',
        controller:'GestorEspController'
    })
	.otherwise({
		redirectTo: '/'
	})
}])