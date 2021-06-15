angular.module("repoco")
.controller("IndexController", function($scope, $http, $q, $rootScope){

	$http.post("models/index.php")

	.then((res)=>{
		defered.resolve(res);
	})

	.catch((err)=>{console.log(err.statusText)})

	.finally(()=>{});
})