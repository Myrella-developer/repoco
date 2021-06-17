angular.module("repoco")
.controller("IndexController", function($scope, $http, $q, $rootScope, $routeParams){
	let data = new FormData();
	   data.append("acc", "r");
	  
	   let defered = $q.defer();

	   $http.post("models/index.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	       defered.resolve(res);
	       $scope.cases=res.data;
	       // console.log($scope.cases);
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	
})

.controller("LoginController", function($scope, $http, $q, $location, $rootScope){
	console.log("Carga controller login");
	$scope.email = "pancracio@gmail.com";
	$scope.pass = "1111";
	$scope.tipo = "a"
	$scope.errorLogin=false;
	$scope.entrar = function(){
		if ($scope.email=="" || $scope.pass=="") alert ("verifica datos") 
			else{
		let data = new FormData()

		data.append("acc","l");
		data.append("email", $scope.email)
		data.append("pass", $scope.pass)

		let defered=$q.defer();

		$http.post("models/login.php", data, {
			headers:{"Content-type" : undefined}, transformRequest: angular.identity
		})
		.then((res)=>{
			defered.resolve(res);
			$scope.datos=res.data;
			$location.path("/gestor");
			if (res.data == false) {
				$scope.errorLogin = true;
			} else{
				$location.path("/gestor");
			}
		})

		.catch((err)=>{console.log(err.statusText)})

		.finally(()=>{})
		}
	}
	$scope.tancar=()=>{
		let data = new FormData;
		data.append("acc","logout");

		let defered =$q.defer();
		$http.post("models/login.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

		.then((res) =>{
			defered.resolve(res);
			$scope.datos=res.data;
			$location.path("/");
			console.log($scope.datos);
		})
		.catch((err)=>{console.log(err.statusText)})
		.finally(()=>{});
	}

})     

.controller("CasesController", ($q, $http, $scope, $routeParams) => {
	
	$scope.param1=$routeParams.idCasa;

	let data = new FormData();
	   data.append("acc", "r");
	   data.append("idcasa",$scope.param1);
	  
	   let defered = $q.defer();

	   $http.post("models/cases.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	       defered.resolve(res);
	       $scope.cases=res.data;
	       console.log($scope.cases);
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});
	
})