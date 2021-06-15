let app= angular.module('projecteco',['ngRoute']);

app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/principal.php',
		controller:'PrincipalController'
	})
	
	.otherwise({
		redirectTo: '/'
	})
}])

