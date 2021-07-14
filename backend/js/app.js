let app= angular.module('backend',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/cases.php',
		controller:'HomeController'
	})
	.when('/edicions/:idEsp',{
		templateUrl:'views/edicions.php',
		controller:'EdicionsController'
	})	
	.when('/projectes/:idEdicio/:dataInici',{
		templateUrl:'views/projectes.php',
		controller:'ProjectesController'
	})	
	.when('/especialitats/:idcasa',{	
        templateUrl:'views/especialitat.php',
        controller:'EspecialitatController'
    })
	.when('/directors/',{
		templateUrl:'views/directors.php',
		controller:'DirectorsController'
	})
	.when('/multimedia/:idProjecte',{
		templateUrl:'views/multimedia.php',
		controller:'MultimediaController'
	})
	.otherwise({
		redirectTo: '/'

	})
}])