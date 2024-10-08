angular.module("repoco")
app.filter('trusted', ['$sce', function ($sce) { 

    return function(url) { 

        return $sce.trustAsResourceUrl("https://www.youtube.com/embed/" + url); 

    }; 

}]) 
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
	       $scope.datosCasas=res.data.datosCasas;
	       // console.log($scope.datosCasas);

		   $scope.datosVideos=res.data.datosVideos;
		   //console.log($scope.datosVideos);
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	   $scope.espai="Espai Personal";
	   $scope.espacio="Área Personal";
	   $scope.inici="Inici";
	   $scope.inicio="Inicio";
	   $scope.contacte="Contacte";
	   $scope.contacto="Contacto";
	   $scope.banner="Hooooooola Myrella AQUI";
	   $scope.banneres="QUÉ ENCONTRARÁS EN ESTA WEB";
	   $scope.titol1="T'OBRIM LA PORTA A";
	   $scope.titulo1="TE ABRIMOS LA PUERTA A";
	   $scope.titol1a="LES CASES D'OFICIS";
	   $scope.titulo1a="LAS CASAS DE OFICIOS";
	   $scope.parraf1="L'objectiu d'aquesta web, és mostrar-vos tots aquells projectes i serveis desenvolupats dins \n\r de cadascuna de les especialitats que té cada casa d'oficis.";
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

	   $scope.footTitol="En què podem ajudar-te?";
	   $scope.footTitulo="¿En qué podemos ayudarte?";
	   $scope.foot1cat="Ens vols conèixer?";
	   $scope.foot1cas="¿Quieres conocernos?";
	   $scope.foot2cat="Estàs buscant feina?";
	   $scope.foot2cas="¿Estás buscando trabajo?";
	   $scope.foot3cat="Tens una idea emprenedora?";
	   $scope.foot3cas="¿Tienes una idea emprendedora?";
	   $scope.foot4cat="Vols impulsar el teu negoci?";
	   $scope.foot4cas="¿Quieres impulsar tu negocio?";
	   $scope.foot5cat="Busques formació?";
	   $scope.foot5cas="¿Buscas formación?";

	   $scope.changeimg=(posicion) =>{
		$scope.rutaimg=$scope.datosCasas[posicion].url;
		// $scope.myDynamicClass = '.primer';
		// var myEl = angular.element( document.querySelector( '#myDynamicClass' ) );
		// 	myEl.addClass('primer');

			// $scope.myDynamicClass ="primer";
		// backgroundUrl= "../img/{{$scope.cases[posicion].url}}";
		
		// if ($scope.cases[posicion].url==$scope.cases[posicion].url) 
		// console.log("../img/{{$scope.cases[posicion].url}}");

		// <img ng-src="../img/{{$scope.cases[posicion].url}}" alt="Description" />


   		};
		   $scope.rutavid="";
		$scope.changevid=(numurl) =>{
			$scope.rutavid="";
			console.log(numurl);
			$scope.rutavid=$scope.datosVideos[numurl].url;
		console.log($scope.rutavid);
		}	
})  


