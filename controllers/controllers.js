angular.module("repoco")
.controller("IndexController", function($scope, $http, $q, $rootScope){
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
     
.controller("RecuperarController", ($q, $scope, $http) => {
    $scope.email = "pancracio@gmail.com";
    $scope.nuevaContra = "nueva contra";

    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","recuperar");
    data.append("email", $scope.email);
    data.append("nuevaContra", $scope.nuevaContra);

    $http.post("models/recPass.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        console.log(res.data);
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})

.controller("GestorController", ($scope) => {
	$scope.nombre = "Admin";
	$scope.tipo = "d";
})

.controller("GestorCasesController", ($scope,$q,$http,$location) =>{
	let data = new FormData;
	
	let defered=$q.defer();
	$http.post("models/login.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

	.then((res) =>{
		defered.resolve(res);
		$scope.datos=res.data;
		console.log($scope.datos);
	})

	.catch((err) => {console.log(err.statusText)})
	.finally(()=>{});

	$scope.gestorcases=()=>{

		data.append("acc","r");
		data.append("acc","u");
		data.append("acc","d");

		let defered=$q.defer();
		$http.post("models/gestorcases.php",data, { headers:{"Content-type" : undefined}, transformRequest: angular.identity})

		.then((res) => {
			defered.resolve(res);
			console.log(res.data);
		})
		.catch((err) => {console.log(err.statusText)})
		.finally(() => {})
	}
	$scope.tipo = "a";
})
	


.controller("EdicionesController", ($q, $http, $scope) => {
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","edicions");

    $http.post("models/projYedi.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.edicions = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})

.controller("ProjectesController", ($q, $http, $scope) => {
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","projectes");

    $http.post("models/projYedi.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.projectes = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})


.controller("CasesController", ($q, $http, $scope) => {
	console.log("LLego a casas");
})