let app= angular.module('backend',['ngRoute']);
app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/gestorcases.php',
		controller:'GestorCasesController'
	})
	.when('/gestorcases',{
		templateUrl:'views/gestorcases.php',
		controller:'GestorCasesController'
	})
	.when('/ediciones/:idcasa',{
		templateUrl:'views/ediciones.php',
		controller:'EdicionesController'
	})	
	.when('/projectes/:idcasa',{
		templateUrl:'views/projectes.php',
		controller:'ProjectesController'
	})	
	//.when('/especialitat/:idcasa',{
	.when('/especialitats/:idcasa',{	
        templateUrl:'views/especialitat.php',
        controller:'EspecialitatController'
    })
	//.when('/directors/:idcasa',{
		.when('/directors',{	
			templateUrl:'views/directors.php',
			controller:'DirectorsController'
		})
	.otherwise({
		redirectTo: '/'

	})
}])