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
	
	.otherwise({
		redirectTo: '/'
	})
}])