.controller("LoginController", function($scope, $http, $q, $location, $rootScope){	
    $scope.errorLogin=false;
    //TODO eliminar al subir a producción
	$scope.email="";
    $scope.pass="";
    $scope.entrar = function(){
        if ($scope.email=="" || $scope.pass=="") $scope.errorLogin=true;
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
				if ($scope.datos=="ko") {
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
	$scope.cantidad=6;
	

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
		   $scope.mini=$scope.casa[6];

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
	    $scope.actuals=$scope.dataAnys[0].especialitats;
	    // console.log($scope.actuals);

	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {

	   });

	    $scope.mesAnys=function(){

     	 	$scope.cantidad += 6;
     	 	
    	};

	   $scope.titol="CASES D'OFICIS";
	   $scope.titulo="CASAS DE OFICIOS";
	   $scope.titol2="QUÈ ÉS LA CASA D'OFICIS";
	   $scope.titulo2="¿QUÉ ES LA CASA DE OFICIOS";
	   $scope.titol3="Casa d'Oficis";
	   $scope.titulo3="Casa de Oficios";
	   $scope.acat="Anys";
	   $scope.acas="Años";
	   $scope.veureMes="Veure més";
	   $scope.verMas="Ver más";


})
.controller("EdicionsController", ($q, $http, $scope, $routeParams) => {
	$scope.any=$routeParams.any;
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
	    $scope.actuals=$scope.dataAnys[0].especialitats;
	    // console.log($scope.actuals);
	     
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

  		data = new FormData();
 
	   data.append("acc", "anyEsp");
	   data.append("any",$scope.any);
	   data.append("idCasa",$scope.idCasa);

	   $http.post("models/edicio.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	      defered.resolve(res);

	    $scope.especialitats=res.data;
	    // console.log(res.data);
	     
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	})

.controller("EspecialitatController", ($q, $http, $scope, $routeParams) => {

	$scope.onProyec=false;
	$scope.noProyec=true;
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
	   data.append("idcasa",$scope.idCasa);

	   $http.post("models/edicio.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	      defered.resolve(res);

	    $scope.dataAnys=res.data.anysEdicio;
	    $scope.actuals=$scope.dataAnys[0].especialitats;
	    // console.log($scope.actuals);
	     
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

	    $scope.proyectos=res.data;
	  for (var i = 0; i < $scope.proyectos.length; i++) {
	  	if ($scope.proyectos[i][8]=="" || $scope.proyectos[i][8]==null){
	  		$scope.noProyec=true;
	  		$scope.onProyec=false;
	  	}
		else{
			$scope.noProyec=false;
	  		$scope.onProyec=true;
		}
	  }
	
	    $scope.nombreEsp=$scope.proyectos[0][0];
	    $scope.nomEsp=$scope.proyectos[0][1];
	    $scope.desEspcat=$scope.proyectos[0][2];
	    $scope.desEspcas=$scope.proyectos[0][3];
	    // console.log($scope.proyectos);
	     
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

  	$scope.titol="CASES D'OFICIS";
	$scope.titulo="CASAS DE OFICIOS";
	$scope.atras="Atrás";
	$scope.enrere="Torna enrere";
	$scope.proCat="Projectes i serveis";
	$scope.proCas="Proyectos y servicios";
	$scope.divNocat="No hi han projectes";
	$scope.divNocas="No hay proyectos";

})
.controller("ProjecteController", ($q, $http, $scope, $routeParams) => {

	$scope.idEdicio=$routeParams.idEdicio;
	$scope.idProjecte=$routeParams.idProjecte;
	$scope.oculto=true;

	$scope.titol="CASES D'OFICIS";
	$scope.titulo="CASAS DE OFICIOS";
	$scope.textCat="Text explicatiu d'activitat, projecte i servei";
	$scope.textCas="Texto explicativo de la actividad, proyecto y servicio";
	$scope.galCat="Galeria digital";
	$scope.galCas="Galería digital";
	$scope.loCat="Localització:";
	$scope.loCas="Localización:";
	$scope.partCat="Especialitats que han participat:";
	$scope.partCas="Especialidades que han participado:";
	$scope.datcat="Data:";
	$scope.datcas="Fecha:";

	let data = new FormData();
	   data.append("acc", "pro");
	   data.append("idProjecte",$scope.idProjecte);
	  
	   let defered = $q.defer();

	   $http.post("models/projectes.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	       defered.resolve(res);
	      $scope.proyecto=res.data;
	      console.log($scope.proyecto);

	      $scope.casaCat=$scope.proyecto[1];
	      $scope.casaCas=$scope.proyecto[2];
	      $scope.imgCasa=$scope.proyecto[3];
	      $scope.espeCas=$scope.proyecto[4];
	      $scope.espeCat=$scope.proyecto[5];
	      $scope.prin=$scope.proyecto[7];
	      $scope.final=$scope.proyecto[8];
	      $scope.projCat=$scope.proyecto[12];
	      $scope.projCas=$scope.proyecto[13];
	      $scope.desProcat=$scope.proyecto[14];
	      $scope.desProcas=$scope.proyecto[15];

	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {});

	   data = new FormData();
	   data.append("acc", "galeria");
	   data.append("idProjecte",$scope.idProjecte);

	   $http.post("models/projectes.php", data, {
	      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
	   })
	   .then((res) => { 
	       defered.resolve(res);
	       $scope.galerias=res.data.galeria;
	       $scope.participants=res.data.participants;
	       // console.log($scope.participants);
	      
	   })
	   .catch((err) => { console.log(err.statusText) })
	   .finally(() => {

	   	$scope.abreModal=function(numImg){
	   		$scope.selCarousel=numImg;

	   	}


	   });

})