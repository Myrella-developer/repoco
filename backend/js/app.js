let app= angular.module('backend',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/cases.php',
		controller:'HomeController'
	})
	.when('/edicions/:idcasa',{
		templateUrl:'views/edicions.php',
		controller:'EdicionsController'
	})	
	.when('/projectes/:idcasa',{
		templateUrl:'views/projectes.php',
		controller:'ProjectesController'
	})	
	.when('/multimedia/:idcasa',{
		templateUrl:'views/multimedia.php',
		controller:'MultimediaController'
	})	
	.when('/especialitats/:idcasa',{	
        templateUrl:'views/especialitat.php',
        controller:'EspecialitatController'
    })
	.when('/directors/:idcasa',{
		templateUrl:'views/directors.php',
		controller:'DirectorsController'
	})
	.otherwise({
		redirectTo: '/'

	})
}])