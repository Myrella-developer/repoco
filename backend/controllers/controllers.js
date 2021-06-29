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
    $scope.url="digitals.png"
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
        //document.querySelector("#carlosModal").style = "display:block|important";
        
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

        $scope.editar=(posicion)=>{
           
            if(posicion!="-1"){
                $scope.nom=$scope.cases[posicion].nom;
                $scope.nombre=$scope.cases[posicion].nombre;
                $scope.descripcio=$scope.cases[posicion].descripcio;
                $scope.descripcion=$scope.cases[posicion].descripcion;
                $scope.idcasa=$scope.cases[posicion].idcasa;
                $scope.url=$scope.cases[posicion].url;
            }
            else{
                $scope.idCasa="";
                $scope.nom="";
                $scope.nombre="";
                $scope.descripcio="";
                $scope.descripcion="";
            }
            document.querySelector("#ModalCases").style = "display:block|important";
            
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
        console.log($scope.especialitats);
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
    $scope.eliminar = (idEsp) => {
        data.append("acc", "d");
        data.append("idEsp", idEsp);

        $http.post("models/especialitat.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            $scope.especialitats = res.data.especialitats;
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
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
            $scope.idDir=$scope.directors[posicion].idDir;
        }
        else{
            console.log("añado");
            $scope.nom = "";
            $scope.cog1 = "";
            $scope.cog2 = "";
            $scope.correu = "";
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
    $scope.nom = "";
    $scope.nombre = "";
    $scope.url = "";
    $scope.dataInici = "";
    $scope.dataFi = "";
    $scope.idEdicio="";

    let idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", idcasa);

    $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.edicions = res.data.edicions;
        $scope.especialitats = res.data.especialitats;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.getFileDetails = (e) => {
        $rootScope.fotoEdicio = e.files[0].name;
    }

    $scope.editar=(posicion, idEdicio)=>{
        if(posicion !== "-1"){
            $scope.nom=$scope.especialitats[posicion].nom;
            $scope.nombre=$scope.especialitats[posicion].nombre;
            $scope.url=$scope.edicions[posicion].url;
            $scope.dataFi = new Date($scope.edicions[posicion].dataFi);
            $scope.dataInici = new Date($scope.edicions[posicion].dataInici);
            $scope.idEdicio=$scope.edicions[posicion].idEdicio;
            $scope.sel=$scope.edicions[posicion].nom;
        }
        else{
            $scope.sel="-1"
            $scope.dataInici = "";
            $scope.dataFi = "";
            $scope.idEdicio="";
        }
        $("#modalEdicio").modal('show')
        $rootScope.idEdicio = idEdicio;
    }

    $scope.guardar=()=>{
        let dataInici = $scope.dataInici.getFullYear() + "-" + ($scope.dataInici.getMonth()+1) + "-" + $scope.dataInici.getDate()
        let dataFi = $scope.dataFi.getFullYear() + "-" + ($scope.dataFi.getMonth()+1) + "-" + $scope.dataFi.getDate()
     
        if($scope.idEdicio==""){
            if($rootScope.fotoEdicio == undefined){
                alert("Escoge una imagen")
            }else{
                data.append("acc","c");
                data.append("imgEdicio", $rootScope.fotoEdicio);
            }
        }
        else{
            if($rootScope.fotoEdicio == undefined){
                data.append("acc","u");
                data.append("imgEdicio", $scope.url) 
            }else{
                data.append("acc","u");
                data.append("imgEdicio", $rootScope.fotoEdicio)
            }
        }

        data.append("selEsp", $scope.sel);
        data.append("dataInici", dataInici);
        data.append("dataFi", dataFi);
        data.append("idEdicio", $rootScope.idEdicio);

        let defered = $q.defer();
        $http.post("models/edicions.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            console.log(res.data);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
    }
    
    $scope.irProjectes = () => {
        $location.path("/projectes/"+idcasa)
    }

    $scope.eliminar = (idEdicio) => {
        let confirmacion = confirm("¿Estás seguro de que deseas eliminar esta edición?");
        if(confirmacion){
            data.append("acc", "d");
            data.append("idEdicio", idEdicio);
    
            $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
            .then((res) => { 
                defered.resolve(res);
                console.log(res.data)
            })
            .catch((err) => { console.log(err.statusText) })
            .finally(() => {location.reload()})
        }else{
            alert("No se ha eliminado la edición")
        }
    }
})

.controller("ProjectesController", ($q, $http, $scope, $routeParams, $location) => {
    $scope.titol = "";
    $scope.titulo = "";
    $scope.descripcio="";
    $scope.descripcion="";

    $scope.idMultimedia = "";
    $scope.descripcioMulti="";
    $scope.descripcionMulti="";
    $scope.urlMulti=""

    let idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", idcasa);

    $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.especialitats = res.data.especialitats;
        $scope.projectes = res.data.projectes;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $http.post("models/multimedia.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.multimedia = res.data.multimedia;
        //$scope.projectes = res.data.projectes;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.editar=(posicion)=>{
        if(posicion !== "-1"){
            $scope.titol=$scope.projectes[posicion].titol;
            $scope.titulo=$scope.projectes[posicion].titulo;
            $scope.descripcio=$scope.projectes[posicion].descripcio;
            $scope.descripcion=$scope.projectes[posicion].descripcion;
            $scope.url=$scope.projectes[posicion].url;
            $scope.sel=$scope.especialitats[posicion].idEsp;

            $scope.descripcioMulti=$scope.multimedia[posicion].descripcio;
            $scope.descripcionMulti=$scope.multimedia[posicion].descripcion;
            $scope.idMultimedia=$scope.multimedia[posicion].idMult;
            $scope.urMultil=$scope.multimedia[posicion].url;
        }
        else{
            $scope.titol = "";
            $scope.titulo = "";
            $scope.descripcio="";
            $scope.descripcion="";
            $scope.sel="-1"

            $scope.idMultimedia="";
            $scope.descripcio="";
            $scope.descripcion="";
        }
        $("#modalProjecte").modal('show')
    }

    $scope.guardar=()=>{
        if($scope.idProjecte=="") data.append("acc","c");
        else data.append("acc","u");

        data.append("titol", $scope.titol);
        data.append("titulo", $scope.titulo);
        data.append("descripcio", $scope.descripcio);
        data.append("descripcion", $scope.descripcion);
        data.append("idProjecte", $scope.sel);

        $http.post("models/projectes.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            console.log(res.data);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});

        if($scope.idMultimedia=="") data.append("acc","c");
        else data.append("acc","u");

        data.append("idProjecte", $scope.idProjecte);
        data.append("novaDescripcio", $scope.descripcio);
        data.append("novaDescripcion", $scope.descripcion);
        data.append("nuevaFoto", $rootScope.nuevaFoto);

        let defered = $q.defer();
        $http.post("models/multimedia.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) =>{
            defered.resolve(res);
            console.log(res.data);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
    }

    $scope.eliminar = (idProjecte) => {
        data.append("acc", "d");
        data.append("idProjecte", idProjecte);

        $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }

    $scope.irMultimedia = () => {
        $location.path("/multimedia/"+idcasa)
    }

    $scope.showDesc = false;
    $scope.mostrarDesc = () => {
        $scope.showDesc = !$scope.showDesc;
    }
})