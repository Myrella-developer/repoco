angular.module("backend")
app.filter('trusted', ['$sce', function ($sce) { 
    return function(url) { 
        return $sce.trustAsResourceUrl("../multimedia/so/" + url); 
    }; 
}]) 
app.filter('trustedVideo', ['$sce', function ($sce) { 
    return function(url) { 
        return $sce.trustAsResourceUrl("https://www.youtube.com/embed/" + url); 
    }; 

}]) 
.controller("IndexController", ($scope,$q,$http,$routeParams) => {  
    $scope.tancar=()=>{
        let data = new FormData;
        data.append("acc","tancar");

        let defered =$q.defer();
        $http.post("../models/login.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

        .then((res) =>{
            defered.resolve(res);
            $scope.datos=res.data;
            window.location.href="../index.html";        
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
    }    
})

.controller("HomeController", ($scope,$q,$http,$location) => {
    $scope.idCasa="";
    $scope.nom="";
    $scope.nombre="";
    $scope.descripcio="";
    $scope.descripcion="";
    $scope.url="";
    let data = new FormData;
    data.append("acc","r");
    let defered =$q.defer();
    $http.post("models/cases.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

    .then((res) =>{
        defered.resolve(res);
        $scope.cases=res.data;
        console.log($scope.cases);
    })
    .catch((err)=>{console.log(err.statusText)})
    .finally(()=>{});
    $scope.editar=(posicion)=>{
        
        if(posicion!="-1"){
            console.log("Modifico");
            $scope.nom=$scope.cases[posicion].nom;
            $scope.nombre=$scope.cases[posicion].nombre;
            $scope.descripcio=$scope.cases[posicion].descripcio;
            $scope.descripcion=$scope.cases[posicion].descripcion;
            $scope.idcasa=$scope.cases[posicion].idcasa;
            $scope.url=$scope.cases[posicion].url;
        }
        else{
            console.log("añado");
            $scope.idCasa="";
            $scope.nom="";
            $scope.nombre="";
            $scope.descripcio="";
            $scope.descripcion="";
        }
        $("#modalCases").modal('show')
        
    }
    $scope.guardar=()=>{
        console.log("A modificar:--"+$scope.idcasa+"--");

        let data = new FormData;
        if($scope.idcasa=="") data.append("acc","c");
        else data.append("acc","u");
        data.append("idcasa",$scope.idcasa);
        data.append("nom",$scope.nom);
        data.append("nombre",$scope.nombre);
        data.append("descripcio",$scope.descripcio);
        data.append("descripcion",$scope.descripcion);
        data.append("url",$scope.url);

        let defered = $q.defer();
        $http.post("models/cases.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            console.log(res.data);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
        swal("Bon treball!", "Ves fer clic al botó!", "success");    
    }
})


.controller("RecuperarController", ($q, $scope, $http, $location) => {
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

.controller("EspecialitatController", ($q, $http, $scope, $routeParams, $location) => {
    $scope.nom="";
    $scope.nombre="";
    $scope.descripcio="";
    $scope.descripcion="";
    $scope.idesp="";
    $scope.idcasa = $routeParams.idcasa;
    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","especialitats");
    data.append("idcasa",$scope.idcasa);
    $http.post("models/especialitat.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.especialitats = res.data.especialitats;
        $scope.cases = res.data.cases;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
    $scope.editar=(posicion)=>{  
        if(posicion!="-1"){
            console.log("Modifico");
            $scope.nom=$scope.especialitats[posicion].nom;
            $scope.nombre=$scope.especialitats[posicion].nombre;
            $scope.descripcio=$scope.especialitats[posicion].descripcio;
            $scope.descripcion=$scope.especialitats[posicion].descripcion;
            $scope.idesp=$scope.especialitats[posicion].idEsp;    
        }
        else{
            console.log("añado");
            $scope.idesp="";
            $scope.nom="";
            $scope.nombre="";
            $scope.descripcio="";
            $scope.descripcion="";
        
        }
        $("#modalEsp").modal('show')
    }
    $scope.guardar=()=>{
        console.log("A modificar:--"+$scope.idesp+"--");
        let data = new FormData;
        if($scope.idesp=="") data.append("acc","c");
        else data.append("acc","u");
        data.append("idcasa",$scope.idcasa);
        data.append("idEsp",$scope.idesp);
        data.append("nom",$scope.nom);
        data.append("nombre",$scope.nombre);
        data.append("descripcio",$scope.descripcio);
        data.append("descripcion",$scope.descripcion);

        let defered = $q.defer();
        $http.post("models/especialitat.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            $scope.especialitats = res.data.especialitats;

        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
        swal("Bon treball!", "Ves fer clic al botó!", "success");     
    }
    $scope.irEdiciones = () => {
                $location.path("/ediciones/"+idcasa)
            }
})
.controller("DirectorsController", ($q, $http, $scope, $routeParams) => {
    $scope.nom = "";
    $scope.cog1 = "";
    $scope.cog2 = "";
    $scope.correu = "";
    $scope.contacte = "";
    $scope.pass = "";
    $scope.newpass = "";
    $scope.idDir = "";
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");

    $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.directors = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
    $scope.editar=(posicion)=>{  
        if(posicion!="-1"){
            console.log("Modifico");
            $scope.nom=$scope.directors[posicion].nom;
            $scope.cog1=$scope.directors[posicion].cog1;
            $scope.cog2=$scope.directors[posicion].cog2;
            $scope.correu=$scope.directors[posicion].correu;
            $scope.contacte = $scope.directors[posicion].contacte;
            $scope.idDir=$scope.directors[posicion].idDir;
        }
        else{
            console.log("añado");
            $scope.nom = "";
            $scope.cog1 = "";
            $scope.cog2 = "";
            $scope.correu = "";
            $scope.contacte = "";
            $scope.idDir = "";
            $scope.pass = "";
        }
        $("#modalDir").modal('show');
    }
    $scope.guardar=()=>{
        console.log("A modificar:--"+$scope.idDir+"--");
        let data = new FormData;
        if($scope.idDir=="") data.append("acc","c");
        else data.append("acc","u");
        data.append("idDir",$scope.idDir);
        data.append("nom",$scope.nom);
        data.append("cog1",$scope.cog1);
        data.append("cog2",$scope.cog2);
        data.append("correu",$scope.correu);
        data.append("contacte",$scope.contacte);
        data.append("pass",$scope.pass);

        let defered = $q.defer();
        $http.post("models/directors.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            $scope.directors = res.data;
            console.log(res.data);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
        swal("Bon treball!", "Ves fer clic al botó!", "success");    
    }
    $scope.eliminar = (idDir) => {
        data.append("acc", "d");
        data.append("idDir", idDir);

        $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            $scope.directors = res.data;
            console.log(res.data);
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
    $scope.recupera =(idDir)=>{
        $("#modalRecontra").modal('show');
        $scope.idDir=idDir;
    }
    $scope.recontra = () => {  
        console.log( $scope.idDir+"A cambiar:--"+$scope.pass+"--");
        let data = new FormData;
        if($scope.pass!="" && ($scope.pass==$scope.newpass)){
        data.append("acc","reset");
        data.append("idDir", $scope.idDir);
        data.append("pass",$scope.pass);
        data.append("newpass",$scope.newpass);

        $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            $scope.directors = res.data;
            console.log(res.data);
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {swal("Bon treball!", "Ves fer clic al botó!", "success");})
        } 
        else swal("Atenció!", "Verifica Contrasenya!", "warning");;
    
    }
})

.controller("EdicionsController", ($q, $http, $scope, $routeParams, $location, $rootScope) => {
    let idEsp = $routeParams.idEsp;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idEsp", idEsp);

    $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.edicions = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.getFileDetails = (e) => {
        $rootScope.fotoEdicio = e.files[0];
    }

    $scope.editar=(posicion, idEdicio)=>{
        if(posicion !== "-1"){
            $rootScope.url = $scope.edicions[posicion].url;
            $scope.dataInici = new Date($scope.edicions[posicion].dataIniciEng);
            $scope.dataFi = new Date($scope.edicions[posicion].dataFiEng)
            $scope.idEdicio=$scope.edicions[posicion].idEdicio;
        }else{
            $scope.url = "";
            $scope.dataInici = "";
            $scope.dataFi = "";
            $scope.idEdicio="";
        }
        $("#modalEdicio").modal('show')
        $rootScope.idEdicio = idEdicio;
    }

    $scope.cambiDataInici = (dataInici) => {
        $rootScope.dataInici = dataInici.getFullYear() + "-" + (dataInici.getMonth()+1) + "-" + dataInici.getDate()
    }

    $scope.cambiDataFi = (dataFi) => {
        $rootScope.dataFi = dataFi.getFullYear() + "-" + (dataFi.getMonth()+1) + "-" + dataFi.getDate()
    }

    $scope.guardar=()=>{    
        if($scope.idEdicio==""){
            if($rootScope.fotoEdicio == undefined){
                swal("Escull una imatge", "", "warning");
            }else if($rootScope.dataInici == "" || $rootScope.dataFi == ""){
                swal("Selecciona data de inici i data de fi", "warning");
            }else{
                data.append("acc","c");
                data.append("imgEdicio", $rootScope.fotoEdicio);
                data.append("dataInici", $rootScope.dataInici);
                data.append("dataFi", $rootScope.dataFi);
            }
        }
        else{
            if($rootScope.fotoEdicio == undefined){
                data.append("acc","u");
                data.append("imgEdicio", $rootScope.url) 
            }else{
                data.append("acc","u");
                data.append("imgEdicioCambio", $rootScope.fotoEdicio)
            }
        }

        if($rootScope.dataInici == undefined || $rootScope.dataFi == undefined){
            $scope.dataInici = $scope.dataInici.getFullYear() + "-" + ($scope.dataInici.getMonth()+1) + "-" + $scope.dataInici.getDate()
            $scope.dataFi = $scope.dataFi.getFullYear() + "-" + ($scope.dataFi.getMonth()+1) + "-" + $scope.dataFi.getDate()
            data.append("dataInici", $scope.dataInici);
            data.append("dataFi", $scope.dataFi);
        }else{
            data.append("dataInici", $rootScope.dataInici);
            data.append("dataFi", $rootScope.dataFi);
        }

        data.append("idEdicio", $rootScope.idEdicio);
        data.append("idEsp", idEsp);

        let defered = $q.defer();
        $http.post("models/edicions.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            console.log(res.data);
            $scope.edicions = res.data;
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{$("#modalEdicio").modal('hide')});
    }
})

.controller("ProjectesController", ($q, $http, $scope, $routeParams, $location, $rootScope) => {
    $scope.selEsp = "-1";
    
    let idEdicio = $routeParams.idEdicio;
    let dataIniciEdicio = $routeParams.dataInici;

	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idEdicio", idEdicio);

    $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.projectes = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.getFileDetails = (e) => {
        $rootScope.projecteMultimedia = e.files[0];
    }

    $scope.editar=(posicion)=>{
        if(posicion !== "-1"){
            $scope.descripcio=$scope.projectes[posicion].descripcio;
            $scope.descripcion=$scope.projectes[posicion].descripcion;
            $rootScope.url=$scope.projectes[posicion].url;
            $scope.titol=$scope.projectes[posicion].titol;
            $scope.titulo=$scope.projectes[posicion].titulo;
            $rootScope.idProjecte=$scope.projectes[posicion].idProjecte;

            data.append("acc","updateEdicio");
            data.append("idProjecte", $rootScope.idProjecte);
            data.append("dataIniciEdicio", dataIniciEdicio);
            $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                $scope.existents = res.data.edicionsExistents;
                $scope.inexistents = res.data.edicionsInexistents;
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {})

            $scope.showSelect = true;
        }
        else{
            $scope.descripcio="";
            $scope.descripcion="";
            $scope.idProjecte = "";
            $scope.titol="";
            $scope.titulo="";
            $scope.idProjecte=""
            $rootScope.idProjecte=""

            $scope.showSelect = false;
        }
        $("#modalProjecte").modal('show')
    }

    $scope.guardar=()=>{
        if($rootScope.idProjecte==""){
            if($rootScope.projecteMultimedia == undefined){
                swal("Escull una imatge", "", "warning");
            }else if($scope.descripcio == "" || $scope.descripcion == "" || $scope.titol == "" || $scope.titulo == ""){
                swal("Tots els camps son obligatoris", "", "warning");
            }else{
                data.append("acc","c");
                data.append("multimedia", $rootScope.projecteMultimedia);
            }
        }else{
            if($rootScope.projecteMultimedia == undefined){
                data.append("multimedia", $rootScope.url);
                data.append("acc","u");
            }else if($scope.descripcio == "" || $scope.descripcion == "" || $scope.titol == "" || $scope.titulo == ""){
                swal("Tots els camps son obligatoris", "", "warning")
            }else{
                data.append("multimediaCambio", $rootScope.projecteMultimedia);
                data.append("acc","u");
                console.log($rootScope.projecteMultimedia)
            }
        }

        data.append("descripcio", $scope.descripcio);
        data.append("descripcion", $scope.descripcion);
        data.append("titol", $scope.titol);
        data.append("titulo", $scope.titulo);
        data.append("idEdicio", idEdicio);
        data.append("idProjecte", $rootScope.idProjecte);

        $http.post("models/projectes.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            console.log(res.data);
            $scope.projectes = res.data;
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{$("#modalProjecte").modal('hide')});
    }

    $scope.eliminar = (idProjecte) => {
        swal({
            title: "¿Estàs segur de que vols eliminar aquest projecte?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Projecte eliminat", {
                icon: "success",
              });
              data.append("acc", "d");
                data.append("idProjecte", idProjecte);
        
                $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
                .then((res) => { 
                    defered.resolve(res);
                    console.log(res.data)
                    $scope.projectes = res.data;
                })
                .catch((err) => { console.log(err.statusText) })
                .finally(() => {})
            } else {
              swal("No s'ha eliminat el projecte!");
            }
        });
    }

    $scope.onChange = () => {
        let data= new FormData;
        let defered = $q.defer();
        data.append("acc","addEdicio");
        data.append("idEdicio", $scope.selEsp);
        data.append("idProjecte", $rootScope.idProjecte);
        data.append("dataIniciEdicio", dataIniciEdicio);
        $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            $scope.existents = res.data.edicionsExistents;
            $scope.inexistents = res.data.edicionsInexistents;
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {$scope.selEsp = "-1";})
    }

    $scope.onDelete = (idEdicio) => {
        let data= new FormData;
        let defered = $q.defer();
        data.append("acc","deleteEdicio");
        data.append("idEdicio", idEdicio);
        data.append("idProjecte", $rootScope.idProjecte);
        data.append("dataIniciEdicio", dataIniciEdicio);
        $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            $scope.existents = res.data.edicionsExistents;
            $scope.inexistents = res.data.edicionsInexistents;
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {$scope.selEsp = "-1";})
    }
})

.controller("MultimediaController", ($q, $http, $scope, $routeParams, $location, $rootScope, $sce) => {
    $scope.idMultimedia = "";
    $scope.descripcio="";
    $scope.descripcion="";
    $scope.url=""

    let idProjecte = $routeParams.idProjecte;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idProjecte", idProjecte);

    $http.post("models/multimedia.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.multimedia = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.getFileDetails = (e) => {
        $rootScope.archivo = e.files[0];
    }

    $scope.editar=(posicion)=>{
        if(posicion !== "-1"){
            $scope.descripcio=$scope.multimedia[posicion].descripcio;
            $scope.descripcion=$scope.multimedia[posicion].descripcion;
            $scope.idMultimedia=$scope.multimedia[posicion].idMult;
            $scope.url=$scope.multimedia[posicion].url;
            $scope.tipo = $scope.multimedia[posicion].tipo;
            $rootScope.idMult = $scope.multimedia[posicion].idMult;

            if($scope.tipo == "v"){
                $scope.checkVideo = true;
                $scope.showVideo = true;

                $scope.showExaminar = false;
                $scope.showImg = false;
                $scope.showSound = false;
            }
            if($scope.tipo == "i"){
                $scope.checkImagen = true;
                $scope.showImg = true;
                $scope.showExaminar = true;
                $scope.showVideo = false;
                $scope.showSound = false;
            }
            if($scope.tipo == "s"){
                $scope.checkSonido = true;
                $scope.showSound = true;

                $scope.showImg = false;
                $scope.showVideo = false;
            }
        }
        else{
            $scope.idMultimedia="";
            $scope.descripcio="";
            $scope.descripcion="";
            $scope.url="";
            $rootScope.idMult = "";
        }
        $("#modalMultimedia").modal('show');
    }

    $scope.guardar=()=>{
        /*if($rootScope.archivo.size > "150000"){
            swal("El limit es 150kb, aquesta imatge es de " + $rootScope.archivo.size, "", "warning");
        }*/

        if($rootScope.tipoCambio == undefined){
            data.append("tipo", $scope.tipo);
        }else{
            data.append("tipo", $rootScope.tipoCambio);
        }

        if($scope.idMultimedia==""){
            data.append("acc","c");
            
            if($rootScope.archivo == undefined && $scope.showVideo == false){
                swal("Selecciona un archiu!", "", "warning");
            }else if($scope.descripcio == "" || $scope.descripcion == ""){
                swal("Tots els camps son obligatoris!", "", "warning");
            }else{
                if($rootScope.tipoCambio == "video"){
                    data.append("multimedia", $scope.url);
                }else{
                    data.append("multimedia", $rootScope.archivo);
                }
                
                data.append("idMult", $rootScope.idMult);
                data.append("idProjecte", idProjecte);
                data.append("descripcio", $scope.descripcio);
                data.append("descripcion", $scope.descripcion);
                
                $http.post("models/multimedia.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
                .then((res) =>{
                    defered.resolve(res);
                    $scope.idMultimedia="";
                    $scope.descripcio="";
                    $scope.descripcion="";
                    $scope.url="";
                    $rootScope.idMult = "";
                    $scope.tipo = "";
                    $rootScope.tipoCambio = "";
                })
                .catch((err)=>{console.log(err.statusText)})
                .finally(()=>{$("#modalMultimedia").modal('hide')});
            }
        }else{
            data.append("acc","u");

            if($scope.descripcio == "" || $scope.descripcion == ""){
                swal("Tots els camps son obligatoris", "", "warning");
            }

            if($rootScope.archivo == undefined){
                data.append("multimedia", $scope.url);
            }else{
                data.append("multimedia", $rootScope.archivo);
            }

            data.append("idMult", $rootScope.idMult);
            data.append("idProjecte", idProjecte);
            data.append("descripcio", $scope.descripcio);
            data.append("descripcion", $scope.descripcion);

            $http.post("models/multimedia.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
            .then((res) =>{
                defered.resolve(res);
                $scope.multimedia = res.data;
            })
            .catch((err)=>{console.log(err.statusText)})
            .finally(()=>{$("#modalMultimedia").modal('hide')});
        }
    }

    $scope.eliminar = (idMultimedia) => {
        swal({
            title: "¿Estàs segur de que vols eliminar aquest archiu?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Archiu eliminat", {
                icon: "success",
              });
              data.append("acc", "d");
                data.append("idMult", idMultimedia);
        
                $http.post("models/multimedia.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
                .then((res) => { 
                    defered.resolve(res);
                    $scope.multimedia = res.data;
                })
                .catch((err) => { console.log(err.statusText) })
                .finally(() => {})
            } else {
              swal("No s'ha eliminat l'archiu!");
            }
        });
    }

    $scope.showImg = false;
    $scope.showVideo = false;
    $scope.showSound = false;
    $scope.showExaminar = true;

    $scope.newValue = (value) => {
        $rootScope.tipoCambio = value;
        
        if(value == 'imatge'){
            $scope.showImg = true;
            $scope.showVideo = false;
            $scope.showSound = false;

            $scope.showExaminar = true;
        }
        if(value == 'video'){
            $scope.showVideo = true;
            $scope.showImg = false;
            $scope.showSound = false;

            $scope.showExaminar = false;
        }
        if(value == 'so'){
            $scope.showSound = true;
            $scope.showImg = false;
            $scope.showVideo = false;

            $scope.showExaminar = true;
        }
    }
})