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
	.when('gestorcases',{
		templateUrl:'views/gestorcases.php',
		controller:'GestorCases'
	})	

	.when('/barrisdigitals',{
		templateUrl:'views/barrisdigitals.html',
		controller:'DigitalsController'
	})
	.when('/barrissostenibles',{
		templateUrl:'views/barrissostenibles.html',
		controller:'SosteniblesController'
	})
	.when('/espectacleenviu',{
		templateUrl:'views/espectacleenviu.html',
		controller:'EspectacleController'
	})
	.when('/contacte',{
		templateUrl:'views/contacte.html',
		controller:'ContacteController'
	})

	.otherwise({
		redirectTo: '/'
	})
}])

