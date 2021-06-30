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

	   $scope.espai="Espai Personal";
	   $scope.espacio="Área Personal";
	   $scope.inici="Inici";
	   $scope.inicio="Inicio";
	   $scope.contacte="Contacte";
	   $scope.contacto="Contacto";
	   $scope.banner="QUÈ ET TROBARÀS EN AQUESTA WEB";
	   $scope.banneres="QUÉ ENCONTRARÁS EN ESTA WEB";
	   $scope.titol1="T'OBRIM LA PORTA A";
	   $scope.titulo1="TE ABRIMOS LA PUERTA A";
	   $scope.titol1a="LES CASES D'OFICIS";
	   $scope.titulo1a="LAS CASAS DE OFICIOS";
	   $scope.parraf1="L'objectiu d'aquesta web, és mostrar-vos tots aquells projectes i serveis desenvolupats dins de cadascuna de les especialitats que té cada casa d'oficis.";
	   $scope.parrafo1="El objetivo de esta web, es mostraros todos aquellos proyectos y servicios desarrollados dentro de cada una de las especialidades que tiene cada casa de oficios.";
	   $scope.parraf2="Et convidem que vegis tot allò que fem i hem fet al llarg d'aquests anys dins del projecte Casa d'Oficis.";
	   $scope.parrafo2="Te invitamos que veas todo aquello que basura y hemos hecho a lo largo de estos años dentro del proyecto Casa de Oficios.";
	   $scope.parraf3="Si vols participar, consulta la pàgina inicial del projecte de les pròximes dates i inscriu-te en el formulari d'inscripció.";
	   $scope.parrafo3="Si quieres participar, consulta la página inicial del proyecto de las próximas fechas e inscríbete en el formulario de inscripción.";
	   $scope.informacio1="Informació d'acces a les";
	   $scope.informacion1="Información de acceso a las";
	   $scope.informacio2="Cases d'oficis";
	   $scope.informacion2="Casas de oficios";
	   $scope.botoncat="Info Cases D'oficis";
	   $scope.botoncast="información casas de oficios";


	   $scope.changeimg=(posicion) =>{
		$scope.rutaimg=$scope.cases[posicion].url;
		// $scope.myDynamicClass = '.primer';
		// var myEl = angular.element( document.querySelector( '#myDynamicClass' ) );
		// 	myEl.addClass('primer');

			// $scope.myDynamicClass ="primer";
		// backgroundUrl= "../img/{{$scope.cases[posicion].url}}";
		
		// if ($scope.cases[posicion].url==$scope.cases[posicion].url) 
		// console.log("../img/{{$scope.cases[posicion].url}}");

		// <img ng-src="../img/{{$scope.cases[posicion].url}}" alt="Description" />


   		};
	
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
	
	$scope.idCasa=$routeParams.idCasa;

	let data = new FormData();
	   data.append("acc", "r");
	   data.append("idcasa",$scope.idCasa);
	  
	   let defered = $q.defer();

	   $http.post("models/cases.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	       defered.resolve(res);
	       $scope.casa=res.data.casa;
	       // console.log($scope.casa);
	       $scope.url=$scope.casa[5];
	       $scope.nom=$scope.casa[1];
	       $scope.nombre=$scope.casa[2];
		   $scope.dcat=$scope.casa[3];
		   $scope.dcas=$scope.casa[4];

	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	   data = new FormData();
	   data.append("acc", "r");
	   data.append("idcasa",$scope.idCasa);

	   $http.post("models/edicio.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	      defered.resolve(res);

	    $scope.dataAnys=res.data.anysEdicio;
	    console.log($scope.dataAnys);
	     
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	   $scope.titol="CASES D'OFICIS";
	   $scope.titulo="CASAS DE OFICIOS";
	   $scope.titol2="QUÈ ÉS LA CASA D'OFICIS";
	   $scope.titulo2="¿QUÉ ES LA CASA DE OFICIOS";
	   $scope.titol3="Casa d'Oficis";
	   $scope.titulo3="Casa de Oficios";
	   $scope.acat="Anys";
	   $scope.acas="Años";

	   

})
.controller("EdicionsController", ($q, $http, $scope, $routeParams) => {
	$scope.any=$routeParams.any;
	$scope.idCasa=$routeParams.idCasa;

  let data = new FormData();
	   data.append("acc", "anyEsp");
	   data.append("any",$scope.any);
	   data.append("idCasa",$scope.idCasa);

	    let defered = $q.defer();

	   $http.post("models/edicio.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	      defered.resolve(res);

	    
	    console.log(res.data);
	     
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	})

.controller("EspecialitatController", ($q, $http, $scope, $routeParams) => {

	$scope.idEdicio=$routeParams.idEdicio;
	$scope.idCasa=$routeParams.idCasa;

	let data = new FormData();
	   data.append("acc", "r");
	   data.append("idcasa",$scope.idCasa);
	  
	   let defered = $q.defer();

	   $http.post("models/cases.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	       defered.resolve(res);
	       $scope.casa=res.data.casa;
	       // console.log($scope.casa);
	       $scope.url=$scope.casa[5];
	       $scope.nom=$scope.casa[1];
	       $scope.nombre=$scope.casa[2];
		   $scope.dcat=$scope.casa[3];
		   $scope.dcas=$scope.casa[4];

	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	 
	    data = new FormData();
	   	data.append("acc", "r");
	   	data.append("idEdicio",$scope.idEdicio);

	   $http.post("models/projectes.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	      defered.resolve(res);
	    $scope.nombreEsp=res.data[0][0];
	    $scope.nomEsp=res.data[0][1];
	    $scope.desEspcat=res.data[0][2];
	    $scope.desEspcas=res.data[0][3];
	    console.log(res.data);
	     
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

  	$scope.titol="CASES D'OFICIS";
	$scope.titulo="CASAS DE OFICIOS";
	$scope.atras="Atrás";
	$scope.enrere="Torna enrere";
	$scope.proCat="Projectes i serveis";
	$scope.proCas="Proyectos y servicios";

})