angular.module("backend")
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

    }
})

        // $scope.subirImagen = () => {
        //     let data = new FormData;
        //     data.append("url",$scope.url)
        // }
        // $scope.getFileDetails=function(e){
        //     console.log(e.files.length);
        //     $scope.fileImages=[];
        //     let data = new FormData();            
        //     data.append()
        //     let defered = $q.defer();
        //     $http.post("models/cases.php",data,{headers:{"Content-type": undefined}, transformRequest: angular.identity})
        //     .then(function(res){
        //         defered.resolve(res);
        //         $scope.datos=res.data;
        //         console.log($scope.datos);
        //         console.log(res);
        //     })
        //     .catch(function(error){
        //         console.log(error);
        //         console.log(error.statusText);
        //     })
        // }


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
    let idcasa = $routeParams.idcasa;
    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","especialitats");
    data.append("idcasa",idcasa);
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
            $scope.selCasa=$scope.especialitats[posicion].idcasa;
            console.log($scope.selCasa+ $scope.nom);
        }
        else{
            console.log("añado");
            $scope.idesp="";
            $scope.nom="";
            $scope.nombre="";
            $scope.descripcio="";
            $scope.descripcion="";
            $scope.selCasa="-1";
        }
        $("#modalEsp").modal('show')
    }
    $scope.guardar=()=>{
        console.log("A modificar:--"+$scope.idesp+"--");
        let data = new FormData;
        if($scope.idesp=="") data.append("acc","c");
        else data.append("acc","u");
        data.append("idcasa",$scope.selCasa);
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
            console.log(res.data);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
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
    $scope.idDir = "";
    let idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", idcasa);

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
    }
    $scope.eliminar = (idDir) => {
        data.append("acc", "d");
        data.append("idDir", idDir);

        $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            $scope.directors = res.data;
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
})

.controller("EdicionsController", ($q, $http, $scope, $routeParams, $location, $rootScope) => {
    $scope.url = "";
    $scope.dataInici = "";
    $scope.dataFi = "";
    $scope.idEdicio="";

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
            $scope.dataInici = new Date($scope.edicions[posicion].dataInici);
            $scope.dataFi = new Date($scope.edicions[posicion].dataFi);
            $scope.idEdicio=$scope.edicions[posicion].idEdicio;
        }
        else{
            $scope.url = "";
            $scope.dataInici = "";
            $scope.dataFi = "";
            $scope.idEdicio="";
        }
        $("#modalEdicio").modal('show')
        $rootScope.idEdicio = idEdicio;
    }


    $scope.guardar=()=>{    
        if($scope.idEdicio==""){
            if($rootScope.fotoEdicio == undefined){
                alert("Escoge una imagen")
            }else if($scope.dataInici == "" || $scope.dataFi == ""){
                alert("Selecciona data de inici i data de fi")
            }else{
                data.append("acc","c");
                data.append("imgEdicio", $rootScope.fotoEdicio);
            }
        }
        else{
            if($rootScope.fotoEdicio == undefined){
                data.append("acc","u");
                data.append("imgEdicio", $rootScope.url) 
                console.log($rootScope.url)
            }else{
                data.append("acc","u");
                data.append("imgEdicio", $rootScope.fotoEdicio)
                console.log($rootScope.fotoEdicio)
            }
        }

        let dataInici = $scope.dataInici.getFullYear() + "-" + ($scope.dataInici.getMonth()+1) + "-" + $scope.dataInici.getDate()
        let dataFi = $scope.dataFi.getFullYear() + "-" + ($scope.dataFi.getMonth()+1) + "-" + $scope.dataFi.getDate()

        data.append("dataInici", dataInici);
        data.append("dataFi", dataFi);
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

    $scope.eliminar = (idEdicio) => {
        let confirmacion = confirm("¿Estás seguro de que deseas eliminar esta edición?");
        if(confirmacion){
            data.append("acc", "d");
            data.append("idEdicio", idEdicio);
    
            $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                $scope.edicions = res.data;
                console.log(res.data)
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {})
        }else{
            alert("No se ha eliminado la edición")
        }
    }
})

