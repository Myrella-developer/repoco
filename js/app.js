let app= angular.module('repoco',['ngRoute']);

app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'./index.html',
		controller:'IndexController'
	})
	.when('/home',{
		templateUrl:'views/home.html',
		controller:'HomeController'
	})
	
	.otherwise({
		redirectTo: '/'
	})
}])

