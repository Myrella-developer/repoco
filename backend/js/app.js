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
	.when('/ediciones/:idcasa',{
		templateUrl:'views/ediciones.php',
		controller:'EdicionesController'
	})	
	.when('/projectes/:idcasa',{
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