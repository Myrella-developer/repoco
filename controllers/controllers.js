angular.module("repoco")
.controller("IndexController", function($scope, $http, $q, $rootScope, $routeParams){
	$rootScope.idioma="cat";
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

	   // $scope.cambiaIdioma=function(){

	   // }

	   $scope.espai="Espai Personal";
	   $scope.espacio="Área Personal";
	   $scope.inici="Inici";
	   $scope.inicio="Inicio";
	   $scope.contacte="Contacte";
	   $scope.contacto="Contacto";

	   $scope.changeimg=(posicion) =>{
		console.log($scope.cases[posicion].url);
		$scope.bgUrl = '../img/{{$scope.cases[posicion].url}}';

		// if ($scope.cases[posicion].url==$scope.cases[posicion].url) 
		// console.log("../img/{{$scope.cases[posicion].url}}");

		// <img ng-src="../img/{{$scope.cases[posicion].url}}" alt="Description" />

   		};
   		// <div class="col imagenFondo position-relative"><img id="fotoFondo" ng-src="{{miFoto}}"></div>
        
     //    <div class="row position-absolute top-50 start-50 translate-middle">
     //        <div class="col-4 mt-5" ng-repeat="casa in cases">
     //            <a href="#/cases/{{casa.idcasa}}"  ng-mouseover="cambioImagen({{casa.idcasa}})">{{casa.nom}}</a>
     //        </div>
     //    </div>
	
})  
.controller("LoginController", function($scope, $http, $q, $location, $rootScope){
    $scope.errorLogin=false;
    $scope.entrar = function(){
        if ($scope.email=="" || $scope.pass=="") alert ("verifica datos") 
            else{
        let data = new FormData()
        data.append("acc","entrar");
        data.append("correu", $scope.email)
        data.append("pass", $scope.pass)
        let defered=$q.defer();
        $http.post("models/login.php", data, {headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res)=>{
            defered.resolve(res);
            $scope.datos=res.data;
            console.log(res.data);

            if ($scope.datos == "ko") {

            	$scope.errorLogin=true;
            }
            else{
            	 window.location.href="./backend/index.php";
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
	       $scope.nombre=$scope.casa[2];
	       $scope.descripcio=$scope.casa[3];
	       $scope.descripcion=$scope.casa[4];
	       $scope.url=$scope.casa[5];
      
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	   $scope.titol="CASES D'OFICIS";
	   $scope.titulo="CASAS DE OFICIOS";
	   $scope.titol2="QUÈ ÉS LA CASA D'OFICIS";
	   $scope.titulo2="¿QUÉ ES LA CASA DE OFICIOS";
	   $scope.filcat="Filtrar per:";
	   $scope.filcas="Filtrar por:";
	   $scope.curs="Any en curs";
	   $scope.curso="Año en curso";
	   $scope.tot="Tots els anys";
	   $scope.todo="Todos los años";
	   $scope.tot2="Totes";
	   $scope.todo2="Todos";
	   $scope.anys="Anys";
	   $scope.acas="Años";

})