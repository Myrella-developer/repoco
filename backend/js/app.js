let app= angular.module('backend',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/home.html',
		controller:'IndexController'
	})
	.when('/gestor',{
		templateUrl:'views/gestor.php',
		controller:'GestorController'
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
	.otherwise({
		redirectTo: '/'
	})
}])