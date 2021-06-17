let app= angular.module('repoco',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/home.html',
		controller:'IndexController'
	})
	.when('/login',{
		templateUrl:'views/login.php',
		controller:'LoginController'
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
	.when('/cases/:idCasa',{
		templateUrl:'views/cases.html',
		controller:'CasesController'
	})
	.when('/contacte',{
		templateUrl:'views/contacte.html',
		controller:'ContacteController'
	})

	.otherwise({
		redirectTo: '/'
	})
}])

