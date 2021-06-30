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
	.when('/espAny/:any/:idCasa',{
		templateUrl:'views/edicions.html',
		controller:'EdicionsController'
	})
	.when('/projectes',{
		templateUrl:'views/projectes.php',
		controller:'ProjectesController'
	})	
	.when('/cases/:idCasa',{
		templateUrl:'views/cases.html',
		controller:'CasesController'
	})
	.when('/edEsp/:idEdicio',{
		templateUrl:'views/especialitat.html',
		controller:'EspecialitatController'
	})
	.when('/contacte',{
		templateUrl:'views/contacte.html',
		controller:'ContacteController'
	})
	
	.otherwise({
		redirectTo: '/'
	})
}])

