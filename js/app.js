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
	.otherwise({
		redirectTo: '/'
	})
}])

