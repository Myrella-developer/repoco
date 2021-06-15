angular.module("repoco")
.controller("IndexController", function($scope, $http, $q, $rootScope){
	 //   console.log("dasd");
	$http.post("models/index.php")

	.then((res)=>{
		defered.resolve(res);
	})

	.catch((err)=>{console.log(err.statusText)})

	.finally(()=>{});
})

.controller("LoginController", function($scope, $http, $q, $location, $rootScope){
	console.log("Carga controller login");
	$scope.email = "pancracio@gmail.com";
	$scope.pass = "1111";
	$$scope.tipo = "a"
	$scope.errorLogin=false;
	$scope.entrar = function(){
		let data = new FormData()

		data.append("acc","l");
		data.append("email", $scope.email)
		data.append("pass", $scope.pass)

		let defered=$q.defer();

		$http.post("models/login.php", data, {
			headers:{"Content-type" : undefined}, transformRequest: angular.identity
		})
		console.log("LLegamos breoow")
		.then((res)=>{
			defered.resole(res);
			if (res.data == false) {
				console.log("LLegamos breoow");
				$scope.errorLogin = true;
			} else{
				window.location.href ="home.html";
			}
		})

		.catch((err)=>{console.log(err.statusText)})

		.finally(()=>{})
	}

})
     
.controller("HomeController", function(){
    // console.log("dasd");
 })