.controller("ProjectesController", ($q, $http, $scope, $routeParams, $location, $rootScope) => {
    $scope.descripcio="";
    $scope.descripcion="";
    $scope.idProjecte = "";
    $scope.titol="";
    $scope.titulo="";
    $scope.selEsp = "-1";
    
    let idEdicio = $routeParams.idEdicio;
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
            $scope.idProjecte="12"
            
            data.append("acc","updateEdicio");
            data.append("idProjecte", $rootScope.idProjecte);
            $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                $scope.existents = res.data.edicionsExistents;
                $scope.inexistents = res.data.edicionsInexistents;
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {})
        }
        else{
            $scope.descripcio="";
            $scope.descripcion="";
            $scope.idProjecte = "";
            $scope.titol="";
            $scope.titulo="";
            $scope.idProjecte=""
        }
        $("#modalProjecte").modal('show')
    }

    $scope.guardar=()=>{
        if($scope.idProjecte==""){
            if($rootScope.projecteMultimedia == undefined){
                alert("Escull una imatge")
            }else if($scope.descripcio == "" || $scope.descripcion == "" || $scope.titol == "" || $scope.titulo == ""){
                alert("Tots els camps son obligatoris")
            }else{
                data.append("acc","c");
                data.append("multimedia", $rootScope.projecteMultimedia);
            }
        }else{
            if($rootScope.projecteMultimedia == undefined){
                data.append("acc","u");
                data.append("multimedia", $rootScope.url);
            }else{
                data.append("acc","u");
                data.append("multimedia", $rootScope.projecteMultimedia);
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
        let confirmacion = confirm("¿Estás seguro de que quieres eliminar este proyecto?");
    
        if(confirmacion){
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
        }else{
            alert("No se ha eliminado el proyecto");
        }
    }

    $scope.onChange = () => {
        let confirmacion = confirm("¿Estás seguro de que quieres añadir la edición "+$scope.selEsp+"?")
        if(confirmacion){
            alert("Edición "+ $scope.selEsp+" añadida");
            let data= new FormData;
            let defered = $q.defer();
            data.append("acc","addEdicio");
            data.append("idEdicio", $scope.selEsp);
            data.append("idProjecte", $rootScope.idProjecte);
            $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                console.log(res.data)
                $scope.projectes = res.data;
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {})
        }
    }

    $scope.onDelete = (idEdicio) => {
        let confirmacion = confirm("¿Estás seguro de que quieres eliminar la edición "+idEdicio+"?")
        if(confirmacion){
            alert("Edición eliminada");
            let data= new FormData;
            let defered = $q.defer();
            data.append("acc","deleteEdicio");
            data.append("idEdicio", idEdicio);
            data.append("idProjecte", $rootScope.idProjecte);
            $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                console.log(res.data)
                $scope.projectes = res.data;
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {})
        }else{
            alert("Edición salvada");
        }
    }
})

.controller("MultimediaController", ($q, $http, $scope, $routeParams, $location, $rootScope) => {
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
        }
        else{
            $scope.idMultimedia="";
            $scope.descripcio="";
            $scope.descripcion="";
            $scope.url="";
        }
        $("#modalMultimedia").modal('show');
        $rootScope.idMult = $scope.multimedia[posicion].idMult;
    }

    $scope.guardar=()=>{
        if($scope.idMultimedia==""){
            data.append("acc","c");

            if($rootScope.archivo == undefined){
                alert("Selecciona un archivo")
            }else if($scope.descripcio == "" || $scope.descripcion == ""){
                alert("Tots els camps son obligatoris");
            }else{
                data.append("idMult", $rootScope.idMult);
                data.append("idProjecte", idProjecte);
                data.append("multimedia", $rootScope.archivo);
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
        }else{
            data.append("acc","u");
            if($rootScope.archivo == undefined){
                if($scope.descripcio == "" || $scope.descripcion == ""){
                    alert("Les dos descripcions han de ser omplertes")
                }else{
                    data.append("multimedia", $scope.url);
                    data.append("idMult", $rootScope.idMult);
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
            }else{
                data.append("idMult", $rootScope.idMult);
                data.append("idProjecte", idProjecte);
                data.append("multimedia", $rootScope.archivo);
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
    }

    $scope.eliminar = (idMultimedia) => {
        let confirmacion = confirm("¿Estás seguro de que quieres eliminar este proyecto?");
    
        if(confirmacion){
            data.append("acc", "d");
            data.append("idMult", idMultimedia);
    
            $http.post("models/multimedia.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                $scope.multimedia = res.data;
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {})
        }else{
            alert("No se ha eliminado el proyecto");
        }
    }
})