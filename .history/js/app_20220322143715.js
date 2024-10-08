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
	.when('/districtes',{
		templateUrl:'views/districtes.php',
		controller:'PDistrictsControllers'
	})	
	.when('/cases/:idCasa',{
		templateUrl:'views/cases.html',
		controller:'CasesController'
	})
	.when('/edEsp/:idCasa/:idEdicio',{
		templateUrl:'views/especialitat.html',
		controller:'EspecialitatController'
	})
	.when('/pro/:idEdicio/:idProjecte',{
		templateUrl:'views/projecte.html',
		controller:'ProjecteController'
	})
	.when('/contacte',{
		templateUrl:'views/contacte.html',
		controller:'ContacteController'
	})
	
	.otherwise({
		redirectTo: '/'
	})
}])

