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
	
    $scope.errorLogin=false;
    $scope.entrar = function(){
        if ($scope.email=="" || $scope.pass=="") alert ("verifica datos") 
            else{
        let data = new FormData()
        data.append("acc","entrar");
        data.append("correu", $scope.email);
        data.append("pass", $scope.pass);
        let defered=$q.defer();
        $http.post("models/login.php", data, {headers:{"Content-type" : undefined}, transformRequest: angular.identity})

        .then((res)=>{
            defered.resolve(res);
            $scope.datos=res.data;
            console.log(res.data);
            if ($scope.datos == false) {
            	$scope.errorLogin=true;
            }
            else{
            	 window.location.href="./backend/";
            }
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{})
        }
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
	       $scope.casa=res.data.casa;
	       $scope.especialitats=res.data.especialitats;
	       console.log($scope.casa);
	       console.log($scope.especialitats);
	       $scope.nom=$scope.casa[1];
	       $scope.descripcio=$scope.casa[3];
	       $scope.url=$scope.casa[5];
      
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});


})